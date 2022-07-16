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
                'nisn' => session()->get('nisn'),
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
                'nisn' => session()->get('nisn'),
                'nama' => $this->query('nama'),
                'foto' => $this->query('foto_siswa'),
                'kelas' => $this->KelasModel,
                'guru' => $this->GuruModel,
                'mapel' => $this->MapelModel,
                'nilai' => $this->NilaiModel
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
                'nisn' => session()->get('nisn'),
                'nama' => $this->query('nama'),
                'foto' => $this->query('foto_siswa'),
                'absensi' => $this->AbsensiModel,
                'kelas' => $this->KelasModel,
                'guru' => $this->GuruModel
            ];
            return view('pages/user/absensi', $data);
        } else {
            return redirect()->to('/auth');
        }
    }
}
