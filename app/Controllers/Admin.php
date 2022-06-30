<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        return view('pages/admin/dashboard');
    }

    //siswa
    public function akun_siswa()
    {
        return view('pages/admin/akun_siswa');
    }

    public function tambah_akun_siswa()
    {
        return view('pages/admin/tambah_akun_siswa');
    }

    public function tambah_siswa()
    {
        return view('pages/admin/tambah_siswa');
    }

    public function data_siswa()
    {
        return view('pages/admin/data_siswa');
    }

    //guru
    public function akun_guru()
    {
        return view('pages/admin/akun_guru');
    }

    public function tambah_akun_guru()
    {
        return view('pages/admin/tambah_akun_guru');
    }

    public function tambah_guru()
    {
        return view('pages/admin/tambah_guru');
    }

    public function data_guru()
    {
        return view('pages/admin/data_guru');
    }
}
