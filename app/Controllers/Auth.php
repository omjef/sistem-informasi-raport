<?php

namespace App\Controllers;

use App\Models\AkunGuruModel;
use App\Models\AkunSiswaModel;

class Auth extends BaseController
{
    public function index()
    {
        if (session()->get('logged_in') == 'admin') {
            return redirect()->to('/admin');
        } elseif (session()->get('logged_in') == 'user') {
            return redirect()->to('/user');
        } else {
            $data = [
                'title' => 'SDN 2 Kersanagara',
                'validation' => \Config\Services::validation()
            ];
            return view('pages/login_user', $data);
        }
    }

    public function auth_user()
    {
        if (session()->get('logged_in') == 'admin') {
            return redirect()->to('/admin');
        } elseif (session()->get('logged_in') == 'user') {
            return redirect()->to('/user');
        } else {
            if (!$this->validate([
                'username' => [
                    'rules' => 'required|',
                    'errors' => [
                        'required' => '{field} harus di isi'
                    ]
                ],
                'password' => [
                    'rules' => 'required|',
                    'errors' => [
                        'required' => '{field} harus di isi'
                    ]
                ],
            ])) {
                $validation = \Config\Services::validation();
                return redirect()->to('/auth')->withInput()->withInput('validation', $validation);
            }
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');

            $user = $this->AkunSiswaModel->where('username', $username)->first();
            if ($user) {
                if ($user['status_akun'] == 'Aktif') {
                    $password_match = password_verify($password, $user['password']);
                    if ($password_match) {
                        $data_session = [
                            'nisn' => $user['nisn'],
                            'logged_in' => 'user'
                        ];
                        session()->set($data_session);
                        return redirect()->to('/user');
                    } else {
                        session()->setFlashdata('msg', 'Password yang anda masukan salah!');
                        return redirect()->to('/auth');
                    }
                } else {
                    session()->setFlashdata('msg', 'Akun sudah tidak aktif!');
                    return redirect()->to('/auth');
                }
            } else {
                session()->setFlashdata('msg', 'Akun tidak ditemukan!');
                return redirect()->to('/auth');
            }
        }
    }

    public function admin()
    {
        if (session()->get('logged_in') == 'admin') {
            return redirect()->to('/admin');
        } elseif (session()->get('logged_in') == 'user') {
            return redirect()->to('/user');
        } else {
            $data = [
                'title' => 'Admin SDN 2 Kersanagara',
                'validation' => \Config\Services::validation()
            ];
            return view('pages/login_admin', $data);
        }
    }

    public function auth_admin()
    {
        if (session()->get('logged_in') == 'admin') {
            return redirect()->to('/admin');
        } elseif (session()->get('logged_in') == 'user') {
            return redirect()->to('/user');
        } else {
            if (!$this->validate([
                'username' => [
                    'rules' => 'required|',
                    'errors' => [
                        'required' => '{field} harus di isi'
                    ]
                ],
                'password' => [
                    'rules' => 'required|',
                    'errors' => [
                        'required' => '{field} harus di isi'
                    ]
                ],
            ])) {
                $validation = \Config\Services::validation();
                return redirect()->to('/auth/admin')->withInput()->withInput('validation', $validation);
            }
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');

            $admin = $this->AkunGuruModel->where('username', $username)->first();
            if ($admin) {
                if ($admin['status_akun'] == 'Aktif') {
                    $password_match = password_verify($password, $admin['password']);
                    if ($password_match) {
                        $data_session = [
                            'nip' => $admin['nip'],
                            'logged_in' => 'admin'
                        ];
                        session()->set($data_session);
                        return redirect()->to('/admin');
                    } else {
                        session()->setFlashdata('msg', 'Password yang anda masukan salah!');
                        return redirect()->to('/auth/admin');
                    }
                } else {
                    session()->setFlashdata('msg', 'Akun sudah tidak aktif!');
                    return redirect()->to('/auth/admin');
                }
            } else {
                session()->setFlashdata('msg', 'Akun tidak ditemukan!');
                return redirect()->to('/auth/admin');
            }
        }
    }

    public function lupa_akun()
    {
        if (session()->get('logged_in') == 'admin') {
            return redirect()->to('/admin');
        } elseif (session()->get('logged_in') == 'user') {
            return redirect()->to('/user');
        } else {
            $data = [
                'title' => 'Lupa Akun'
            ];
            return view('pages/lupa_akun', $data);
        }
    }

    public function logout()
    {
        if (session()->get('logged_in') == 'admin') :
            session()->destroy();
            return redirect()->to('/auth/admin');
        elseif (session()->get('logged_in') == 'user') :
            session()->destroy();
            return redirect()->to('/auth');
        else :
            session()->destroy();
            return redirect()->to('/auth');
        endif;
    }
}
