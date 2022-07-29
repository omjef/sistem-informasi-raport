<?php

namespace App\Controllers;

class Admin extends BaseController
{
    function guru($value)
    {
        $nip = session()->nip;

        $guru = $this->GuruModel->where('nip', $nip)->first();
        return $guru[$value];
    }

    public function index()
    {
        if (session()->get('logged_in') == 'admin') {
            $data = [
                'title' => 'Dashboard',
                'nama' => $this->guru('nama')
            ];
            return view('pages/admin/dashboard', $data);
        } else {
            return redirect()->to('/auth');
        }
    }

    //Akun Guru dan Siswa
    public function tambah_akun_guru()
    {
        if (session()->get('logged_in') == 'admin') {
            $data = [
                'title' => 'Tambah Akun Guru',
                'nama' => $this->guru('nama')
            ];
            return view('pages/admin/tambah_akun_guru', $data);
        } else {
            return redirect()->to('/admin_login');
        }
    }

    public function lihat_akun_guru()
    {
        if (session()->get('logged_in') == 'admin') {
            $data = [
                'title' => 'Lihat Akun Guru',
                'nama' => $this->guru('nama'),
                'akun' => $this->AkunGuruModel
            ];
            return view('pages/admin/lihat_akun_guru', $data);
        } else {
            return redirect()->to('/admin_login');
        }
    }

    public function validasi_tambah_akun_guru()
    {
        $nip = $this->request->getVar('nip');
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $akun = $this->GuruModel->where('nip', $nip)->first();
        $data = $this->AkunGuruModel->where('nip', $nip)->first();
        if ($akun) {
            if ($data) {
                echo "Gagal di tambah";
            } else {
                $data = [
                    'nip' => $nip,
                    'username' => $username,
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                    'is_aktif' => 1
                ];
                $this->AkunGuruModel->insert($data);
            }
        } else {
            echo "Nip tidak ditemukan";
        }
    }
}
