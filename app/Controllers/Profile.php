<?php

namespace App\Controllers;

use App\Models\UserModel;
use Myth\Auth\Password;

class Profile extends BaseController
{
    private $UserModel;
    public function __construct()
    {
        $this->UserModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Profile',
            'page' => 'profile',
            'user' => $this->UserModel->getUserWithRole(),
            'validation' => \Config\Services::validation(),
        ];
        // dd($data);
        return view('profile/index', $data);
    }

    public function profileEdit()
    {
        if ($this->request->getPost('username') == user()->username) {
            $ruleUsername = 'required';
        } else {
            $ruleUsername = 'required|alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username]';
        }
        if (!$this->validate([
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
                'rules' => 'required|alpha_space|min_length[3]|max_length[200]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'alpha_space' => '{field} hanya boleh berisi alphabet dan spasi.',
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
            'phone' => [
                'label' => 'No HP',
                'rules' => 'required|numeric|min_length[8]|max_length[16]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'numeric' => '{field} hanya boleh berisi number.',
                    'min_length' => '{field} minimal berisi {param} karakter.',
                    'max_length' => '{field} maksimal berisi {param} karakter.',
                ]
            ],
        ])) {
            return redirect()->back()->with('tag', 'uprofil')->withInput();
        } else {
            $data = [
                'id' => user_id(),
                'username' => $this->request->getPost('username'),
                'fullname' => $this->request->getPost('fullname'),
                'gender' => $this->request->getPost('gender'),
                'phone' => $this->request->getPost('phone'),
            ];
            // dd($data);
            $this->UserModel->save($data);
            session()->setFlashdata('message_success', 'Data Profil Berhasil Diupdate');
            return redirect()->back()->with('tag', 'uprofil');
        }
    }

    public function profileEditImage()
    {
        if (!$this->validate([
            'image_user' => [
                'label' => 'Foto profil',
                'rules' => 'uploaded[image_user]|max_size[image_user,4096]|is_image[image_user]|mime_in[image_user,image/png,image/jpg,image/jpeg,image/gif]',
                'errors' => [
                    'uploaded' => '{field} harus diisi.',
                    'max_size' => '{field} ukuran maksimal 4MB.',
                    'is_image' => '{field} yang dipilih bukan gambar.',
                    'mime_in' => '{field} yang dipilih bukan gambar.',
                ]
            ],
        ])) {
            return redirect()->back()->with('tag', 'ufoto')->withInput();
        } else {
            $fileProfil = $this->request->getFile('image_user');
            $oldImage = user()->image_user;
            $id = user_id();
            $email = $this->UserModel->find($id);
            if ($fileProfil->getError() == 4) {
                $namaFoto = $oldImage;
            } else {
                if (file_exists("uploads/image_user/" . $oldImage)) {
                    if ($oldImage != 'default.png') {
                        unlink("uploads/image_user/" . $oldImage);
                    }
                }
                $namaFoto = url_title($email->email, '_', true) . '_image_user.' . $fileProfil->getExtension();
                $fileProfil->move('uploads/image_user', $namaFoto);
                $namaFoto = $fileProfil->getName();
            }
            $data = [
                'id' => user_id(),
                'image_user' => $namaFoto
            ];
            // 			dd($data);
            $this->UserModel->save($data);
            session()->setFlashdata('message_success', 'Foto Profil Berhasil Diupdate');
            return redirect()->back()->with('tag', 'ufoto');
        }
    }

    public function profileEditPassword()
    {
        if (!$this->validate([
            'password_lm' => [
                'label' => 'Password lama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'password_br' => [
                'label' => 'Password baru',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'password_br2' => [
                'label' => 'Ulangi password',
                'rules' => 'required|matches[password_br]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'matches' => '{field} tidak cocok.',
                ]
            ],
        ])) {
            return redirect()->back()->with('tag', 'upassword')->withInput();
        } else {
            $passLama = $this->request->getPost('password_lm');
            $check = Password::verify($passLama, user()->password_hash);
            if ($check == false) {
                session()->setFlashdata('message_error', 'Password Lama Tidak Cocok');
                return redirect()->back()->with('tag', 'upassword')->withInput();
            }
            $passBaru = Password::hash($this->request->getPost('password_br'));
            $data = [
                'id' => user_id(),
                'password_hash' => $passBaru
            ];
            // dd($data);
            $this->UserModel->save($data);
            session()->setFlashdata('message_success', 'Password Berhasil Diubah');
            return redirect()->to('/profile')->with('tag', 'upassword');
        }
    }
}
