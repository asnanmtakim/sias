<?php

namespace App\Controllers;

use App\Models\SuratPasienModel;
use Hermawan\DataTables\DataTable;

class SuratPasien extends BaseController
{
    protected $SuratPasienModel;
    public function __construct()
    {
        $this->SuratPasienModel = new SuratPasienModel();
    }
    public function index()
    {
        $diagnosa = $this->SuratPasienModel->getDiagnosa();
        $data = [
            'title' => 'Data Surat Pasien',
            'page' => 'surat_pasien',
            'diagnosa' => $diagnosa,
        ];
        // dd($data);
        return view('surat_pasien/index', $data);
    }

    public function getAllSuratPasien()
    {
        $db = db_connect();
        $builder = $db->table('surat_pasien')
            ->select('id_surat_pasien, tgl_surat, nama_pasien, tgl_masuk, tgl_keluar, diagnosa, jenis_surat, no_bpjs, tagihan, foto_surat, created_at')
            ->where('deleted_at', null);

        return DataTable::of($builder)
            ->filter(function ($builder, $request) {
                if ($request->diagnosa)
                    $builder->where('diagnosa', $request->diagnosa);
                if ($request->jenis)
                    $builder->where('jenis_surat', $request->jenis);
            })
            ->postQuery(function ($builder) {
                $builder->orderBy('created_at', 'DESC');
            })
            ->addNumbering('no')
            ->edit('tgl_surat', function ($row) {
                return tanggalIndo($row->tgl_surat);
            })
            ->edit('tgl_masuk', function ($row) {
                return tanggalIndoJam($row->tgl_masuk);
            })
            ->edit('tgl_keluar', function ($row) {
                return tanggalIndoJam($row->tgl_keluar);
            })
            ->edit('jenis_surat', function ($row) {
                if ($row->jenis_surat == 1) {
                    $out = 'Umum';
                } else {
                    $out = 'BPJS<br>(' . $row->no_bpjs . ')';
                }
                return $out;
            })
            ->edit('tagihan', function ($row) {
                return 'Rp. ' . format_rupiah($row->tagihan);
            })
            ->edit('foto_surat', function ($row) {
                return '<a href="' . base_url() . '/uploads/foto_surat/' . $row->foto_surat . '" class="image-link">
                <img alt="image" src="' . base_url() . '/uploads/foto_surat/' . $row->foto_surat . '" class="rounded" width="30" height="30">
                </a>';
            })
            ->add('action', function ($row) {
                return '<div class="btn-group" role="group">
                            <a href="/surat-pasien-detail/' . $row->id_surat_pasien . '" class="btn btn-sm btn-primary" title="Detail"><i class="fa fa-info-circle"></i></a>
                            <a href="/surat-pasien-edit/' . $row->id_surat_pasien . '" class="btn btn-sm btn-warning" title="Edit"><i class="fa fa-pencil"></i></a>
                            <a href="javascript:hapussuratpasien(' . $row->id_surat_pasien . ')" class="btn btn-sm btn-danger" title="Hapus"><i class="fa fa-trash"></i></a>
                        </div>';
            })
            ->setSearchableColumns(['tgl_surat', 'tgl_masuk', 'tgl_keluar', 'diagnosa', 'no_bpjs', 'tagihan'])
            ->toJson(true);
    }

    public function addSuratPasien()
    {
        $data = [
            'title' => 'Tambah Surat Pasien',
            'page' => 'surat_pasien',
            'validation' => \Config\Services::validation(),
        ];
        // dd($data);
        return view('surat_pasien/add', $data);
    }

    public function saveSuratPasien()
    {
        if (!$this->validate($this->rulesValidation())) {
            return redirect()->back()->withInput();
        } else {
            $fileFoto = $this->request->getFile('foto_surat');
            if ($fileFoto->getError() == 4) {
                $namaFoto = 'default.png';
            } else {
                $namaFoto = $fileFoto->getRandomName();
                $fileFoto->move('uploads/foto_surat', $namaFoto);
                $namaFoto = $fileFoto->getName();
            }
            $data = [
                'tgl_surat' => date('Y-m-d', strtotime($this->request->getPost('tgl_surat'))),
                'nama_pasien' => $this->request->getPost('nama_pasien'),
                'tgl_masuk' => formatDateDatabase($this->request->getPost('tgl_masuk')),
                'tgl_keluar' => formatDateDatabase($this->request->getPost('tgl_keluar')),
                'diagnosa' => $this->request->getPost('diagnosa'),
                'jenis_surat' => $this->request->getPost('jenis_surat'),
                'no_bpjs' => $this->request->getPost('no_bpjs'),
                'tagihan' => $this->request->getPost('tagihan'),
                'foto_surat' => $namaFoto,
            ];
            // dd($data);
            $this->SuratPasienModel->save($data);
            session()->setFlashdata('message_success', 'Berhasil Menambahkan Data Surat Pasien');
            return redirect()->to('/surat-pasien');
        }
    }

    public function editSuratPasien($id_surat)
    {
        $surat = $this->SuratPasienModel->find($id_surat);
        if (empty($surat)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan.');
        }
        $data = [
            'surat' => $surat,
            'validation' => \Config\Services::validation(),
            'page' => 'surat_pasien',
            'title' => 'Edit Surat Pasien',
        ];
        // dd($data);
        return view('surat_pasien/edit', $data);
    }

    public function updateSuratPasien()
    {
        $id_surat = $this->request->getPost('id_surat_pasien');
        $surat = $this->SuratPasienModel->find($id_surat);
        if (empty($surat)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan.');
        }
        if (!$this->validate($this->rulesValidation())) {
            return redirect()->back()->withInput();
        } else {
            $fileFoto = $this->request->getFile('foto_surat');
            $oldImage = $surat['foto_surat'];
            if ($fileFoto->getError() == 4) {
                $namaFoto = $oldImage;
            } else {
                if (file_exists("uploads/foto_surat/" . $oldImage)) {
                    if ($oldImage != 'default.png') {
                        unlink("uploads/foto_surat/" . $oldImage);
                    }
                }
                $namaFoto = $fileFoto->getRandomName();
                $fileFoto->move('uploads/foto_surat', $namaFoto);
                $namaFoto = $fileFoto->getName();
            }
            $data = [
                'id_surat_pasien' => $id_surat,
                'tgl_surat' => date('Y-m-d', strtotime($this->request->getPost('tgl_surat'))),
                'nama_pasien' => $this->request->getPost('nama_pasien'),
                'tgl_masuk' => formatDateDatabase($this->request->getPost('tgl_masuk')),
                'tgl_keluar' => formatDateDatabase($this->request->getPost('tgl_keluar')),
                'diagnosa' => $this->request->getPost('diagnosa'),
                'jenis_surat' => $this->request->getPost('jenis_surat'),
                'no_bpjs' => $this->request->getPost('no_bpjs'),
                'tagihan' => $this->request->getPost('tagihan'),
                'foto_surat' => $namaFoto,
            ];
            // dd($data);
            $this->SuratPasienModel->save($data);
            session()->setFlashdata('message_success', 'Berhasil Mengedit Data Surat Pasien');
            return redirect()->to('/surat-pasien');
        }
    }

    public function deleteSuratPasien($id_surat)
    {
        $surat = $this->SuratPasienModel->find($id_surat);
        if (empty($surat)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan.');
        }
        $this->SuratPasienModel->delete($id_surat);
        session()->setFlashdata('message_success', 'Berhasil Menghapus Data Surat Pasien');
        return redirect()->to('/surat-pasien');
    }

    public function detailSuratPasien($id_surat)
    {
        $surat = $this->SuratPasienModel->find($id_surat);
        if (empty($surat)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan.');
        }
        $data = [
            'surat' => $surat,
            'title' => 'Detail Surat Pasien',
            'page' => 'surat_pasien'
        ];
        // dd($data);
        return view('surat_pasien/detail', $data);
    }

    private function rulesValidation()
    {
        $config = [
            'tgl_surat' => [
                'label' => 'Tanggal surat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'nama_pasien' => [
                'label' => 'Nama pasien',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'tgl_masuk' => [
                'label' => 'Tanggal masuk',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'tgl_keluar' => [
                'label' => 'Tanggal keluar',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'diagnosa' => [
                'label' => 'Diagnosa',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'jenis_surat' => [
                'label' => 'Jenis pasien',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'tagihan' => [
                'label' => 'Tagihan',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'numeric' => '{field} hanya boleh berisi angka.',
                ]
            ],
        ];
        if ($this->request->getPost('jenis_surat') == '2') {
            $config['no_bpjs'] = [
                'label' => 'No BPJS',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'numeric' => '{field} hanya boleh berisi angka.',
                ]
            ];
        }
        if ($this->request->getPost('id_surat_pasien') != '') {
            $config['foto_surat'] = [
                'label' => 'Foto surat',
                'rules' => 'is_image[foto_surat]|max_size[foto_surat,4096]|mime_in[foto_surat,image/png,image/jpg,image/jpeg,image/gif]',
                'errors' => [
                    'is_image' => '{field} yang dipilih bukan gambar.',
                    'max_size' => '{field} ukuran maksimal 4MB.',
                    'mime_in' => '{field} yang dipilih bukan gambar.'
                ]
            ];
        } else {
            $config['foto_surat'] = [
                'label' => 'Foto surat',
                'rules' => 'uploaded[foto_surat]|is_image[foto_surat]|max_size[foto_surat,4096]|mime_in[foto_surat,image/png,image/jpg,image/jpeg,image/gif]',
                'errors' => [
                    'uploaded' => '{field} harus diisi.',
                    'is_image' => '{field} yang dipilih bukan gambar.',
                    'max_size' => '{field} ukuran maksimal 4MB.',
                    'mime_in' => '{field} yang dipilih bukan gambar.'
                ]
            ];
        }
        return $config;
    }
}
