<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('pages/user/dashboard', $data);
    }

    public function nilai()
    {
        $data = [
            'title' => 'Nilai Siswa'
        ];
        return view('pages/user/lihat_nilai', $data);
    }

    public function absensi()
    {
        $data = [
            'title' => 'Absensi Siswa'
        ];
        return view('pages/user/absensi', $data);
    }
}
