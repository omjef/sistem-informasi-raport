<?php

namespace App\Controllers;

use App\Models\AkunGuruModel;
use App\Models\AkunSiswaModel;

class Auth extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'SDN 2 Kersanagara'
        ];
        return view('pages/login', $data);
    }

    public function admin()
    {
        $data = [
            'title' => 'Admin Login'
        ];
        return view('pages/admin_login', $data);
    }

    public function auth_login()
    {
        $session = session();
        $AkunSiswaModel = new AkunSiswaModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $data = $AkunSiswaModel->where('username', $username)->first();
        if ($data) {
            $is_aktif = $data['is_aktif'];
            if ($is_aktif == 1) {
                $pass = $data['password'];
                $verify_pass = password_verify($password, $pass);
                if ($verify_pass) {
                    $session_data = [
                        'nisn' => $data['nisn'],
                        'logged_in' => true
                    ];
                    $session->set($session_data);
                } else {
                    $session->setFlashdata('msg', 'Password yang anda masukan salah');
                    return redirect()->to('/auth');
                }
            } else {
                $session->setFlashdata('msg', 'Akun tidak aktif');
                return redirect()->to('/auth');
            }
        } else {
            $session->setFlashdata('msg', 'Akun tidak di temukan');
            return redirect()->to('/auth');
        }
    }

    public function auth_admin()
    {
        $session = session();
        $AkunGuruModel = new AkunGuruModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $AkunGuruModel->where('username', $username)->first();
        if ($data) {
            $is_aktif = $data['is_aktif'];
            if ($is_aktif == 1) {
                $pass = $data['password'];
                $verify_pass = password_verify($password, $pass);
                if ($verify_pass) {
                    $session_data = [
                        'nisn' => $data['nisn'],
                        'role' => $data['role'],
                        'logged_in' => true
                    ];
                    $session->set($session_data);
                } else {
                    $session->setFlashdata('msg', 'Password yang anda masukan salah');
                    return redirect()->to('/auth');
                }
            } else {
                $session->setFlashdata('msg', 'Akun tidak aktif');
                return redirect()->to('/auth');
            }
        } else {
            $session->setFlashdata('msg', 'Akun tidak di temukan');
            return redirect()->to('/auth');
        }
    }

    public function lupa_akun()
    {
        $data = [
            'title' => 'Lupa Akun'
        ];
        return view('pages/lupa_akun', $data);
    }

    public function logout()
    {
    }
}
