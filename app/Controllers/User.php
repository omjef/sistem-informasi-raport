<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        if (session()->get('logged_in') == 'user') {
            $siswa = $this->SiswaModel->where('nisn', session()->get('nisn'))->first();

            $data = [
                'title' => 'Dashboard',
                'nama' => $siswa['nama']
            ];
            return view('pages/user/dashboard', $data);
        } else {
            return redirect()->to('/auth');
        }
    }

    public function nilai()
    {
        if (session()->get('logged_in') == 'user') {
            $siswa = $this->SiswaModel->where('nisn', session()->get('nisn'))->first();
            $kelas = $this->KelasModel;
            $ta = $this->TahunAjaranModel;
            $guru = $this->GuruModel;
            $mapel = $this->MapelModel;
            $nilai = $this->NilaiModel;

            $data = [
                'title' => 'Nilai Siswa',
                'nisn' => $siswa['nisn'],
                'nama' => $siswa['nama'],
                'foto' => $siswa['foto_siswa'],
                'kelas' => $kelas,
                'guru' => $guru,
                'mapel' => $mapel,
                'nilai' => $nilai,
                'ta' => $ta
            ];
            return view('pages/user/lihat_nilai', $data);
        } else {
            return redirect()->to('/auth');
        }
    }

    public function absensi()
    {
        if (session()->get('logged_in') == 'user') {
            $siswa = $this->SiswaModel->where('nisn', session()->get('nisn'))->first();
            $kelas = $this->KelasModel;
            $absensi = $this->AbsensiModel;
            $guru = $this->GuruModel;
            $data = [
                'title' => 'Absensi Siswa',
                'nisn' => $siswa['nisn'],
                'nama' => $siswa['nama'],
                'foto' => $siswa['foto_siswa'],
                'absensi' => $absensi,
                'kelas' => $kelas,
                'guru' => $guru
            ];
            return view('pages/user/absensi', $data);
        } else {
            return redirect()->to('/auth');
        }
    }

    public function profil()
    {
        if (session()->get('logged_in') == 'user') {
            $data = [
                'title' => 'Profil Siswa',
                'nisn' => session()->get('nisn'),
                'nama' => $this->query('nama'),
                'foto' => $this->query('foto_siswa'),
                'siswa' => $this->SiswaModel
            ];
            return view('pages/user/profil', $data);
        } else {
            return redirect()->to('/auth');
        }
    }
}
