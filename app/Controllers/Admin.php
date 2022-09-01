<?php

namespace App\Controllers;

use \Dompdf\Dompdf;

class Admin extends BaseController
{
    public function index()
    {
        if (session()->get('logged_in') == 'admin') {
            $guru = $this->GuruModel->where('nip', session()->get('nip'))->first();

            $data = [
                'title' => 'Dashboard',
                'nama' => $guru['nama'],
                'dataGuru' => $this->GuruModel,
                'dataSiswa' => $this->SiswaModel
            ];
            return view('pages/admin/dashboard', $data);
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    //--------------------------------RUANG ADMIN-------------------------------------------
    public function akun_guru()
    {
        if (session()->get('logged_in') == 'admin') {
            $guru = $this->GuruModel->where('nip', session()->get('nip'))->first();

            $akunGuru = $this->AkunGuruModel;
            $dataGuru = $this->GuruModel;

            $data = [
                'title' => 'Kelola Akun Guru',
                'nama' => $guru['nama'],
                'akunGuru' => $akunGuru,
                'dataGuru' => $dataGuru
            ];

            return view('pages/admin/akunGuru', $data);
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    function val_takunguru()
    {
        if (session()->get('logged_in') == 'admin') {
            $nip = $this->request->getVar('nip');
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            $konfirmasi_password = $this->request->getVar('konfirmasi_password');
            $jenis_akun = $this->request->getVar('jenis_akun');
            $status_akun = 'Aktif';

            $akunGuru = $this->AkunGuruModel->where('nip', $nip)->first();
            if ($akunGuru) {
                session()->setFlashdata('gagal', 'NIP sudah digunakan!');
                return redirect()->to('/admin/akun_guru');
            } else {
                if ($password == $konfirmasi_password) {
                    $data = [
                        'nip' => $nip,
                        'username' => $username,
                        'password' => password_hash($password, PASSWORD_DEFAULT),
                        'jenis_akun' => $jenis_akun,
                        'status_akun' => $status_akun
                    ];
                    $this->AkunGuruModel->insert($data);
                    session()->setFlashdata('berhasil', 'Akun guru berhasil ditambah!');
                    return redirect()->to('/admin/akun_guru');
                } else {
                    session()->setFlashdata('gagal', 'Password tidak sama!');
                    return redirect()->to('/admin/akun_guru');
                }
            }
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function edit_akunguru()
    {
        if (session()->get('logged_in') == 'admin') {
            $guru = $this->GuruModel->where(
                'nip',
                session()->get('nip')
            )->first();
            $akunGuru = $this->AkunGuruModel;
            $dataGuru = $this->GuruModel;

            $data = [
                'title' => 'Kelola Akun Guru', 'nama' => $guru['nama'], 'akunGuru' => $akunGuru, 'dataGuru' => $dataGuru
            ];

            return view(
                'pages/admin/edit_akunGuru',
                $data
            );
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function val_edit_akunguru()
    {
        if (session()->get('logged_in') == 'admin') {
            $id = $this->request->getVar('id');
            $nip = $this->request->getVar('nip');
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            $konfirmasi_password = $this->request->getVar('konfirmasi_password');
            $jenis_akun = $this->request->getVar('jenis_akun');
            $status_akun = $this->request->getVar('status_akun');

            if ($password != NULL) {
                if (hash_equals($password, $konfirmasi_password)) {
                    $data = ['nip' => $nip, 'username' => $username, 'password' => password_hash($password, PASSWORD_DEFAULT), 'jenis_akun' => $jenis_akun, 'status_akun' => $status_akun];
                    $this->AkunGuruModel->update($id, $data);
                    session()->setFlashdata('berhasil', 'Data berhasil diupdate!');
                    return redirect()->to('/admin/akun_guru');
                } else {
                    session()->setFlashdata('gagal', 'Password dan konfirmasi password tidak sama!');
                    return redirect()->to('/admin/edit_akunguru?nip=' . $nip);
                }
            } else {
                $data = ['nip' => $nip, 'username' => $username, 'jenis_akun' => $jenis_akun, 'status_akun' => $status_akun];
                $this->AkunGuruModel->update($id, $data);
                session()->setFlashdata('berhasil', 'Data berhasil diupdate!');
                return redirect()->to('/admin/akun_guru');
            }
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function hapus_akunguru()
    {
        if (session()->get('logged_in') == 'admin') {
            $nip = $this->request->getVar('nip');
            $this->AkunGuruModel->where('nip', $nip)->delete();
            session()->setFlashdata('berhasil', 'Data berhasil dihapus!');
            return redirect()->to('/admin/akun_guru');
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function akun_siswa()
    {
        if (session()->get('logged_in') == 'admin') {
            $guru = $this->GuruModel->where(
                'nip',
                session()->get('nip')
            )->first();
            $akunSiswa = $this->AkunSiswaModel;
            $dataSiswa = $this->SiswaModel;
            $data = [
                'title' => 'Kelola Akun Siswa', 'nama' => $guru['nama'], 'akunSiswa' => $akunSiswa, 'dataSiswa' => $dataSiswa
            ];

            return view(
                '/pages/admin/akunSiswa',
                $data
            );
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function val_takunsiswa()
    {
        if (session()->get('logged_in') == 'admin') {
            $nisn = $this->request->getVar('nisn');
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            $konfirmasi_password = $this->request->getVar('konfirmasi_password');
            $status_akun = 'Aktif';
            if ($password != NULL) {
                if (hash_equals($password, $konfirmasi_password)) {
                    $data = ['nisn' => $nisn, 'username' => $username, 'password' => password_hash($password, PASSWORD_DEFAULT), 'status_akun' => $status_akun];
                    $this->AkunSiswaModel->insert($data);
                    session()->setFlashdata('berhasil', 'Password tidak sama!');
                    return redirect()->to('/admin/akun_siswa');
                } else {
                    session()->setFlashdata('gagal', 'Password dan konfirmasi password tidak sama!');
                    return redirect()->to('/admin/akun_siswa');
                }
            } else {
                session()->setFlashdata('gagal', 'Password jangan kosong!');
                return redirect()->to('/admin/akun_siswa');
            }
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function edit_akunsiswa()
    {
        if (session()->get('logged_in') == 'admin') {
            $guru = $this->GuruModel->where('nip', session()->get('nip'))->first();
            $dataSiswa = $this->SiswaModel;
            $akunSiswa = $this->AkunSiswaModel;
            $data = [
                'title' => 'Kelola Akun Siswa',
                'nama' => $guru['nama'],
                'dataSiswa' => $dataSiswa,
                'akunSiswa' => $akunSiswa,
                'nisn' => $this->request->getVar('nisn')
            ];
            return view(
                'pages/admin/edit_akunSiswa',
                $data
            );
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function val_edit_akunsiswa()
    {
        if (session()->get('logged_in') == 'admin') {
            $nisn = $this->request->getVar('nisn');
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            $konfirmasi_password = $this->request->getVar('konfirmasi_password');
            $status_akun = $this->request->getVar('status_akun');

            $tempAkunSiswa = $this->AkunSiswaModel->where('nisn', $nisn)->first();
            $id = $tempAkunSiswa['id'];
            if ($password != NULL) {
                if (hash_equals($password, $konfirmasi_password)) {
                    $data = ['nisn' => $nisn, 'username' => $username, 'password' => password_hash($password, PASSWORD_DEFAULT), 'status_akun' => $status_akun];
                    $this->AkunSiswaModel->update($id, $data);
                    session()->setFlashdata('berhasil', 'Data berhasil diupdate!');
                    return redirect()->to('/admin/akun_siswa');
                } else {
                    session()->setFlashdata('gagal', 'Password jangan kosong!');
                    return redirect()->to('/admin/edit_akunsiswa' . '?nisn=' . $nisn);
                }
            } else {
                $data = ['nisn' => $nisn, 'username' => $username, 'status_akun' => $status_akun];
                $this->AkunSiswaModel->update($id, $data);
                session()->setFlashdata('berhasil', 'Data berhasil diupdate!');
                return redirect()->to('/admin/akun_siswa');
            }
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function hapus_akunsiswa()
    {
        if (session()->get('logged_in') == 'admin') {
            $nisn = $this->request->getVar('nisn');
            $this->AkunSiswaModel->where('nisn', $nisn)->delete();
            session()->setFlashdata('berhasil', 'Akun Berhasil dihapus!');
            return redirect()->to('/admin/akun_siswa');
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    //--------------------------------RUANG OPERATOR-------------------------------------------
    public function data_sekolah()
    {
        if (session()->get('logged_in') == 'admin') {
            $dataGuru = $this->GuruModel->where(
                'nip',
                session()->get('nip')
            )->first();
            $data = [
                'title' => 'Data Sekolah', 'nama' => $dataGuru['nama'], 'dataSekolah' => $this->SekolahModel
            ];
            return view(
                'pages/admin/dataSekolah',
                $data
            );
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function edit_datasekolah()
    {
        if (session()->get('logged_in') == 'admin') {
            $dataGuru = $this->GuruModel->where(
                'nip',
                session()->get('nip')
            )->first();
            $data = [
                'title' => 'Data Sekolah', 'nama' => $dataGuru['nama'], 'dataSekolah' => $this->SekolahModel
            ];
            return view(
                'pages/admin/edit_dataSekolah',
                $data
            );
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function val_edit_datasekolah()
    {
        if (session()->get('logged_in') == 'admin') {
            $nss = $this->request->getVar('nss');
            $npsn = $this->request->getVar('npsn');
            $nama = $this->request->getVar('nama');
            $alamat = $this->request->getVar('alamat');
            $kelurahan = $this->request->getVar('kelurahan');
            $kecamatan = $this->request->getVar('kecamatan');
            $kota = $this->request->getVar('kota');
            $provinsi = $this->request->getVar('provinsi');
            $website = $this->request->getVar('website');
            $email = $this->request->getVar('email');
            $data = [
                'nss' => $nss, 'npsn' => $npsn, 'nama' => $nama, 'alamat' => $alamat, 'kelurahan' => $kelurahan, 'kecamatan' => $kecamatan, 'kota' => $kota, 'provinsi' => $provinsi, 'website' => $website, 'email' => $email
            ];
            $this->SekolahModel->update($nss, $data);
            session()->setFlashdata('berhasil', 'Data sekolah berhasil diupadate!');
            return redirect()->to('/admin/data_sekolah');
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function data_guru()
    {
        if (session()->get('logged_in') == 'admin') {
            $dataGuru = $this->GuruModel->where(
                'nip',
                session()->get('nip')
            )->first();
            $guru = $this->GuruModel;
            $data = [
                'title' => 'Data Guru', 'nama' => $dataGuru['nama'], 'dataGuru' => $guru
            ];
            return view(
                'pages/admin/dataGuru',
                $data
            );
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function tambah_dataguru()
    {
        if (session()->get('logged_in') == 'admin') {
            $dataGuru = $this->GuruModel->where(
                'nip',
                session()->get('nip')
            )->first();
            $data = [
                'title' => 'Data Guru', 'nama' => $dataGuru['nama'], 'validation' => \Config\Services::validation()
            ];
            return view(
                'pages/admin/tambah_dataguru',
                $data
            );
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function val_tambah_dataguru()
    {
        if (session()->get('logged_in') == 'admin') {
            if (!$this->validate(
                ['nip' => ['rules' => 'required|', 'errors' => ['required' => 'NIP harus di isi']], 'nuptk' => ['rules' => 'required|', 'errors' => ['required' => 'NUPTK harus di isi']], 'nama' => ['rules' => 'required|', 'errors' => ['required' => 'Nama harus di isi']], 'tempat_lahir' => ['rules' => 'required|', 'errors' => ['required' => 'Tempat lahir harus di isi']], 'tanggal_lahir' => ['rules' => 'required|', 'errors' => ['required' => 'Tanggal lahir harus di isi']], 'agama' => ['rules' => 'required|', 'errors' => ['required' => 'Agama harus di isi']], 'ijazah' => ['rules' => 'required|', 'errors' => ['required' => 'Ijazah harus di isi']], 'tahun_ijazah' => ['rules' => 'required|', 'errors' => ['required' => 'Tahun ijazah harus di isi']], 'tanggal_diangkat' => ['rules' => 'required|', 'errors' => ['required' => 'Tanggal diangkat harus di isi']], 'tanggal_bekerja' => ['rules' => 'required|', 'errors' => ['required' => 'Tanggal bekerja harus di isi']], 'tanggal_pensiun' => ['rules' => 'required|', 'errors' => ['required' => 'Tanggal pensiun harus di isi']], 'jam_mengajar' => ['rules' => 'required|', 'errors' => ['required' => 'Jumlah jam mengajar harus di isi']],]
            )) {
                $validation = \Config\Services::validation();
                return redirect()->to('/admin/tambah_dataguru')->withInput()->withInput('validation', $validation);
            }

            $nip = $this->request->getVar('nip');
            $nuptk = $this->request->getVar('nuptk');
            $nama = $this->request->getVar('nama');
            $tempat_lahir = $this->request->getVar('tempat_lahir');
            $tanggal_lahir = $this->request->getVar('tanggal_lahir');
            $jenis_kelamin = $this->request->getVar('jenis_kelamin');
            $agama = $this->request->getVar('agama');
            $ijazah = $this->request->getVar('ijazah');
            $tahun_ijazah = $this->request->getVar('tahun_ijazah');
            $jenis_guru = $this->request->getVar('jenis_guru');
            $tanggal_diangkat = $this->request->getVar('tanggal_diangkat');
            $tanggal_bekerja = $this->request->getVar('tanggal_bekerja');
            $tanggal_pensiun = $this->request->getVar('tanggal_pensiun');
            $kelas_diampu = $this->request->getVar('kelas_diampu');
            $jam_mengajar = $this->request->getVar('jam_mengajar');
            $foto_guru = $this->request->getFile('foto');

            if ($foto_guru->getError() == 4) {
                $nama_foto = "Default.jpg";
            } else {
                $nama_foto = $nip . '-' . $nama . '.' . $foto_guru->getClientExtension();
                $foto_guru->move('img', $nama_foto);
            }

            $data = [
                'nip' => $nip, 'nuptk' => $nuptk, 'nama' => $nama, 'tempat_lahir' => $tempat_lahir, 'tanggal_lahir' => $tanggal_lahir, 'jenis_kelamin' => $jenis_kelamin, 'agama' => $agama, 'ijazah' => $ijazah, 'tahun_ijazah' => $tahun_ijazah, 'jenis_guru' => $jenis_guru, 'tanggal_diangkat' => $tanggal_diangkat, 'tanggal_bekerja' => $tanggal_bekerja, 'tanggal_pensiun' => $tanggal_pensiun, 'kelas_diampu' => $kelas_diampu, 'jam_mengajar' => $jam_mengajar, 'status_guru' => 'Aktif', 'foto_guru' => $nama_foto
            ];

            $this->GuruModel->insert($data);
            session()->setFlashdata('berhasil', 'Data berhasil ditambah!');
            return redirect()->to('/admin/data_guru');
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function edit_dataguru()
    {
        if (session()->get('logged_in') == 'admin') {
            $dataGuru = $this->GuruModel->where(
                'nip',
                session()->get('nip')
            )->first();
            $nip = $this->request->getVar('nip');
            $data = [
                'title' => 'Data Guru', 'nama' => $dataGuru['nama'], 'nip' => $nip, 'dataGuru' => $this->GuruModel, 'validation' => \Config\Services::validation()
            ];
            return view(
                'pages/admin/edit_dataguru',
                $data
            );
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function val_edit_dataguru()
    {
        if (session()->get('logged_in') == 'admin') {
            if (!$this->validate([
                'nip' => ['rules' => 'required|', 'errors' => ['required' => 'NIP harus di isi']], 'nuptk' => ['rules' => 'required|', 'errors' => ['required' => 'NUPTK harus di isi']], 'nama' => ['rules' => 'required|', 'errors' => ['required' => 'Nama harus di isi']], 'tempat_lahir' => ['rules' => 'required|', 'errors' => ['required' => 'Tempat lahir harus di isi']], 'tanggal_lahir' => ['rules' => 'required|', 'errors' => ['required' => 'Tanggal lahir harus di isi']], 'agama' => ['rules' => 'required|', 'errors' => ['required' => 'Agama harus di isi']], 'ijazah' => ['rules' => 'required|', 'errors' => ['required' => 'Ijazah harus di isi']], 'tahun_ijazah' => ['rules' => 'required|', 'errors' => ['required' => 'Tahun ijazah harus di isi']], 'tanggal_diangkat' => ['rules' => 'required|', 'errors' => ['required' => 'Tanggal diangkat harus di isi']], 'tanggal_bekerja' => ['rules' => 'required|', 'errors' => ['required' => 'Tanggal bekerja harus di isi']], 'tanggal_pensiun' => ['rules' => 'required|', 'errors' => ['required' => 'Tanggal pensiun harus di isi']], 'jam_mengajar' => ['rules' => 'required|', 'errors' => ['required' => 'Jumlah jam mengajar harus di isi']],
            ])) {
                $validation = \Config\Services::validation();
                return redirect()->to('/admin/tambah_dataguru')->withInput()->withInput('validation', $validation);
            }
            $nip = $this->request->getVar('nip');
            $nuptk = $this->request->getVar('nuptk');
            $nama = $this->request->getVar('nama');
            $tempat_lahir = $this->request->getVar('tempat_lahir');
            $tanggal_lahir = $this->request->getVar('tanggal_lahir');
            $jenis_kelamin = $this->request->getVar('jenis_kelamin');
            $agama = $this->request->getVar('agama');
            $ijazah = $this->request->getVar('ijazah');
            $tahun_ijazah = $this->request->getVar('tahun_ijazah');
            $jenis_guru = $this->request->getVar('jenis_guru');
            $tanggal_diangkat = $this->request->getVar('tanggal_diangkat');
            $tanggal_bekerja = $this->request->getVar('tanggal_bekerja');
            $tanggal_pensiun = $this->request->getVar('tanggal_pensiun');
            $kelas_diampu = $this->request->getVar('kelas_diampu');
            $jam_mengajar = $this->request->getVar('jam_mengajar');
            $status_guru = $this->request->getVar('status_guru');
            $foto_guru = $this->request->getFile('foto');
            $dataGuru = $this->GuruModel->where('nip', $nip)->first();
            if ($foto_guru->getError() == 4) {
                $nama_foto = $dataGuru['foto_guru'];
            } else {
                $nama_foto = $nip . '.' . $foto_guru->getClientExtension();
                $foto_guru->move('img', $nama_foto);
            }
            $data = [
                'nip' => $nip,
                'nuptk' => $nuptk,
                'nama' => $nama,
                'tempat_lahir' => $tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'jenis_kelamin' => $jenis_kelamin,
                'agama' => $agama,
                'ijazah' => $ijazah,
                'tahun_ijazah' => $tahun_ijazah,
                'jenis_guru' => $jenis_guru,
                'tanggal_diangkat' => $tanggal_diangkat,
                'tanggal_bekerja' => $tanggal_bekerja,
                'tanggal_pensiun' => $tanggal_pensiun,
                'kelas_diampu' => $kelas_diampu,
                'jam_mengajar' => $jam_mengajar,
                'status_guru' => $status_guru,
                'foto_guru' => $nama_foto
            ];
            $this->GuruModel->update($nip, $data);
            session()->setFlashdata('berhasil', 'Data berhasil diupdate!');
            return redirect()->to('/admin/data_guru');
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function data_siswa()
    {
        if (session()->get('logged_in') == 'admin') {
            $dataGuru = $this->GuruModel->where('nip', session()->get('nip'))->first();
            $data = [
                'title' => 'Data Siswa', 'nama' => $dataGuru['nama'], 'dataSiswa' => $this->SiswaModel
            ];
            return view('pages/admin/dataSiswa', $data);
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function tambah_datasiswa()
    {
        if (session()->get('logged_in') == 'admin') {
            $dataGuru = $this->GuruModel->where(
                'nip',
                session()->get('nip')
            )->first();

            $data = [
                'title' => 'Data Siswa', 'nama' => $dataGuru['nama'], 'validation' => \Config\Services::validation()
            ];
            return view(
                'pages/admin/tambah_dataSiswa',
                $data
            );
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function val_tambah_datasiswa()
    {
        if (session()->get('logged_in') == 'admin') {
            if (!$this->validate([
                'nisn' => ['rules' => 'required|', 'errors' => ['required' => 'NISN harus di isi']], 'nis' => ['rules' => 'required|', 'errors' => ['required' => 'NIS harus di isi']], 'nama' => ['rules' => 'required|', 'errors' => ['required' => 'Nama harus di isi']], 'tempat_lahir' => ['rules' => 'required|', 'errors' => ['required' => 'Tempat lahir harus di isi']], 'tanggal_lahir' => ['rules' => 'required|', 'errors' => ['required' => 'Tanggal lahir harus di isi']], 'agama' => ['rules' => 'required|', 'errors' => ['required' => 'Agama harus di isi']], 'pendidikan_sebelum' => ['rules' => 'required|', 'errors' => ['required' => 'Pendidikan sebelumnya harus di isi']], 'alamat' => ['rules' => 'required|', 'errors' => ['required' => 'Alamat harus di isi']], 'nama_ayah' => ['rules' => 'required|', 'errors' => ['required' => 'Nama ayah harus di isi']], 'nama_ibu' => ['rules' => 'required|', 'errors' => ['required' => 'Nama ibu harus di isi']], 'pekerjaan_ayah' => ['rules' => 'required|', 'errors' => ['required' => 'Pekerjaan ayah harus di isi']], 'pekerjaan_ibu' => ['rules' => 'required|', 'errors' => ['required' => 'Pekerjaan ibu harus di isi']], 'alamat_orang_tua' => ['rules' => 'required|', 'errors' => ['required' => 'Alamat orang tua harus di isi']], 'tahun_mendaftar' => ['rules' => 'required|', 'errors' => ['required' => 'Tahun mendaftar harus di isi']],
            ])) {
                $validation = \Config\Services::validation();
                return redirect()->to('/admin/tambah_datasiswa')->withInput()->withInput('validation', $validation);
            }
            $nisn = $this->request->getVar('nisn');
            $nis = $this->request->getVar('nis');
            $nama = $this->request->getVar('nama');
            $tempat_lahir = $this->request->getVar('tempat_lahir');
            $tanggal_lahir = $this->request->getVar('tanggal_lahir');
            $jenis_kelamin = $this->request->getVar('jenis_kelamin');
            $agama = $this->request->getVar('agama');
            $pendidikan_sebelum = $this->request->getVar('pendidikan_sebelum');
            $alamat = $this->request->getVar('alamat');
            $nama_ayah = $this->request->getVar('nama_ayah');
            $nama_ibu = $this->request->getVar('nama_ibu');
            $pekerjaan_ayah = $this->request->getVar('pekerjaan_ayah');
            $pekerjaan_ibu = $this->request->getVar('pekerjaan_ibu');
            $alamat_orang_tua = $this->request->getVar('alamat_orang_tua');
            $tahun_mendaftar = $this->request->getVar('tahun_mendaftar');
            $foto_siswa = $this->request->getFile('foto_siswa');
            if ($foto_siswa->getError() == 4) {
                $nama_foto = 'Default.jpg';
            } else {
                $nama_foto = $nisn . '.' . $foto_siswa->getClientExtension();
                $foto_siswa->move('img', $nama_foto);
            }
            $data = [
                'nisn' => $nisn, 'nis' => $nis, 'nama' => $nama, 'tempat_lahir' => $tempat_lahir, 'tanggal_lahir' => $tanggal_lahir,
                'jenis_kelamin' => $jenis_kelamin, 'agama' => $agama, 'pendidikan_sebelum' => $pendidikan_sebelum, 'alamat' => $alamat,
                'nama_ayah' => $nama_ayah, 'nama_ibu' => $nama_ibu, 'pekerjaan_ayah' => $pekerjaan_ayah, 'pekerjaan_ibu' => $pekerjaan_ibu,
                'alamat_orang_tua' => $alamat_orang_tua, 'tahun_mendaftar' => $tahun_mendaftar, 'status_siswa' => 'Aktif', 'foto_siswa' => $nama_foto
            ];
            $this->SiswaModel->insert($data);
            session()->setFlashdata('berhasil', 'Data berhasil ditambah!');
            return redirect()->to('/admin/data_siswa');
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function edit_datasiswa()
    {
        if (session()->get('logged_in') == 'admin') {
            $dataGuru = $this->GuruModel->where(
                'nip',
                session()->get('nip')
            )->first();
            $nisn = $this->request->getVar('nisn');
            $data = [
                'title' => 'Data Siswa', 'nama' => $dataGuru['nama'],
                'dataSiswa' => $this->SiswaModel->where('nisn', $nisn)->first(), 'validation' => \Config\Services::validation()
            ];
            return view(
                'pages/admin/edit_dataSiswa',
                $data
            );
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function val_edit_datasiswa()
    {
        if (session()->get('logged_in') == 'admin') {
            if (!$this->validate([
                'nisn' => ['rules' => 'required|', 'errors' => ['required' => 'NISN harus di isi']], 'nis' => ['rules' => 'required|', 'errors' => ['required' => 'NIS harus di isi']], 'nama' => ['rules' => 'required|', 'errors' => ['required' => 'Nama harus di isi']], 'tempat_lahir' => ['rules' => 'required|', 'errors' => ['required' => 'Tempat lahir harus di isi']], 'tanggal_lahir' => ['rules' => 'required|', 'errors' => ['required' => 'Tanggal lahir harus di isi']], 'agama' => ['rules' => 'required|', 'errors' => ['required' => 'Agama harus di isi']], 'pendidikan_sebelum' => ['rules' => 'required|', 'errors' => ['required' => 'Pendidikan sebelumnya harus di isi']], 'alamat' => ['rules' => 'required|', 'errors' => ['required' => 'Alamat harus di isi']], 'nama_ayah' => ['rules' => 'required|', 'errors' => ['required' => 'Nama ayah harus di isi']], 'nama_ibu' => ['rules' => 'required|', 'errors' => ['required' => 'Nama ibu harus di isi']], 'pekerjaan_ayah' => ['rules' => 'required|', 'errors' => ['required' => 'Pekerjaan ayah harus di isi']], 'pekerjaan_ibu' => ['rules' => 'required|', 'errors' => ['required' => 'Pekerjaan ibu harus di isi']], 'alamat_orang_tua' => ['rules' => 'required|', 'errors' => ['required' => 'Alamat orang tua harus di isi']], 'tahun_mendaftar' => ['rules' => 'required|', 'errors' => ['required' => 'Tahun mendaftar harus di isi']],
            ])) {
                $validation = \Config\Services::validation();
                return redirect()->to('/admin/edit_datasiswa?nisn=' . $this->request->getVar('nisn'))->withInput()->withInput('validation', $validation);
            }
            $nisn = $this->request->getVar('nisn');
            $nis = $this->request->getVar('nis');
            $nama = $this->request->getVar('nama');
            $tempat_lahir = $this->request->getVar('tempat_lahir');
            $tanggal_lahir = $this->request->getVar('tanggal_lahir');
            $jenis_kelamin = $this->request->getVar('jenis_kelamin');
            $agama = $this->request->getVar('agama');
            $pendidikan_sebelum = $this->request->getVar('pendidikan_sebelum');
            $alamat = $this->request->getVar('alamat');
            $nama_ayah = $this->request->getVar('nama_ayah');
            $nama_ibu = $this->request->getVar('nama_ibu');
            $pekerjaan_ayah = $this->request->getVar('pekerjaan_ayah');
            $pekerjaan_ibu = $this->request->getVar('pekerjaan_ibu');
            $alamat_orang_tua = $this->request->getVar('alamat_orang_tua');
            $tahun_mendaftar = $this->request->getVar('tahun_mendaftar');
            $status_siswa = $this->request->getVar('status_siswa');
            $foto_siswa = $this->request->getFile('foto_siswa');
            $tempSiswa = $this->SiswaModel->where('nisn', $nisn)->first();
            if ($foto_siswa->getError() == 4) {
                $nama_foto = 'Default.jpg';
            } else {
                $nama_foto = $nisn . '.' . $foto_siswa->getClientExtension();
                $foto_siswa->move('img', $nama_foto);
            }
            $data = [
                'nis' => $nis, 'nama' => $nama, 'tempat_lahir' => $tempat_lahir, 'tanggal_lahir' => $tanggal_lahir, 'jenis_kelamin' => $jenis_kelamin,
                'agama' => $agama, 'pendidikan_sebelum' => $pendidikan_sebelum, 'alamat' => $alamat, 'nama_ayah' => $nama_ayah, 'nama_ibu' => $nama_ibu,
                'pekerjaan_ayah' => $pekerjaan_ayah, 'pekerjaan_ibu' => $pekerjaan_ibu, 'alamat_orang_tua' => $alamat_orang_tua, 'tahun_mendaftar' => $tahun_mendaftar,
                'status_siswa' => $status_siswa, 'foto_siswa' => $nama_foto
            ];
            $this->SiswaModel->update($nisn, $data);
            session()->setFlashdata('berhasil', 'Data berhasil ditambah!');
            return redirect()->to('/admin/data_siswa');
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function data_mapel()
    {
        if (session()->get('logged_in') == 'admin') {
            $dataGuru = $this->GuruModel->where('nip', session()->get('nip'))->first();
            $data = [
                'title' => 'Data Mata Pelajaran', 'nama' => $dataGuru['nama'], 'dataMapel' => $this->MapelModel->find(), 'validation' => \Config\Services::validation()
            ];
            return view('/pages/admin/dataMapel', $data);
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function tambah_datamapel()
    {
        if (session()->get('logged_in') == 'admin') {
            $dataGuru = $this->GuruModel->where('nip', session()->get('nip'))->first();
            $data = [
                'title' => 'Data Mata Pelajaran', 'nama' => $dataGuru['nama'], 'validation' => \Config\Services::validation()
            ];

            return view('pages/admin/tambah_dataMapel', $data);
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function val_tambah_datamapel()
    {
        if (session()->get('logged_in') == 'admin') {
            if (!$this->validate([
                'id_mapel' => ['rules' => 'required|', 'errors' => ['required' => 'Id matapelajaran harus di isi']], 'nama_mapel' => ['rules' => 'required|', 'errors' => ['required' => 'Nama matapelajaran harus di isi']], 'kelas' => ['rules' => 'required|', 'errors' => ['required' => 'Kelas harus di isi']], 'aspek' => ['rules' => 'required|', 'errors' => ['required' => 'Aspek harus di isi']],
            ])) {
                $validation = \Config\Services::validation();
                return redirect()->to('/admin/tambah_datamapel')->withInput()->withInput('validation', $validation);
            }

            $id_mapel = $this->request->getVar('id_mapel');
            $nama_mapel = $this->request->getVar('nama_mapel');
            $kelas = $this->request->getVar('kelas');
            $aspek = $this->request->getVar('aspek');

            $data = [
                'id_mapel' => $id_mapel, 'nama_mapel' => $nama_mapel, 'kelas' => $kelas, 'aspek' => $aspek
            ];
            $this->MapelModel->insert($data);
            session()->setFlashdata(
                'berhasil',
                'Data berhasil ditambah!'
            );
            return redirect()->to('/admin/data_mapel');
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function edit_datamapel()
    {
        if (session()->get('logged_in') == 'admin') {
            $dataGuru = $this->GuruModel->where('nip', session()->get('nip'))->first();
            $dataMapel = $this->MapelModel->where('id_mapel', $this->request->getVar('id_mapel'))->first();
            $data = [
                'title' => 'Data Mata Pelajaran', 'nama' => $dataGuru['nama'], 'dataMapel' => $dataMapel, 'validation' => \Config\Services::validation()
            ];
            return view('/pages/admin/edit_dataMapel', $data);
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function val_edit_datamapel()
    {
        if (session()->get('logged_in') == 'admin') {
            $id_mapel = $this->request->getVar('id_mapel');
            $nama_mapel = $this->request->getVar('nama_mapel');
            $kelas = $this->request->getVar('kelas');
            $aspek = $this->request->getVar('aspek');
            $data = [
                'id_mapel' => $id_mapel, 'nama_mapel' => $nama_mapel, 'kelas' => $kelas, 'aspek' => $aspek
            ];
            $this->MapelModel->update($id_mapel, $data);
            session()->setFlashdata('berhasil', 'Data berhasil diupdate!');
            return redirect()->to('/admin/data_mapel');
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function data_kelas()
    {
        if (session()->get('logged_in') == 'admin') {
            $dataGuru = $this->GuruModel->where('nip', session()->get('nip'))->first();
            $data = [
                'title' => 'Data Kelas', 'nama' => $dataGuru['nama'], 'dataKelas' => $this->KelasModel
            ];
            return view('pages/admin/dataKelas', $data);
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function edit_datakelas()
    {
        if (session()->get('logged_in') == 'admin') {
            $dataGuru = $this->GuruModel->where('nip', session()->get('nip'))->first();
            $dataKelas = $this->KelasModel->where('id_kelas', $this->request->getVar('id_kelas'))->first();
            $data = [
                'title' => 'Data Kelas', 'nama' => $dataGuru['nama'], 'dataKelas' => $dataKelas, 'guru' => $this->GuruModel, 'validation' => \Config\Services::validation()
            ];
            return view('pages/admin/edit_dataKelas', $data);
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function val_edit_datakelas()
    {
        if (session()->get('logged_in') == 'admin') {
            $id_kelas = $this->request->getVar('id_kelas');
            $kelas = $this->request->getVar('kelas');
            $semester = $this->request->getVar('semester');
            $nip = $this->request->getVar('nip');
            $data = [
                'kelas' => $kelas, 'semester' => $semester, 'nip' => $nip
            ];
            $this->KelasModel->update($id_kelas, $data);
            session()->setFlashdata('berhasil', 'Data berhasil diupdate!');
            return redirect()->to('/admin/data_kelas');
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function data_eskul()
    {
        if (session()->get('logged_in') == 'admin') {
            $dataGuru = $this->GuruModel->where('nip', session()->get('nip'))->first();
            $data = [
                'title' => 'Data Ekstrakulikuler', 'nama' => $dataGuru['nama'], 'dataEskul' => $this->EskulModel->find()
            ];
            return view('/pages/admin/dataEskul', $data);
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function val_tambah_dataeskul()
    {
        if (session()->get('logged_in') == 'admin') {
            $id_eskul = $this->request->getVar('id_eskul');
            $nama_eskul = $this->request->getVar('nama_eskul');
            $data = [
                'id_eskul' => $id_eskul, 'nama_eskul' => $nama_eskul
            ];
            $this->EskulModel->insert($data);
            session()->setFlashdata('berhasil', 'Data berhasil ditambah!');
            return redirect()->to('/admin/data_eskul');
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function edit_dataeskul()
    {
        if (session()->get('logged_in') == 'admin') {
            $dataGuru = $this->GuruModel->where('nip', session()->get('nip'))->first();
            $dataEskul = $this->EskulModel->where('id_eskul', $this->request->getVar('id_eskul'))->first();
            $data = [
                'title' => 'Data Ekstrakulikuler', 'nama' => $dataGuru['nama'], 'dataEskul' => $dataEskul,
            ];
            return view('/pages/admin/edit_dataEskul', $data);
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function val_edit_dataeskul()
    {
        if (session()->get('logged_in') == 'admin') {
            $id_eskul = $this->request->getVar('id_eskul');
            $id_eskul1 = $this->request->getVar('id_eskul1');
            $nama_eskul = $this->request->getVar('nama_eskul');
            $data = [
                'id_eskul' => $id_eskul1, 'nama_eskul' => $nama_eskul
            ];
            $this->EskulModel->update($id_eskul, $data);
            session()->setFlashdata('berhasil', 'Data berhasil diupdate!');
            return redirect()->to('/admin/data_eskul');
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    //--------------------------------Aktifitas Sekolah-------------------------------------------

    public function data_ta()
    {
        if (session()->get('logged_in') == 'admin') {
            $dataGuru = $this->GuruModel->where('nip', session()->get('nip'))->first();
            $data = [
                'title' => 'Data Tahun Ajaran', 'nama' => $dataGuru['nama'], 'dataKelas' => $this->KelasModel, 'dataTA' => $this->TahunAjaranModel
            ];
            return view('/pages/admin/dataTA', $data);
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function val_tambah_datata()
    {
        if (session()->get('logged_in') == 'admin') {
            $kelas = $this->KelasModel->find();
            $tahun_ajaran = $this->request->getVar('tahun_ajaran');
            $ta = $this->TahunAjaranModel->where('tahun_ajaran', $tahun_ajaran)->first();
            if ($ta) {
                session()->setFlashdata('gagal', 'Data sudah pernah dimasukan!');
                return redirect()->to('/admin/data_ta');
            } else {
                foreach ($kelas as $data) :
                    $dataTemp = ['id_tahun_ajaran' => 'TA-' . $data['id_kelas'] . '-' .
                        $tahun_ajaran, 'id_kelas' => $data['id_kelas'], 'tahun_ajaran' => $tahun_ajaran];
                    $this->TahunAjaranModel->insert($dataTemp);
                endforeach;
            }
            session()->setFlashdata('berhasil', 'Data berhasil ditambah!');
            return redirect()->to('/admin/data_ta');
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function data_siswakelas()
    {
        if (session()->get('logged_in') == 'admin') {
            $tempTA = $this->TahunAjaranModel->where('id_kelas', 'K11')->find();
            $dataGuru = $this->GuruModel->where('nip', session()->get('nip'))->first();
            $data = [
                'title' => 'Data Siswa Perkelas', 'nama' => $dataGuru['nama'], 'TahunAjaran' => $tempTA, 'dataKelas' => $this->KelasModel, 'dataGuru' => $this->GuruModel, 'Nilai' => $this->NilaiModel, 'Kelas' => $this->KelasModel, 'TA' => $this->TahunAjaranModel
            ];
            return view('pages/admin/dataSiswaKelas', $data);
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function tambah_data_siswakelas()
    {
        if (session()->get('logged_in') == 'admin') {
            $dataGuru = $this->GuruModel->where('nip', session()->get('nip'))->first();
            $data = [
                'title' => 'Data Siswa Perkelas', 'nama' => $dataGuru['nama'], 'TahunAjaran' => $this->TahunAjaranModel->where('id_kelas', 'K11')->find(), 'Siswa' => $this->SiswaModel
            ];

            return view('pages/admin/tambah_dataSiswaKelas', $data);
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function val_tambah_data_siswakelas()
    {
        if (session()->get('logged_in') == 'admin') {
            $kelas = $this->request->getVar('kelas');
            $semester = $this->request->getVar('semester');
            $tahun_ajaran = $this->request->getVar('tahun_ajaran');
            $nisn = $this->request->getVar('siswa');
            $mapel = $this->MapelModel->find();
            $dataKelas = $this->KelasModel->where(['kelas' => $kelas, 'semester' => $semester])->first();
            $tahunAjaran = $this->TahunAjaranModel->where(['id_kelas' => $dataKelas['id_kelas'], 'tahun_ajaran' => $tahun_ajaran])->first();

            for ($i = 0; $i < sizeof($nisn); $i++) : for ($k = 1; $k <= (sizeof($mapel) / 2); $k++) : $cek = $this->NilaiModel->where(['id_kelas' => $dataKelas['id_kelas'], 'id_mapel' => 'K' . $k, 'nisn' => $nisn[$i], 'id_tahun_ajaran' => $tahunAjaran['id_tahun_ajaran']])->first();
                    if ($cek) {
                    } else {
                        $data = ['id_kelas' => $dataKelas['id_kelas'],    'id_mapel' => 'K' . $k,    'nisn' => $nisn[$i],    'id_tahun_ajaran' => $tahunAjaran['id_tahun_ajaran'],    'nilai_1' => 0,    'nilai_2' => 0,    'nilai_3' => 0,    'nilai_4' => 0,    'nilai_5' => 0,    'nilai_6' => 0,    'nilai_7' => 0,    'nilai_8' => 0,    'nilai_9' => 0,    'nilai_10' => 0,    'nilai_11' => 0,    'nilai_12' => 0,    'nilai_13' => 0,    'nilai_14' => 0,    'nilai_15' => 0,    'nilai_16' => 0,    'pts' => 0,    'pta' => 0, 'deskripsi' => '-'];
                        $this->NilaiModel->insert($data);
                        $data = ['id_kelas' => $dataKelas['id_kelas'],    'id_mapel' => 'P' . $k,    'nisn' => $nisn[$i],    'id_tahun_ajaran' => $tahunAjaran['id_tahun_ajaran'],    'nilai_1' => 0,    'nilai_2' => 0,    'nilai_3' => 0,    'nilai_4' => 0,    'nilai_5' => 0,    'nilai_6' => 0,    'nilai_7' => 0,    'nilai_8' => 0,    'nilai_9' => 0,    'nilai_10' => 0,    'nilai_11' => 0,    'nilai_12' => 0,    'nilai_13' => 0,    'nilai_14' => 0,    'nilai_15' => 0,    'nilai_16' => 0,    'pts' => 0,    'pta' => 0, 'deskripsi' => '-'];
                        $this->NilaiModel->insert($data);
                    }
                endfor;
                $cekSiswa = $this->AbsensiModel->where(['nisn' => $nisn[$i], 'id_kelas' => $dataKelas['id_kelas'], 'id_tahun_ajaran' => $tahunAjaran['id_tahun_ajaran']])->first();
                if ($cekSiswa) {
                } else {
                    $absensi = ['nisn' => $nisn[$i], 'id_kelas' => $dataKelas['id_kelas'], 'id_tahun_ajaran' => $tahunAjaran['id_tahun_ajaran'], 'sakit' => 0, 'izin' => 0, 'tanpa_keterangan' => 0];
                    $this->AbsensiModel->insert($absensi);
                }
            endfor;
            session()->setFlashdata(
                'berhasil',
                'Data berhasil ditambah!'
            );
            return redirect()->to('/admin/data_siswakelas');
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function val_hapus_data_siswakelas()
    {
        if (session()->get('logged_in') == 'admin') {
            $id_kelas = $this->request->getVar('id_kelas');
            $nisn = $this->request->getVar('nisn');
            $id_tahun_ajaran = $this->request->getVar('id_tahun_ajaran');
            $where = [
                'id_kelas' => $id_kelas, 'nisn' => $nisn, 'id_tahun_ajaran' => $id_tahun_ajaran
            ];

            $this->NilaiModel->where($where)->delete();
            $this->AbsensiModel->where($where)->delete();
            session()->setFlashdata(
                'berhasil',
                'Data berhasil dihapus!'
            );
            return redirect()->to('/admin/data_siswakelas');
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function data_siswaeskul()
    {
        if (session()->get('logged_in') == 'admin') {
            $tempTA = $this->TahunAjaranModel->where('id_kelas', 'K11')->find();
            $dataGuru = $this->GuruModel->where('nip', session()->get('nip'))->first();
            $data = [
                'title' => 'Data Siswa Pereskul', 'nama' => $dataGuru['nama'], 'TahunAjaran' => $tempTA, 'dataEskul' => $this->EskulModel, 'dataKelas' => $this->KelasModel, 'dataGuru' => $this->GuruModel, 'nilaiEskul' => $this->NilaiEskulModel->join('siswa', 'nilai_eskul.nisn=siswa.nisn', 'inner'), 'Kelas' => $this->KelasModel, 'TA' => $this->TahunAjaranModel
            ];
            return view('pages/admin/dataSiswaEskul', $data);
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function tambah_siswaeskul()
    {
        if (session()->get('logged_in') == 'admin') {
            $dataGuru = $this->GuruModel->where('nip', session()->get('nip'))->first();

            $data = [
                'title' => 'Data Siswa Pereskul', 'nama' => $dataGuru['nama'], 'dataEskul' => $this->EskulModel, 'TahunAjaran' => $this->TahunAjaranModel->find(), 'Siswa' => $this->SiswaModel, 'NilaiEskul' => $this->NilaiEskulModel
            ];
            return view('pages/admin/tambah_dataSiswaEskul', $data);
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function val_tambah_siswaeskul()
    {
        if (session()->get('logged_in') == 'admin') {
            $nama_eskul = $this->request->getVar('nama_eskul');
            $kelas = $this->request->getVar('kelas');
            $semester = $this->request->getVar('semester');
            $tahun_ajaran = $this->request->getVar('tahun_ajaran');
            $nisn = $this->request->getVar('siswa');

            $dataEskul = $this->EskulModel->where('nama_eskul', $nama_eskul)->first();
            $dataKelas = $this->KelasModel->where(['kelas' => $kelas, 'semester' => $semester])->first();
            $dataTA = $this->TahunAjaranModel->where(['id_kelas' => $dataKelas['id_kelas'], 'tahun_ajaran' => $tahun_ajaran])->first();
            for ($i = 0; $i < sizeof($nisn); $i++) {
                $tempInsert = $this->NilaiEskulModel->where([
                    'nisn' => $nisn[$i],
                    'id_kelas' => $dataKelas['id_kelas'], 'id_tahun_ajaran' => $dataTA['id_tahun_ajaran']
                ])->first();
                if ($tempInsert) {
                } else {
                    $data = [
                        'id_eskul' => $dataEskul['id_eskul'], 'nisn' => $nisn[$i],
                        'id_kelas' => $dataKelas['id_kelas'], 'id_tahun_ajaran' => $dataTA['id_tahun_ajaran'],
                        'nilai' => 0, 'deskripsi' => '-'
                    ];
                    $this->NilaiEskulModel->insert($data);
                }
            }
            session()->setFlashdata('berhasil', 'Data berhasil ditambah!');
            return redirect()->to('/admin/data_siswaeskul');
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function val_hapus_siswaeskul()
    {
        if (session()->get('logged_in') == 'admin') {
            $id_eskul = $this->request->getVar('id_eskul');
            $nisn = $this->request->getVar('nisn');
            $id_kelas = $this->request->getVar('id_kelas');
            $id_tahun_ajaran = $this->request->getVar('id_tahun_ajaran');

            $data = [
                'id_eskul' => $id_eskul, 'nisn' => $nisn,
                'id_kelas' => $id_kelas, 'id_tahun_ajaran' => $id_tahun_ajaran
            ];
            $this->NilaiEskulModel->where($data)->delete();

            session()->setFlashdata('berhasil', 'Data berhasil dihapus!');
            return redirect()->to('/admin/data_siswaeskul');
        } else {
            return redirect()->to('/auth/admin');
        }
    }
    //--------------------RUANG GURU------------------------

    public function input_nilai_siswa()
    {
        if (session()->get('logged_in') == 'admin') {
            $dataGuru = $this->GuruModel->where('nip', session()->get('nip'))->first();
            $data = [
                'title' => 'Nilai Siswa', 'nama' => $dataGuru['nama'], 'TahunAjaran' => $this->TahunAjaranModel->find(), 'Mapel' => $this->MapelModel, 'Kelas' => $this->KelasModel, 'TahunAjaran' => $this->TahunAjaranModel, 'Guru' => $this->GuruModel, 'Nilai' => $this->NilaiModel, 'Siswa' => $this->SiswaModel
            ];

            return view('/pages/admin/input_NilaiSiswa', $data);
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function input_nilai()
    {
        if (session()->get('logged_in') == 'admin') {
            $dataGuru = $this->GuruModel->where('nip', session()->get('nip'))->first();
            $data = [
                'title' => 'Nilai Siswa', 'nama' => $dataGuru['nama'], 'Nilai' => $this->NilaiModel
            ];

            return view('/pages/admin/t_input_NilaiSiswa', $data);
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function val_input_nilai()
    {
        if (session()->get('logged_in') == 'admin') {
            $id_kelas = $this->request->getVar('id_kelas');
            $nisn = $this->request->getVar('nisn');
            $id_mapel = $this->request->getVar('id_mapel');
            $id_tahun_ajaran = $this->request->getVar('id_tahun_ajaran');
            if (
                $id_kelas == 'K11' or $id_kelas == 'K12' or $id_kelas == 'K21' or $id_kelas == 'K22' or $id_kelas == 'K31' or
                $id_kelas == 'K32' or $id_kelas == 'P11' or $id_kelas == 'P12' or $id_kelas == 'P21' or $id_kelas == 'P22' or
                $id_kelas == 'P31' or $id_kelas == 'P32'
            ) : $nilai_1 = $this->request->getVar('nilai_1');
                $nilai_2 = $this->request->getVar('nilai_2');
                $nilai_3 = $this->request->getVar('nilai_3');
                $nilai_4 = $this->request->getVar('nilai_4');
                $nilai_5 = $this->request->getVar('nilai_5');
                $nilai_6 = $this->request->getVar('nilai_6');
                $nilai_7 = $this->request->getVar('nilai_7');
                $nilai_8 = $this->request->getVar('nilai_8');
                $nilai_9 = $this->request->getVar('nilai_9');
                $nilai_10 = $this->request->getVar('nilai_10');
                $nilai_11 = $this->request->getVar('nilai_11');
                $nilai_12 = $this->request->getVar('nilai_12');
                $nilai_13 = $this->request->getVar('nilai_13');
                $nilai_14 = $this->request->getVar('nilai_14');
                $nilai_15 = $this->request->getVar('nilai_15');
                $nilai_16 = $this->request->getVar('nilai_16');
                $pts = $this->request->getVar('pts');
                $pas = $this->request->getVar('pas');
                $deskripsi = $this->request->getVar('deskripsi');
                $where = ['id_kelas' => $id_kelas, 'id_mapel' => $id_mapel, 'nisn' => $nisn, 'id_tahun_ajaran' => $id_tahun_ajaran];
                $id = $this->NilaiModel->where($where)->first();
                $data = [
                    'id_kelas' => $id_kelas, 'id_mapel' => $id_mapel, 'nisn' => $nisn,
                    'id_tahun_ajaran' => $id_tahun_ajaran, 'nilai_1' => $nilai_1, 'nilai_2' => $nilai_2, 'nilai_3' => $nilai_3, 'nilai_4' => $nilai_4, 'nilai_5' => $nilai_5,
                    'nilai_6' => $nilai_6, 'nilai_7' => $nilai_7, 'nilai_8' => $nilai_8, 'nilai_9' => $nilai_9, 'nilai_10' => $nilai_10, 'nilai_11' => $nilai_11,
                    'nilai_12' => $nilai_12, 'nilai_13' => $nilai_13, 'nilai_14' => $nilai_14, 'nilai_15' => $nilai_15, 'nilai_16' => $nilai_16, 'pts' => $pts, 'pas' => $pas, 'deskripsi' => $deskripsi
                ];
            elseif ($id_kelas == 'K41' or $id_kelas == 'K51' or $id_kelas == 'K61' or $id_kelas == 'P41' or $id_kelas == 'P51' or $id_kelas == 'P61') :
                $nilai_1 = $this->request->getVar('nilai_1');
                $nilai_2 = $this->request->getVar('nilai_2');
                $nilai_3 = $this->request->getVar('nilai_3');
                $nilai_4 = $this->request->getVar('nilai_4');
                $nilai_5 = $this->request->getVar('nilai_5');
                $nilai_6 = $this->request->getVar('nilai_6');
                $nilai_7 = $this->request->getVar('nilai_7');
                $nilai_8 = $this->request->getVar('nilai_8');
                $nilai_9 = $this->request->getVar('nilai_9');
                $nilai_10 = $this->request->getVar('nilai_10');
                $nilai_11 = $this->request->getVar('nilai_11');
                $nilai_12 = $this->request->getVar('nilai_12');
                $nilai_13 = $this->request->getVar('nilai_13');
                $nilai_14 = $this->request->getVar('nilai_14');
                $nilai_15 = $this->request->getVar('nilai_15');
                $pts = $this->request->getVar('pts');
                $pas = $this->request->getVar('pas');
                $deskripsi = $this->request->getVar('deskripsi');
                $where = ['id_kelas' => $id_kelas, 'id_mapel' => $id_mapel, 'nisn' => $nisn, 'id_tahun_ajaran' => $id_tahun_ajaran];
                $id = $this->NilaiModel->where($where)->first();
                $data = [
                    'id_kelas' => $id_kelas, 'id_mapel' => $id_mapel, 'nisn' => $nisn, 'id_tahun_ajaran' => $id_tahun_ajaran,
                    'nilai_1' => $nilai_1, 'nilai_2' => $nilai_2, 'nilai_3' => $nilai_3, 'nilai_4' => $nilai_4, 'nilai_5' => $nilai_5,
                    'nilai_6' => $nilai_6, 'nilai_7' => $nilai_7, 'nilai_8' => $nilai_8, 'nilai_9' => $nilai_9, 'nilai_10' => $nilai_10,
                    'nilai_11' => $nilai_11, 'nilai_12' => $nilai_12, 'nilai_13' => $nilai_13, 'nilai_14' => $nilai_14, 'nilai_15' => $nilai_15,
                    'nilai_16' => 0, 'pts' => $pts, 'pas' => $pas, 'deskripsi' => $deskripsi
                ];

            elseif ($id_kelas == 'K42' or $id_kelas == 'K52' or $id_kelas == 'K62' or $id_kelas == 'P42' or $id_kelas == 'P52' or $id_kelas == 'P62') :
                $nilai_1 = $this->request->getVar('nilai_1');
                $nilai_2 = $this->request->getVar('nilai_2');
                $nilai_3 = $this->request->getVar('nilai_3');
                $nilai_4 = $this->request->getVar('nilai_4');
                $nilai_5 = $this->request->getVar('nilai_5');
                $nilai_6 = $this->request->getVar('nilai_6');
                $nilai_7 = $this->request->getVar('nilai_7');
                $nilai_8 = $this->request->getVar('nilai_8');
                $nilai_9 = $this->request->getVar('nilai_9');
                $nilai_10 = $this->request->getVar('nilai_10');
                $nilai_11 = $this->request->getVar('nilai_11');
                $nilai_12 = $this->request->getVar('nilai_12');
                $pts = $this->request->getVar('pts');
                $pas = $this->request->getVar('pas');
                $deskripsi = $this->request->getVar('deskripsi');
                $where = ['id_kelas' => $id_kelas, 'id_mapel' => $id_mapel, 'nisn' => $nisn, 'id_tahun_ajaran' => $id_tahun_ajaran];
                $id = $this->NilaiModel->where($where)->first();
                $data = [
                    'id_kelas' => $id_kelas, 'id_mapel' => $id_mapel, 'nisn' => $nisn, 'id_tahun_ajaran' => $id_tahun_ajaran,
                    'nilai_1' => $nilai_1, 'nilai_2' => $nilai_2, 'nilai_3' => $nilai_3, 'nilai_4' => $nilai_4, 'nilai_5' => $nilai_5,
                    'nilai_6' => $nilai_6, 'nilai_7' => $nilai_7, 'nilai_8' => $nilai_8, 'nilai_9' => $nilai_9, 'nilai_10' => $nilai_10,
                    'nilai_11' => $nilai_11, 'nilai_12' => $nilai_12, 'nilai_13' => 0, 'nilai_14' => 0, 'nilai_15' => 0,
                    'nilai_16' => 0, 'pts' => $pts, 'pas' => $pas, 'deskripsi' => $deskripsi
                ];
            endif;
            $this->NilaiModel->update($id['id'], $data);
            session()->setFlashdata('berhasil', 'Nilai Siswa Berhasil Di Masukan!');
            return redirect()->to('/admin/input_nilai_siswa');
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function input_absensi_siswa()
    {
        if (session()->get('logged_in') == 'admin') {
            $dataGuru = $this->GuruModel->where('nip', session()->get('nip'))->first();
            $data = [
                'title' => 'Absensi Siswa', 'nama' => $dataGuru['nama'], 'Kelas' => $this->KelasModel, 'TahunAjaran' => $this->TahunAjaranModel, 'Absensi' => $this->AbsensiModel
            ];

            return view('/pages/admin/input_AbsensiSiswa', $data);
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function input_absensi()
    {
        if (session()->get('logged_in') == 'admin') {
            $dataGuru = $this->GuruModel->where('nip', session()->get('nip'))->first();
            $data = [
                'title' => 'Absensi Siswa', 'nama' => $dataGuru['nama'], 'Absensi' => $this->AbsensiModel
            ];

            return view('/pages/admin/t_input_AbsensiSiswa', $data);
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function val_input_absensi()
    {
        if (session()->get('logged_in') == 'admin') {
            $nisn = $this->request->getVar('nisn');
            $id_kelas = $this->request->getVar('id_kelas');
            $id_tahun_ajaran = $this->request->getVar('id_tahun_ajaran');
            $sakit = $this->request->getVar('sakit');
            $izin = $this->request->getVar('izin');
            $tanpa_keterangan = $this->request->getVar('tanpa_keterangan');

            $id = $this->AbsensiModel->where([
                'nisn' => $nisn,
                'id_kelas' => $id_kelas,
                'id_tahun_ajaran' => $id_tahun_ajaran
            ])->first();
            $data = [
                'nisn' => $nisn, 'id_kelas' => $id_kelas,
                'id_tahun_ajaran' => $id_tahun_ajaran,
                'sakit' => $sakit, 'izin' => $izin,
                'tanpa_keterangan' => $tanpa_keterangan
            ];

            $this->AbsensiModel->Update($id, $data);
            session()->setFlashdata('berhasil', 'Absensi Siswa Berhasil Di Masukan!');
            return redirect()->to('/admin/input_absensi_siswa');
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function input_nilai_eskul()
    {
        if (session()->get('logged_in') == 'admin') {
            $dataGuru = $this->GuruModel->where('nip', session()->get('nip'))->first();
            $data = [
                'title' => 'Nilai Eskul Siswa', 'nama' => $dataGuru['nama'], 'NilaiEskul' => $this->NilaiEskulModel, 'Eskul' => $this->EskulModel, 'Kelas' => $this->KelasModel, 'TahunAjaran' => $this->TahunAjaranModel
            ];

            return view('/pages/admin/input_NilaiEskul', $data);
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function nilai_eskul()
    {
        if (session()->get('logged_in') == 'admin') {
            $dataGuru = $this->GuruModel->where('nip', session()->get('nip'))->first();
            $data = [
                'title' => 'Nilai Eskul Siswa', 'nama' => $dataGuru['nama'], 'Eskul' => $this->NilaiEskulModel
            ];

            return view('/pages/admin/t_input_NilaiEskul', $data);
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function val_nilai_eskul()
    {
        if (session()->get('logged_in') == 'admin') {
            $id_eskul = $this->request->getVar('id_eskul');
            $nisn = $this->request->getVar('nisn');
            $id_kelas = $this->request->getVar('id_kelas');
            $id_tahun_ajaran = $this->request->getVar('id_tahun_ajaran');
            $nilai = $this->request->getVar('nilai');
            $deskripsi = $this->request->getVar('deskripsi');

            $id = $this->NilaiEskulModel->where([
                'id_eskul' => $id_eskul,
                'nisn' => $nisn,
                'id_kelas' => $id_kelas,
                'id_tahun_ajaran' => $id_tahun_ajaran,
            ])->first();

            $data = [
                'id_eskul' => $id_eskul, 'nisn' => $nisn,
                'id_kelas' => $id_kelas, 'id_tahun_ajaran' => $id_tahun_ajaran,
                'nilai' => $nilai, 'deskripsi' => $deskripsi
            ];

            $this->NilaiEskulModel->update($id['id'], $data);
            session()->setFlashdata('berhasil', 'Nilai Eskul Berhasil Di Masukan!');
            return redirect()->to('/admin/input_nilai_eskul');
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function pdf()
    {

        $data = [
            'siswa' => $this->SiswaModel,
            'sekolah' => $this->SekolahModel,
            'kelas' => $this->KelasModel,
            'tahun_ajaran' => $this->TahunAjaranModel,
            'nilai' => $this->NilaiModel,
            'nilai_eskul' => $this->NilaiEskulModel,
            'absensi' => $this->AbsensiModel,
            'guru' => $this->GuruModel
        ];
        return view('pages/admin/pdf', $data);
    }
}
