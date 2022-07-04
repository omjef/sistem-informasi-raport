<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        if (session()->get('logged_in') == 'user') {
            $data = [
                'title' => 'Dashboard'
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
                'title' => 'Nilai Siswa'
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
                'title' => 'Absensi Siswa'
            ];
            return view('pages/user/absensi', $data);
        } else {
            return redirect()->to('/auth');
        }
    }
}
