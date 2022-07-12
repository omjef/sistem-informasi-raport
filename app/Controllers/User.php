<?php

namespace App\Controllers;

class User extends BaseController
{
    private function query($db)
    {
        $siswa = $this->SiswaModel;
        $nisn = session()->get('nisn');
        $query = $siswa->where('nisn', $nisn)->first();
        return $query[$db];
    }
    public function index()
    {
        if (session()->get('logged_in') == 'user') {

            $data = [
                'title' => 'Dashboard',
                'nama' => $this->query('nama'),
                'foto' => $this->query('foto_siswa')
            ];
            return view('pages/user/dashboard', $data);
        } else {
            return redirect()->to('/auth');
        }
    }

    public function nilai()
    {
        if (session()->get('logged_in') == 'user') {
            $data = [
                'title' => 'Nilai Siswa',
                'nama' => $this->query('nama'),
                'foto' => $this->query('foto_siswa')
            ];
            return view('pages/user/lihat_nilai', $data);
        } else {
            return redirect()->to('/auth');
        }
    }

    public function absensi()
    {
        if (session()->get('logged_in') == 'user') {
            $data = [
                'title' => 'Absensi Siswa',
                'nama' => $this->query('nama'),
                'foto' => $this->query('foto_siswa')
            ];
            return view('pages/user/absensi', $data);
        } else {
            return redirect()->to('/auth');
        }
    }
}
