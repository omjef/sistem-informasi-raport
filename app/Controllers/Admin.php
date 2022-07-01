<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('pages/admin/dashboard');
    }

    //siswa
    public function akun_siswa()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('pages/admin/akun_siswa');
    }

    public function tambah_akun_siswa()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('pages/admin/tambah_akun_siswa');
    }

    public function tambah_siswa()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('pages/admin/tambah_siswa');
    }

    public function data_siswa()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('pages/admin/data_siswa');
    }

    //Validasi Data Siswa

    //guru
    public function akun_guru()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('pages/admin/akun_guru');
    }

    public function tambah_akun_guru()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('pages/admin/tambah_akun_guru');
    }

    public function tambah_guru()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('pages/admin/tambah_guru');
    }

    public function data_guru()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('pages/admin/data_guru');
    }

    //validasi data Guru
    public function val_tambah_guru()
    {
    }
}
