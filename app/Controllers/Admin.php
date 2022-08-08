<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        if (session()->get('logged_in') == 'admin') {
            $guru = $this->GuruModel->where('nip', session()->get('nip'))->first();

            $data = [
                'title' => 'Dashboard',
                'nama' => $guru['nama']
            ];
            return view('pages/admin/dashboard', $data);
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    //--------------------------------Akun-------------------------------------------
    public function akun_guru()
    {
        if (session()->get('logged_in') == 'admin') {
            $guru = $this->GuruModel->where('nip', session()->get('nip'))->first();
            $akunGuru = $this->AkunGuruModel;
            $dataGuru = $this->GuruModel;

            $data = [
                'title' => 'Akun Guru',
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
            $guru = $this->GuruModel->where('nip', session()->get('nip'))->first();
            $akunGuru = $this->AkunGuruModel;
            $dataGuru = $this->GuruModel;

            $data = [
                'title' => 'Akun Guru',
                'nama' => $guru['nama'],
                'akunGuru' => $akunGuru,
                'dataGuru' => $dataGuru
            ];

            return view('pages/admin/edit_akunGuru', $data);
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
                    $data = [
                        'nip' => $nip,
                        'username' => $username,
                        'password' => password_hash($password, PASSWORD_DEFAULT),
                        'jenis_akun' => $jenis_akun,
                        'status_akun' => $status_akun
                    ];
                    $this->AkunGuruModel->update($id, $data);
                    session()->setFlashdata('berhasil', 'Data berhasil diupdate!');
                    return redirect()->to('/admin/akun_guru');
                } else {
                    session()->setFlashdata('gagal', 'Password dan konfirmasi password tidak sama!');
                    return redirect()->to('/admin/edit_akunguru?nip=' . $nip);
                }
            } else {
                $data = [
                    'nip' => $nip,
                    'username' => $username,
                    'jenis_akun' => $jenis_akun,
                    'status_akun' => $status_akun
                ];
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
            $guru = $this->GuruModel->where('nip', session()->get('nip'))->first();
            $akunSiswa = $this->AkunSiswaModel;
            $dataSiswa = $this->SiswaModel;
            $data = [
                'title' => 'Akun Siswa',
                'nama' => $guru['nama'],
                'akunSiswa' => $akunSiswa,
                'dataSiswa' => $dataSiswa
            ];

            return view('/pages/admin/akunSiswa', $data);
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
                    $data = [
                        'nisn' => $nisn,
                        'username' => $username,
                        'password' => password_hash($password, PASSWORD_DEFAULT),
                        'status_akun' => $status_akun
                    ];
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
                'title' => 'Edit Akun Siswa',
                'nama' => $guru['nama'],
                'dataSiswa' => $dataSiswa,
                'akunSiswa' => $akunSiswa,
                'nisn' => $this->request->getVar('nisn')
            ];
            return view('pages/admin/edit_akunSiswa', $data);
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
                    $data = [
                        'nisn' => $nisn,
                        'username' => $username,
                        'password' => password_hash($password, PASSWORD_DEFAULT),
                        'status_akun' => $status_akun
                    ];
                    $this->AkunSiswaModel->update($id, $data);
                    session()->setFlashdata('berhasil', 'Data berhasil diupdate!');
                    return redirect()->to('/admin/akun_siswa');
                } else {
                    session()->setFlashdata('gagal', 'Password jangan kosong!');
                    return redirect()->to('/admin/edit_akunsiswa' . '?nisn=' . $nisn);
                }
            } else {
                $data = [
                    'nisn' => $nisn,
                    'username' => $username,
                    'status_akun' => $status_akun
                ];
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

    //--------------------------------Data-------------------------------------------












    //Akun Guru dan Siswa
    public function tambah_akun_guru()
    {
        if (session()->get('logged_in') == 'admin') {
            $data = [
                'title' => 'Tambah Akun Guru'
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
                session()->setFlashdata('gagal', 'Nip sudah pernah di tambah');
                return redirect()->to('/admin/lihat_akun_guru');
            } else {
                $data = [
                    'nip' => $nip,
                    'username' => $username,
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                    'is_aktif' => 1
                ];
                $this->AkunGuruModel->insert($data);
                session()->setFlashdata('berhasil', 'Data berhasil di tambah');
                return redirect()->to('/admin/lihat_akun_guru');
            }
        } else {
            session()->setFlashdata('gagal', 'Nip tidak ditemukan');
            return redirect()->to('/admin/lihat_akun_guru');
        }
    }

    public function edit_akun_guru()
    {
        if (session()->get('logged_in') == 'admin') {
            if ($this->request->getVar('id') != NULL) {
                $data = [
                    'title' => 'Edit Akun Guru',
                    'akun' => $this->AkunGuruModel
                ];
                return view('pages/admin/edit_akun_guru', $data);
            } else {
                return redirect()->to('/admin/lihat_akun_guru');
            }
        } else {
            return redirect()->to('/admin_login');
        }
    }

    public function validasi_edit_akun_guru()
    {
        if (session()->get('logged_in') == 'admin') {
            $id = $this->request->getVar('id');
            $nip = $this->request->getVar('nip');
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            $is_aktif = $this->request->getVar('is_aktif');

            if ($password != null) {
                $data = [
                    'nip' => $nip,
                    'username' => $username,
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                    'is_aktif' => $is_aktif
                ];
            } else {
                $data = [
                    'nip' => $nip,
                    'username' => $username,
                    'is_aktif' => $is_aktif
                ];
            }
            $this->AkunGuruModel->update($id, $data);
            session()->setFlashdata('berhasil', 'Data berhasil di update');
            return redirect()->to('/admin/lihat_akun_guru');
        } else {
            return redirect()->to('/admin_login');
        }
    }

    public function hapus_akun_guru()
    {
        $nip = $this->request->getVar('nip');
        //Hapus akun guru berdasarkan NIP
        $this->AkunGuruModel->where('nip', $nip)->delete();
        session()->setFlashdata('berhasil', 'Data berhasil di hapus');
        return redirect()->to('/admin/lihat_akun_guru');
    }

    public function lihat_data_guru()
    {
        if (session()->get('logged_in') == 'admin') {
            $data = [
                'title' => 'Lihat Data Guru',
                'akun' => $this->GuruModel
            ];
            return view('pages/admin/lihat_data_guru', $data);
        } else {
            return redirect()->to('/admin_login');
        }
    }

    public function validasi_tambah_data_guru()
    {
        if (session()->get('logged_in') == 'admin') {
            //Ambil gambar
            $fileFoto = $this->request->getFile('foto_guru');

            //Apakah tidak ada foto di upload
            if ($fileFoto->getError() == 4) {
                $namaFoto = "Default.jpg";
            } else {
                $fileFoto->move('img');
                $namaFoto = $fileFoto->getName();
            }

            //Tambah Ke database
            $data = [
                'nip' => $this->request->getVar('nip'),
                'nuptk' => $this->request->getVar('nuptk'),
                'nama' => $this->request->getVar('nama'),
                'tempat_lahir' => $this->request->getVar('tempat_lahir'),
                'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
                'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
                'agama' => $this->request->getVar('agama'),
                'ijazah' => $this->request->getVar('ijazah'),
                'tahun_ijazah' => $this->request->getVar('tahun_ijazah'),
                'jenis_guru' => $this->request->getVar('jenis_guru'),
                'tanggal_angkatan' => $this->request->getVar('tanggal_angkatan'),
                'mulai_bekerja_disekolah' => $this->request->getVar('mulai_bekerja_disekolah'),
                'tmt_masa_pensiun' => $this->request->getVar('tmt_masa_pensiun'),
                'mengajar_dikelas' => $this->request->getVar('mengajar_dikelas'),
                'jumlah_jam_mengajar' => $this->request->getVar('jumlah_jam_mengajar'),
                'foto_guru' => $namaFoto
            ];

            $this->GuruModel->insert($data);
            session()->setFlashdata('berhasil', 'Data berhasil di tambah');
            return redirect()->to('/admin/lihat_data_guru');
        } else {
            return redirect()->to('/admin_login');
        }
    }

    public function edit_data_guru()
    {
        if (session()->get('logged_in') == 'admin') {
            $data = [
                'title' => 'Edit Akun Guru',
                'guru' => $this->GuruModel
            ];
            return view('pages/admin/edit_data_guru', $data);
        } else {
            return redirect()->to('/admin_login');
        }
    }

    public function validasi_edit_data_guru()
    {
        if (session()->get('logged_in') == 'admin') {
            //Ambil gambar
            $fotoGuru = $this->request->getFile('foto_guru');

            //Mengambil data guru
            $guru = $this->GuruModel->where('nip', $this->request->getVar('nip'))->first();

            if ($fotoGuru->getName() == NULL) {
                $nip = $this->request->getVar('nip');
                $data = [
                    'nuptk' => $this->request->getVar('nuptk'),
                    'nama' => $this->request->getVar('nama'),
                    'tempat_lahir' => $this->request->getVar('tempat_lahir'),
                    'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
                    'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
                    'agama' => $this->request->getVar('agama'),
                    'ijazah' => $this->request->getVar('ijazah'),
                    'tahun_ijazah' => $this->request->getVar('tahun_ijazah'),
                    'jenis_guru' => $this->request->getVar('jenis_guru'),
                    'tanggal_angkatan' => $this->request->getVar('tanggal_angkatan'),
                    'mulai_bekerja_disekolah' => $this->request->getVar('mulai_bekerja_disekolah'),
                    'tmt_masa_pensiun' => $this->request->getVar('tmt_masa_pensiun'),
                    'mengajar_dikelas' => $this->request->getVar('mengajar_dikelas'),
                    'jumlah_jam_mengajar' => $this->request->getVar('jumlah_jam_mengajar')
                ];
                $this->GuruModel->update($nip, $data);
                session()->setFlashdata('berhasil', 'Data berhasil di ubah');
                return redirect()->to('/admin/lihat_data_guru');
            } else {
                unlink("./img/" . $guru['foto_guru']);

                $fotoGuru->move('img');
            }
        } else {
            return redirect()->to('/admin_login');
        }
    }
}
