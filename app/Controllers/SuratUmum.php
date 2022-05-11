<?php

namespace App\Controllers;

use App\Models\SuratUmumModel;
use Hermawan\DataTables\DataTable;

class SuratUmum extends BaseController
{
    protected $SuratUmumModel;
    public function __construct()
    {
        $this->SuratUmumModel = new SuratUmumModel();
    }
    public function indexSuratMasuk()
    {
        $pengirim = $this->SuratUmumModel->getPengirimMasuk();
        $penerima = $this->SuratUmumModel->getPenerimaMasuk();
        $perihal = $this->SuratUmumModel->getPerihalMasuk();
        $data = [
            'title' => 'Data Surat Masuk',
            'page' => 'surat_masuk',
            'pengirim' => $pengirim,
            'penerima' => $penerima,
            'perihal' => $perihal,
        ];
        // dd($data);
        return view('surat_umum/masuk', $data);
    }
    public function indexSuratKeluar()
    {
        $pengirim = $this->SuratUmumModel->getPengirimKeluar();
        $penerima = $this->SuratUmumModel->getPenerimaKeluar();
        $perihal = $this->SuratUmumModel->getPerihalKeluar();
        $data = [
            'title' => 'Data Surat Keluar',
            'page' => 'surat_keluar',
            'pengirim' => $pengirim,
            'penerima' => $penerima,
            'perihal' => $perihal,
        ];
        // dd($data);
        return view('surat_umum/keluar', $data);
    }

    public function getAllSuratMasuk()
    {
        $db = db_connect();
        $builder = $db->table('surat_umum')
            ->select('id_surat_umum, tgl_surat, pengirim, penerima, no_surat, perihal, isi_surat, foto_surat, id_surat_masuk, id_surat_keluar, created_at')
            ->where('jenis', 'IN')
            ->where('deleted_at', null);

        return DataTable::of($builder)
            ->filter(function ($builder, $request) {
                if ($request->pengirim)
                    $builder->where('pengirim', $request->pengirim);
                if ($request->penerima)
                    $builder->where('penerima', $request->penerima);
                if ($request->perihal)
                    $builder->where('perihal', $request->perihal);
            })
            ->postQuery(function ($builder) {
                $builder->orderBy('created_at', 'DESC');
            })
            ->addNumbering('no')
            ->edit('tgl_surat', function ($row) {
                return tanggalIndo($row->tgl_surat);
            })
            ->edit('foto_surat', function ($row) {
                return '<a href="' . base_url() . '/uploads/foto_surat/' . $row->foto_surat . '" class="image-link">
                <img alt="image" src="' . base_url() . '/uploads/foto_surat/' . $row->foto_surat . '" class="rounded" width="30" height="30">
                </a>';
            })
            ->edit('id_surat_keluar', function ($row) {
                if ($row->id_surat_keluar != '') {
                    $surat = $this->SuratUmumModel->find($row->id_surat_keluar);
                    if (!empty($surat)) {
                        $out = '<a href="/surat-umum-detail/' . $row->id_surat_keluar . '">' . $surat['pengirim'] . '; ' . tanggalIndo($surat['tgl_surat']) . '; ' . $surat['no_surat'] . '; ' . $surat['perihal'] . '</a>';
                    } else {
                        $out = '';
                    }
                } else {
                    $out = '<a href="/surat-keluar-add/' . $row->id_surat_umum . '" class="btn btn-sm btn-info" title="Surat Balasan"><i class="fa fa-sign-out"></i> Tambah</a>';
                }
                return $out;
            })
            ->add('action', function ($row) {
                return '<div class="btn-group" role="group">
                            <a href="/surat-umum-detail/' . $row->id_surat_umum . '" class="btn btn-sm btn-primary" title="Detail"><i class="fa fa-info-circle"></i></a>
                            <a href="/surat-masuk-edit/' . $row->id_surat_umum . '" class="btn btn-sm btn-warning" title="Edit"><i class="fa fa-pencil"></i></a>
                            <a href="javascript:hapussuratumum(' . $row->id_surat_umum . ')" class="btn btn-sm btn-danger" title="Hapus"><i class="fa fa-trash"></i></a>
                        </div>';
            })
            ->setSearchableColumns(['tgl_surat', 'pengirim', 'penerima', 'no_surat', 'perihal', 'isi_surat'])
            ->toJson(true);
    }

    public function getAllSuratKeluar()
    {
        $db = db_connect();
        $builder = $db->table('surat_umum')
            ->select('id_surat_umum, tgl_surat, pengirim, penerima, no_surat, perihal, isi_surat, foto_surat, id_surat_masuk, id_surat_keluar, created_at')
            ->where('jenis', 'OUT')
            ->where('deleted_at', null);

        return DataTable::of($builder)
            ->filter(function ($builder, $request) {
                if ($request->pengirim)
                    $builder->where('pengirim', $request->pengirim);
                if ($request->penerima)
                    $builder->where('penerima', $request->penerima);
                if ($request->perihal)
                    $builder->where('perihal', $request->perihal);
            })
            ->postQuery(function ($builder) {
                $builder->orderBy('created_at', 'DESC');
            })
            ->addNumbering('no')
            ->edit('tgl_surat', function ($row) {
                return tanggalIndo($row->tgl_surat);
            })
            ->edit('foto_surat', function ($row) {
                return '<a href="' . base_url() . '/uploads/foto_surat/' . $row->foto_surat . '" class="image-link">
                            <img alt="image" src="' . base_url() . '/uploads/foto_surat/' . $row->foto_surat . '" class="rounded" width="30" height="30">
                        </a>';
            })
            ->edit('id_surat_masuk', function ($row) {
                $out = '';
                if ($row->id_surat_masuk != '') {
                    $surat = $this->SuratUmumModel->find($row->id_surat_masuk);
                    if (!empty($surat)) {
                        $out = '<a href="/surat-umum-detail/' . $row->id_surat_masuk . '">' . $surat['pengirim'] . '; ' . tanggalIndo($surat['tgl_surat']) . '; ' . $surat['no_surat'] . '; ' . $surat['perihal'] . '</a>';
                    }
                }
                return $out;
            })
            ->add('action', function ($row) {
                return '<div class="btn-group" role="group">
                            <a href="/surat-umum-detail/' . $row->id_surat_umum . '" class="btn btn-sm btn-primary" title="Detail"><i class="fa fa-info-circle"></i></a>
                            <a href="/surat-keluar-edit/' . $row->id_surat_umum . '" class="btn btn-sm btn-warning" title="Edit"><i class="fa fa-pencil"></i></a>
                            <a href="javascript:hapussuratumum(' . $row->id_surat_umum . ')" class="btn btn-sm btn-danger" title="Hapus"><i class="fa fa-trash"></i></a>
                        </div>';
            })
            ->setSearchableColumns(['tgl_surat', 'pengirim', 'penerima', 'no_surat', 'perihal', 'isi_surat'])
            ->toJson(true);
    }

    public function addSuratMasuk()
    {
        $data = [
            'title' => 'Tambah Surat Masuk',
            'page' => 'surat_masuk',
            'jenis' => 'IN',
            'validation' => \Config\Services::validation(),
        ];
        // dd($data);
        return view('surat_umum/add', $data);
    }

    public function addSuratKeluar($idSuratMasuk = null)
    {
        $suratMasuk = $this->SuratUmumModel->where('jenis', 'IN')->find();
        $data = [
            'title' => 'Tambah Surat Keluar',
            'page' => 'surat_keluar',
            'jenis' => 'OUT',
            'surat_masuk' => $suratMasuk,
            'id_surat_masuk' => $idSuratMasuk,
            'validation' => \Config\Services::validation(),
        ];
        // dd($data);
        return view('surat_umum/add', $data);
    }

    public function saveSuratUmum()
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
            $jenis = $this->request->getPost('jenis');
            $data = [
                'jenis' => $jenis,
                'tgl_surat' => date('Y-m-d', strtotime($this->request->getPost('tgl_surat'))),
                'pengirim' => $this->request->getPost('pengirim'),
                'penerima' => $this->request->getPost('penerima'),
                'no_surat' => $this->request->getPost('no_surat'),
                'perihal' => $this->request->getPost('perihal'),
                'isi_surat' => $this->request->getPost('isi_surat'),
                'id_surat_masuk' => $this->request->getPost('surat_masuk'),
                'foto_surat' => $namaFoto,
            ];
            // dd($data);
            $this->SuratUmumModel->save($data);
            if ($jenis == 'IN') {
                session()->setFlashdata('message_success', 'Berhasil Menambahkan Data Surat Masuk');
                return redirect()->to('/surat-masuk');
            } else {
                $suratMasuk = $this->request->getPost('surat_masuk');
                if ($suratMasuk != '') {
                    $suratKeluar = $this->SuratUmumModel->getInsertID();
                    $dataMasuk = [
                        'id_surat_umum' => $suratMasuk,
                        'id_surat_keluar' => $suratKeluar
                    ];
                    $this->SuratUmumModel->save($dataMasuk);
                }
                session()->setFlashdata('message_success', 'Berhasil Menambahkan Data Surat Keluar');
                return redirect()->to('/surat-keluar');
            }
        }
    }

    public function editSuratUmum($id_surat)
    {
        $surat = $this->SuratUmumModel->find($id_surat);
        if (empty($surat)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan.');
        }
        $suratMasuk = $this->SuratUmumModel->where('jenis', 'IN')->find();
        $data = [
            'surat' => $surat,
            'validation' => \Config\Services::validation(),
        ];
        if ($surat['jenis'] == 'IN') {
            $data['title'] = 'Edit Surat Masuk';
            $data['page'] = 'surat_masuk';
        } else {
            $data['title'] = 'Edit Surat Keluar';
            $data['page'] = 'surat_keluar';
            $data['surat_masuk'] = $suratMasuk;
        }
        // dd($data);
        return view('surat_umum/edit', $data);
    }

    public function updateSuratUmum()
    {
        $id_surat = $this->request->getPost('id_surat_umum');
        $surat = $this->SuratUmumModel->find($id_surat);
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
            $jenis = $this->request->getPost('jenis');
            $data = [
                'id_surat_umum' => $id_surat,
                'jenis' => $jenis,
                'tgl_surat' => date('Y-m-d', strtotime($this->request->getPost('tgl_surat'))),
                'pengirim' => $this->request->getPost('pengirim'),
                'penerima' => $this->request->getPost('penerima'),
                'no_surat' => $this->request->getPost('no_surat'),
                'perihal' => $this->request->getPost('perihal'),
                'isi_surat' => $this->request->getPost('isi_surat'),
                'id_surat_masuk' => $this->request->getPost('surat_masuk'),
                'foto_surat' => $namaFoto,
            ];
            // dd($data);
            $this->SuratUmumModel->save($data);
            if ($jenis == 'IN') {
                session()->setFlashdata('message_success', 'Berhasil Mengedit Data Surat Masuk');
                return redirect()->to('/surat-masuk');
            } else {
                $suratMasuk = $this->request->getPost('surat_masuk');
                if ($suratMasuk != '') {
                    if ($surat['id_surat_masuk'] != '') {
                        $oldMasuk = [
                            'id_surat_umum' => $surat['id_surat_masuk'],
                            'id_surat_keluar' => ''
                        ];
                        $this->SuratUmumModel->save($oldMasuk);
                    }
                    $dataMasuk = [
                        'id_surat_umum' => $suratMasuk,
                        'id_surat_keluar' => $id_surat
                    ];
                    $this->SuratUmumModel->save($dataMasuk);
                }
                session()->setFlashdata('message_success', 'Berhasil Mengedit Data Surat Keluar');
                return redirect()->to('/surat-keluar');
            }
        }
    }

    public function deleteSuratUmum($id_surat)
    {
        $surat = $this->SuratUmumModel->find($id_surat);
        if (empty($surat)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan.');
        }
        $jenis = $surat['jenis'];
        $this->SuratUmumModel->delete($id_surat);
        if ($jenis == 'IN') {
            session()->setFlashdata('message_success', 'Berhasil Menghapus Data Surat Masuk');
            return redirect()->to('/surat-masuk');
        } else {
            session()->setFlashdata('message_success', 'Berhasil Menghapus Data Surat Keluar');
            return redirect()->to('/surat-keluar');
        }
    }

    public function detailSuratUmum($id_surat)
    {
        $surat = $this->SuratUmumModel->find($id_surat);
        if (empty($surat)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan.');
        }
        $data = [
            'surat' => $surat,
            'validation' => \Config\Services::validation(),
        ];
        if ($surat['jenis'] == 'IN') {
            $data['title'] = 'Detail Surat Masuk';
            $data['page'] = 'surat_masuk';
            $data['surat_keluar'] = $surat['id_surat_keluar'] != '' ? $this->SuratUmumModel->find($surat['id_surat_keluar']) : null;
        } else {
            $data['title'] = 'Detail Surat Keluar';
            $data['page'] = 'surat_keluar';
            $data['surat_masuk'] = $surat['id_surat_masuk'] != '' ? $this->SuratUmumModel->find($surat['id_surat_masuk']) : null;
        }
        // dd($data);
        return view('surat_umum/detail', $data);
    }

    private function rulesValidation()
    {
        $config = [
            'jenis' => [
                'label' => 'Jenis',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'tgl_surat' => [
                'label' => 'Tanggal surat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'pengirim' => [
                'label' => 'Pengirim',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'penerima' => [
                'label' => 'Penerima',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'no_surat' => [
                'label' => 'No surat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'perihal' => [
                'label' => 'Perihal surat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'isi_surat' => [
                'label' => 'Isi surat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
        ];
        if ($this->request->getPost('id_surat_umum') != '') {
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
