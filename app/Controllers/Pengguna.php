<?php

namespace App\Controllers;

use App\Models\UserModel;
use Myth\Auth\Password;

class Pengguna extends BaseController
{
    protected $UserModel;
    public function __construct()
    {
        $this->UserModel = new UserModel();
    }

    public function index()
    {
        $pengguna = $this->UserModel->getAllUser()->find();
        $data = [
            'title' => 'Data Pengguna',
            'page' => 'pengguna',
            'pengguna' => $pengguna,
        ];
        // dd($data);
        return view('pengguna/index', $data);
    }

    function getOnePengguna()
    {
        $data = $this->UserModel->getOneUser($this->request->getPost('id'));
        if ($data) {
            echo json_encode(array('status' => 200, 'pesan' => 'Berhasil ambil data !!', 'data' => $data));
        } else {
            echo json_encode(array('status' => 400, 'pesan' => 'Gagal ambil data !!'));
        }
    }

    public function addPengguna()
    {
        $db = db_connect();
        $group = $db->table('auth_groups')->get()->getResultArray();
        $data = [
            'title' => 'Tambah Pengguna',
            'page' => 'pengguna',
            'group' => $group,
            'validation' => \Config\Services::validation()
        ];
        return view('pengguna/add', $data);
    }

    public function savePengguna()
    {
        if (!$this->validate([
            'fullname' => [
                'label' => 'Nama lengkap',
                'rules' => 'required|min_length[3]|max_length[200]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'min_length' => '{field} minimal berisi {param} karakter.',
                    'max_length' => '{field} maksimal berisi {param} karakter.',
                ]
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'valid_email' => '{field} tidak valid.',
                    'is_unique' => '{field} sudah digukan.',
                ]
            ],
            'username' => [
                'label' => 'Username',
                'rules' => 'required|alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'alpha_numeric_space' => '{field} hanya boleh berisi alphabet, angka, dan spasi.',
                    'min_length' => '{field} minimal berisi {param} karakter.',
                    'max_length' => '{field} maksimal berisi {param} karakter.',
                    'is_unique' => '{field} sudah digukan.',
                ]
            ],
            'group' => [
                'label' => 'Role/peran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'gender' => [
                'label' => 'Jenis kelamin',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'phone' => [
                'label' => 'No Telp/HP',
                'rules' => 'required|numeric|min_length[8]|max_length[16]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'numeric' => '{field} hanya boleh berisi number.',
                    'min_length' => '{field} minimal berisi {param} karakter.',
                    'max_length' => '{field} maksimal berisi {param} karakter.',
                ]
            ],
            'image_user' => [
                'label' => 'Foto',
                'rules' => 'is_image[image_user]|max_size[image_user,4096]|mime_in[image_user,image/png,image/jpg,image/jpeg,image/gif]',
                'errors' => [
                    'is_image' => '{field} yang dipilih bukan gambar',
                    'max_size' => '{field} ukuran maksimal 4MB.',
                    'mime_in' => '{field} yang dipilih bukan gambar'
                ]
            ],
        ])) {
            return redirect()->back()->withInput();
        } else {
            $fileProfil = $this->request->getFile('image_user');
            if ($fileProfil->getError() == 4) {
                $namaFoto = 'default.png';
            } else {
                $namaFoto = url_title($this->request->getPost('email'), '_', true) . '_image_user.' . $fileProfil->getExtension();
                $fileProfil->move('uploads/image_user', $namaFoto);
                $namaFoto = $fileProfil->getName();
            }
            $password = Password::hash('123456');
            $hash = bin2hex(random_bytes(16));
            $data = [
                'email' => $this->request->getPost('email'),
                'username' => $this->request->getPost('username'),
                'password_hash' => $password,
                'fullname' => $this->request->getPost('fullname'),
                'phone' => $this->request->getPost('phone'),
                'gender' => $this->request->getPost('gender'),
                'image_user' => $namaFoto,
                'activate_hash' => $hash,
                'active' => 0,
                'force_pass_reset' => 0,
            ];
            // dd($data);
            $this->UserModel->withGroup($this->request->getPost('group'))->save($data);
            session()->setFlashdata('message_success', 'Data Pengguna Berhasil Ditambahkan');
            return redirect()->to('/pengguna');
        }
    }

    public function deletePengguna($username)
    {
        $user = $this->UserModel->getOneUserbyUsername($username);
        if (empty($user)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Pengguna tidak ditemukan.');
        }
        $this->UserModel->deleteUser($username);
        session()->setFlashdata('message_success', 'Data Pengguna Berhasil Dihapus');
        return redirect()->to('/pengguna');
    }

    public function editPengguna($username)
    {
        $user = $this->UserModel->getOneUserbyUsername($username);
        if (empty($user)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Pengguna tidak ditemukan.');
        }
        $db = db_connect();
        $group = $db->table('auth_groups')->get()->getResultArray();
        $data = [
            'title' => 'Edit Pengguna',
            'page' => 'pengguna',
            'pengguna' => $user,
            'group' => $group,
            'validation' => \Config\Services::validation()
        ];
        return view('pengguna/edit', $data);
    }

    public function updatePengguna()
    {
        $id = $this->request->getPost('id_user');
        $user = $this->UserModel->find($id);
        if (empty($user)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Pengguna tidak ditemukan.');
        }
        if ($this->request->getPost('username') == $user->username) {
            $ruleUsername = 'required';
        } else {
            $ruleUsername = 'required|alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username]';
        }
        if ($this->request->getPost('email') == $user->email) {
            $ruleEmail = 'required';
        } else {
            $ruleEmail = 'required|valid_email|is_unique[users.email]';
        }
        if (!$this->validate([
            'email' => [
                'label' => 'Email',
                'rules' => $ruleEmail,
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'valid_email' => '{field} tidak valid.',
                    'is_unique' => '{field} sudah digukan.',
                ]
            ],
            'username' => [
                'label' => 'Username',
                'rules' => $ruleUsername,
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'alpha_numeric_space' => '{field} hanya boleh berisi alphabet, angka, dan spasi.',
                    'min_length' => '{field} minimal berisi {param} karakter.',
                    'max_length' => '{field} maksimal berisi {param} karakter.',
                    'is_unique' => '{field} sudah digukan.',
                ]
            ],
            'fullname' => [
                'label' => 'Nama lengkap',
                'rules' => 'required|min_length[3]|max_length[200]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'min_length' => '{field} minimal berisi {param} karakter.',
                    'max_length' => '{field} maksimal berisi {param} karakter.',
                ]
            ],
            'gender' => [
                'label' => 'Jenis kelamin',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'group' => [
                'label' => 'Role/peran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'phone' => [
                'label' => 'No Telp/HP',
                'rules' => 'required|numeric|min_length[8]|max_length[16]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'numeric' => '{field} hanya boleh berisi number.',
                    'min_length' => '{field} minimal berisi {param} karakter.',
                    'max_length' => '{field} maksimal berisi {param} karakter.',
                ]
            ],
            'image_user' => [
                'label' => 'Foto',
                'rules' => 'is_image[image_user]|max_size[image_user,4096]|mime_in[image_user,image/png,image/jpg,image/jpeg,image/gif]',
                'errors' => [
                    'is_image' => '{field} yang dipilih bukan gambar',
                    'max_size' => '{field} ukuran maksimal 4MB.',
                    'mime_in' => '{field} yang dipilih bukan gambar'
                ]
            ],
        ])) {
            return redirect()->back()->withInput();
        } else {
            $fileProfil = $this->request->getFile('image_user');
            $oldImage = $user->image_user;
            if ($fileProfil->getError() == 4) {
                $namaFoto = $oldImage;
            } else {
                if (file_exists("uploads/image_user/" . $oldImage)) {
                    if ($oldImage != 'default.png') {
                        unlink("uploads/image_user/" . $oldImage);
                    }
                }
                $namaFoto = url_title($user->email, '_', true) . '_image_user.' . $fileProfil->getExtension();
                $fileProfil->move('uploads/image_user', $namaFoto);
                $namaFoto = $fileProfil->getName();
            }
            $group = $this->request->getPost('group');
            $db      = \Config\Database::connect();
            $auth_group = $db->table('auth_groups')->where('name', $group)->get()->getRowArray();
            $builder = $db->table('auth_groups_users');
            $builder->set('group_id', $auth_group['id'])
                ->where('user_id', $id)
                ->update();

            $data = [
                'id' => $id,
                'email' => $this->request->getPost('email'),
                'username' => $this->request->getPost('username'),
                'fullname' => $this->request->getPost('fullname'),
                'phone' => $this->request->getPost('phone'),
                'gender' => $this->request->getPost('gender'),
                'image_user' => $namaFoto,
            ];
            $this->UserModel->save($data);
            session()->setFlashdata('message_success', 'Data Pengguna Berhasil Diupdate');
            return redirect()->to('/pengguna');
        }
    }
}
