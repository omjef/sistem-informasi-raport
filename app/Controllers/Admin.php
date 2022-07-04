<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        if (session()->get('logged_in') == 'admin') {
            $data = [
                'title' => 'Dashboard'
            ];
            return view('pages/admin/dashboard');
        } else {
            return redirect()->to('/auth');
        }
    }

    //siswa
    public function akun_siswa()
    {
        if (session()->get('logged_in') == 'admin') {
            $data = [
                'title' => 'Dashboard'
            ];
            return view('pages/admin/akun_siswa');
        } else {
            return redirect()->to('/auth');
        }
    }

    public function tambah_akun_siswa()
    {
        if (session()->get('logged_in') == 'admin') {
            $data = [
                'title' => 'Dashboard'
            ];
            return view('pages/admin/tambah_akun_siswa');
        } else {
            return redirect()->to('/auth');
        }
    }

    public function tambah_siswa()
    {
        if (session()->get('logged_in') == 'admin') {
            $data = [
                'title' => 'Dashboard'
            ];
            return view('pages/admin/tambah_siswa');
        } else {
            return redirect()->to('/auth');
        }
    }

    public function data_siswa()
    {
        if (session()->get('logged_in') == 'admin') {
            $data = [
                'title' => 'Dashboard'
            ];
            return view('pages/admin/data_siswa');
        } else {
            return redirect()->to('/auth');
        }
    }

    //Validasi Data Siswa

    //guru
    public function akun_guru()
    {
        if (session()->get('logged_in') == 'admin') {
            $data = [
                'title' => 'Dashboard'
            ];
            return view('pages/admin/akun_guru');
        } else {
            return redirect()->to('/auth');
        }
    }

    public function tambah_akun_guru()
    {
        if (session()->get('logged_in') == 'admin') {
            $data = [
                'title' => 'Dashboard'
            ];
            return view('pages/admin/tambah_akun_guru');
        } else {
            return redirect()->to('/auth');
        }
    }

    public function tambah_guru()
    {
        if (session()->get('logged_in') == 'admin') {
            $data = [
                'title' => 'Dashboard'
            ];
            return view('pages/admin/tambah_guru');
        } else {
            return redirect()->to('/auth');
        }
    }

    public function data_guru()
    {
        if (session()->get('logged_in') == 'admin') {
            $data = [
                'title' => 'Dashboard'
            ];
            return view('pages/admin/data_guru');
        } else {
            return redirect()->to('/auth');
        }
    }

    //validasi data Guru
    public function val_tambah_guru()
    {
    }
}
