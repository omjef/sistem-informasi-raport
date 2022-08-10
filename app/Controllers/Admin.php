<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        if (session()->get('logged_in') == 'admin') {
            $guru = $this->GuruModel->where(
                'nip',
                session()->get('nip')
            )->first();

            $data = [
                'title' => 'Dashboard',
                'nama' => $guru['nama']
            ];
            return view(
                'pages/admin/dashboard',
                $data
            );
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    //--------------------------------Akun-------------------------------------------
    public function akun_guru()
    {
        if (session()->get('logged_in') == 'admin') {
            $guru = $this->GuruModel->where(
                'nip',
                session()->get('nip')
            )->first();
            $akunGuru = $this->AkunGuruModel;
            $dataGuru = $this->GuruModel;

            $data = [
                'title' => 'Akun Guru',
                'nama' => $guru['nama'],
                'akunGuru' => $akunGuru,
                'dataGuru' => $dataGuru
            ];

            return view(
                'pages/admin/akunGuru',
                $data
            );
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

            $akunGuru = $this->AkunGuruModel->where(
                'nip',
                $nip
            )->first();
            if ($akunGuru) {
                session()->setFlashdata(
                    'gagal',
                    'NIP sudah digunakan!'
                );
                return redirect()->to('/admin/akun_guru');
            } else {
                if ($password == $konfirmasi_password) {
                    $data = [
                        'nip' => $nip,
                        'username' => $username,
                        'password' => password_hash(
                            $password,
                            PASSWORD_DEFAULT
                        ),
                        'jenis_akun' => $jenis_akun,
                        'status_akun' => $status_akun
                    ];
                    $this->AkunGuruModel->insert($data);
                    session()->setFlashdata(
                        'berhasil',
                        'Akun guru berhasil ditambah!'
                    );
                    return redirect()->to('/admin/akun_guru');
                } else {
                    session()->setFlashdata(
                        'gagal',
                        'Password tidak sama!'
                    );
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
                'title' => 'Akun Guru',
                'nama' => $guru['nama'],
                'akunGuru' => $akunGuru,
                'dataGuru' => $dataGuru
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
                if (hash_equals(
                    $password,
                    $konfirmasi_password
                )) {
                    $data = [
                        'nip' => $nip,
                        'username' => $username,
                        'password' => password_hash(
                            $password,
                            PASSWORD_DEFAULT
                        ),
                        'jenis_akun' => $jenis_akun,
                        'status_akun' => $status_akun
                    ];
                    $this->AkunGuruModel->update(
                        $id,
                        $data
                    );
                    session()->setFlashdata(
                        'berhasil',
                        'Data berhasil diupdate!'
                    );
                    return redirect()->to('/admin/akun_guru');
                } else {
                    session()->setFlashdata(
                        'gagal',
                        'Password dan konfirmasi password tidak sama!'
                    );
                    return redirect()->to('/admin/edit_akunguru?nip=' . $nip);
                }
            } else {
                $data = [
                    'nip' => $nip,
                    'username' => $username,
                    'jenis_akun' => $jenis_akun,
                    'status_akun' => $status_akun
                ];
                $this->AkunGuruModel->update(
                    $id,
                    $data
                );
                session()->setFlashdata(
                    'berhasil',
                    'Data berhasil diupdate!'
                );
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
            $this->AkunGuruModel->where(
                'nip',
                $nip
            )->delete();
            session()->setFlashdata(
                'berhasil',
                'Data berhasil dihapus!'
            );
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
                'title' => 'Akun Siswa',
                'nama' => $guru['nama'],
                'akunSiswa' => $akunSiswa,
                'dataSiswa' => $dataSiswa
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

                if (hash_equals(
                    $password,
                    $konfirmasi_password
                )) {
                    $data = [
                        'nisn' => $nisn,
                        'username' => $username,
                        'password' => password_hash(
                            $password,
                            PASSWORD_DEFAULT
                        ),
                        'status_akun' => $status_akun
                    ];
                    $this->AkunSiswaModel->insert($data);
                    session()->setFlashdata(
                        'berhasil',
                        'Password tidak sama!'
                    );
                    return redirect()->to('/admin/akun_siswa');
                } else {
                    session()->setFlashdata(
                        'gagal',
                        'Password dan konfirmasi password tidak sama!'
                    );
                    return redirect()->to('/admin/akun_siswa');
                }
            } else {
                session()->setFlashdata(
                    'gagal',
                    'Password jangan kosong!'
                );
                return redirect()->to('/admin/akun_siswa');
            }
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function edit_akunsiswa()
    {
        if (session()->get('logged_in') == 'admin') {
            $guru = $this->GuruModel->where(
                'nip',
                session()->get('nip')
            )->first();
            $dataSiswa = $this->SiswaModel;
            $akunSiswa = $this->AkunSiswaModel;
            $data = [
                'title' => 'Edit Akun Siswa',
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

            $tempAkunSiswa = $this->AkunSiswaModel->where(
                'nisn',
                $nisn
            )->first();
            $id = $tempAkunSiswa['id'];
            if ($password != NULL) {
                if (hash_equals(
                    $password,
                    $konfirmasi_password
                )) {
                    $data = [
                        'nisn' => $nisn,
                        'username' => $username,
                        'password' => password_hash(
                            $password,
                            PASSWORD_DEFAULT
                        ),
                        'status_akun' => $status_akun
                    ];
                    $this->AkunSiswaModel->update(
                        $id,
                        $data
                    );
                    session()->setFlashdata(
                        'berhasil',
                        'Data berhasil diupdate!'
                    );
                    return redirect()->to('/admin/akun_siswa');
                } else {
                    session()->setFlashdata(
                        'gagal',
                        'Password jangan kosong!'
                    );
                    return redirect()->to('/admin/edit_akunsiswa' . '?nisn=' . $nisn);
                }
            } else {
                $data = [
                    'nisn' => $nisn,
                    'username' => $username,
                    'status_akun' => $status_akun
                ];
                $this->AkunSiswaModel->update(
                    $id,
                    $data
                );
                session()->setFlashdata(
                    'berhasil',
                    'Data berhasil diupdate!'
                );
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
            $this->AkunSiswaModel->where(
                'nisn',
                $nisn
            )->delete();
            session()->setFlashdata(
                'berhasil',
                'Akun Berhasil dihapus!'
            );
            return redirect()->to('/admin/akun_siswa');
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    //--------------------------------Data-------------------------------------------
    public function data_sekolah()
    {
        if (session()->get('logged_in') == 'admin') {
            $dataGuru = $this->GuruModel->where(
                'nip',
                session()->get('nip')
            )->first();
            $data = [
                'title' => 'Data Sekolah',
                'nama' => $dataGuru['nama'],
                'dataSekolah' => $this->SekolahModel
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
                'title' => 'Edit Data Sekolah',
                'nama' => $dataGuru['nama'],
                'dataSekolah' => $this->SekolahModel
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
                'nss' => $nss,
                'npsn' => $npsn,
                'nama' => $nama,
                'alamat' => $alamat,
                'kelurahan' => $kelurahan,
                'kecamatan' => $kecamatan,
                'kota' => $kota,
                'provinsi' => $provinsi,
                'website' => $website,
                'email' => $email
            ];
            $this->SekolahModel->update(
                $nss,
                $data
            );
            session()->setFlashdata(
                'berhasil',
                'Data sekolah berhasil diupadate!'
            );
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
                'title' => 'Data Guru',
                'nama' => $dataGuru['nama'],
                'dataGuru' => $guru
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
                'title' => 'Tambah Data Guru',
                'nama' => $dataGuru['nama'],
                'validation' => \Config\Services::validation()
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
            if (!$this->validate([
                'nip' => [
                    'rules' => 'required|',
                    'errors' => [
                        'required' => 'NIP harus di isi'
                    ]
                ],
                'nuptk' => [
                    'rules' => 'required|',
                    'errors' => [
                        'required' => 'NUPTK harus di isi'
                    ]
                ],
                'nama' => [
                    'rules' => 'required|',
                    'errors' => [
                        'required' => 'Nama harus di isi'
                    ]
                ],
                'tempat_lahir' => [
                    'rules' => 'required|',
                    'errors' => [
                        'required' => 'Tempat lahir harus di isi'
                    ]
                ],
                'tanggal_lahir' => [
                    'rules' => 'required|',
                    'errors' => [
                        'required' => 'Tanggal lahir harus di isi'
                    ]
                ],
                'agama' => [
                    'rules' => 'required|',
                    'errors' => [
                        'required' => 'Agama harus di isi'
                    ]
                ],
                'ijazah' => [
                    'rules' => 'required|',
                    'errors' => [
                        'required' => 'Ijazah harus di isi'
                    ]
                ],
                'tahun_ijazah' => [
                    'rules' => 'required|',
                    'errors' => [
                        'required' => 'Tahun ijazah harus di isi'
                    ]
                ],
                'tanggal_diangkat' => [
                    'rules' => 'required|',
                    'errors' => [
                        'required' => 'Tanggal diangkat harus di isi'
                    ]
                ],
                'tanggal_bekerja' => [
                    'rules' => 'required|',
                    'errors' => [
                        'required' => 'Tanggal bekerja harus di isi'
                    ]
                ],
                'tanggal_pensiun' => [
                    'rules' => 'required|',
                    'errors' => [
                        'required' => 'Tanggal pensiun harus di isi'
                    ]
                ],
                'jam_mengajar' => [
                    'rules' => 'required|',
                    'errors' => [
                        'required' => 'Jumlah jam mengajar harus di isi'
                    ]
                ],
            ])) {
                $validation = \Config\Services::validation();
                return redirect()->to('/admin/tambah_dataguru')->withInput()->withInput(
                    'validation',
                    $validation
                );
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
                $foto_guru->move(
                    'img',
                    $nama_foto
                );
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
                'foto_guru' => $nama_foto
            ];

            $this->GuruModel->insert($data);
            session()->setFlashdata(
                'berhasil',
                'Data berhasil ditambah!'
            );
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
                'title' => 'Edit Data Guru',
                'nama' => $dataGuru['nama'],
                'nip' => $nip,
                'dataGuru' => $this->GuruModel,
                'validation' => \Config\Services::validation()
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
                'nip' => [
                    'rules' => 'required|',
                    'errors' => [
                        'required' => 'NIP harus di isi'
                    ]
                ],
                'nuptk' => [
                    'rules' => 'required|',
                    'errors' => [
                        'required' => 'NUPTK harus di isi'
                    ]
                ],
                'nama' => [
                    'rules' => 'required|',
                    'errors' => [
                        'required' => 'Nama harus di isi'
                    ]
                ],
                'tempat_lahir' => [
                    'rules' => 'required|',
                    'errors' => [
                        'required' => 'Tempat lahir harus di isi'
                    ]
                ],
                'tanggal_lahir' => [
                    'rules' => 'required|',
                    'errors' => [
                        'required' => 'Tanggal lahir harus di isi'
                    ]
                ],
                'agama' => [
                    'rules' => 'required|',
                    'errors' => [
                        'required' => 'Agama harus di isi'
                    ]
                ],
                'ijazah' => [
                    'rules' => 'required|',
                    'errors' => [
                        'required' => 'Ijazah harus di isi'
                    ]
                ],
                'tahun_ijazah' => [
                    'rules' => 'required|',
                    'errors' => [
                        'required' => 'Tahun ijazah harus di isi'
                    ]
                ],
                'tanggal_diangkat' => [
                    'rules' => 'required|',
                    'errors' => [
                        'required' => 'Tanggal diangkat harus di isi'
                    ]
                ],
                'tanggal_bekerja' => [
                    'rules' => 'required|',
                    'errors' => [
                        'required' => 'Tanggal bekerja harus di isi'
                    ]
                ],
                'tanggal_pensiun' => [
                    'rules' => 'required|',
                    'errors' => [
                        'required' => 'Tanggal pensiun harus di isi'
                    ]
                ],
                'jam_mengajar' => [
                    'rules' => 'required|',
                    'errors' => [
                        'required' => 'Jumlah jam mengajar harus di isi'
                    ]
                ],
            ])) {
                $validation = \Config\Services::validation();
                return redirect()->to('/admin/tambah_dataguru')->withInput()->withInput(
                    'validation',
                    $validation
                );
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

            $dataGuru = $this->GuruModel->where(
                'nip',
                $nip
            )->first();

            if ($foto_guru->getError() == 4) {
                $nama_foto = $dataGuru['foto_guru'];
            } else {
                $nama_foto = $nip . '.' . $foto_guru->getClientExtension();
                $foto_guru->move(
                    'img',
                    $nama_foto
                );
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
                'foto_guru' => $nama_foto
            ];
            $this->GuruModel->update(
                $nip,
                $data
            );
            session()->setFlashdata(
                'berhasil',
                'Data berhasil diupdate!'
            );
            return redirect()->to('/admin/data_guru');
        } else {
            return redirect()->to('/auth/admin');
        }
    }

    public function data_siswa()
    {
        if (session()->get('logged_in') == 'admin') {
            $dataGuru = $this->GuruModel->where(
                'nip',
                session()->get('nip')
            )->first();

            $data = [
                'title' => 'Data Siswa',
                'nama' => $dataGuru['nama'],
                'dataSiswa' => $this->SiswaModel
            ];
            return view(
                'pages/admin/dataSiswa',
                $data
            );
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
                'title' => 'Data Siswa',
                'nama' => $dataGuru['nama'],
                'validation' => \Config\Services::validation()
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
                'nisn' => [
                    'rules' => 'required|',
                    'errors' => [
                        'required' => 'NISN harus di isi'
                    ]
                ],
                'nis' => [
                    'rules' => 'required|',
                    'errors' => [
                        'required' => 'NIS harus di isi'
                    ]
                ],
                'nama' => [
                    'rules' => 'required|',
                    'errors' => [
                        'required' => 'Nama harus di isi'
                    ]
                ],
                'tempat_lahir' => [
                    'rules' => 'required|',
                    'errors' => [
                        'required' => 'Tempat lahir harus di isi'
                    ]
                ],
                'tanggal_lahir' => [
                    'rules' => 'required|',
                    'errors' => [
                        'required' => 'Tanggal lahir harus di isi'
                    ]
                ],
                'agama' => [
                    'rules' => 'required|',
                    'errors' => [
                        'required' => 'Agama harus di isi'
                    ]
                ],
                'pendidikan_sebelum' => [
                    'rules' => 'required|',
                    'errors' => [
                        'required' => 'Pendidikan sebelumnya harus di isi'
                    ]
                ],
                'alamat' => [
                    'rules' => 'required|',
                    'errors' => [
                        'required' => 'Alamat harus di isi'
                    ]
                ],
                'nama_ayah' => [
                    'rules' => 'required|',
                    'errors' => [
                        'required' => 'Nama ayah harus di isi'
                    ]
                ],
                'nama_ibu' => [
                    'rules' => 'required|',
                    'errors' => [
                        'required' => 'Nama ibu harus di isi'
                    ]
                ],
                'pekerjaan_ayah' => [
                    'rules' => 'required|',
                    'errors' => [
                        'required' => 'Pekerjaan ayah harus di isi'
                    ]
                ],
                'pekerjaan_ibu' => [
                    'rules' => 'required|',
                    'errors' => [
                        'required' => 'Pekerjaan ibu harus di isi'
                    ]
                ],
                'alamat_orang_tua' => [
                    'rules' => 'required|',
                    'errors' => [
                        'required' => 'Alamat orang tua harus di isi'
                    ]
                ],
                'tahun_mendaftar' => [
                    'rules' => 'required|',
                    'errors' => [
                        'required' => 'Tahun mendaftar harus di isi'
                    ]
                ],
                'status_siswa' => [
                    'rules' => 'required|',
                    'errors' => [
                        'required' => 'Status siswa harus di isi'
                    ]
                ],
            ])) {
                $validation = \Config\Services::validation();
                return redirect()->to('/admin/tambah_datasiswa')->withInput()->withInput(
                    'validation',
                    $validation
                );
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
            $pekerjaan_ayah = $this->request->getVar('tempat_lahir');
            $pekerjaan_ibu = $this->request->getVar('tanggal_lahir');
            $alamat_orang_tua = $this->request->getVar('jenis_kelamin');
            $tahun_mendaftar = $this->request->getVar('agama');
            $status_siswa = $this->request->getVar('status_siswa');
            $foto_siswa = $this->request->getFile('foto_siswa');

            if ($foto_siswa->getError() == 4) {
                $nama_foto = 'Default.jpg';
            } else {
                $nama_foto = $nisn . '.' . $foto_siswa->getClientExtension();
                $foto_siswa->move(
                    'img',
                    $nama_foto
                );
            }
            $data = [
                'nisn' => $nisn,
                'nis' => $nis,
                'nama' => $nama,
                'tempat_lahir' => $tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'jenis_kelamin' => $jenis_kelamin,
                'agama' => $agama,
                'pendidikan_sebelum' => $pendidikan_sebelum,
                'alamat' => $alamat,
                'nama_ayah' => $nama_ayah,
                'nama_ibu' => $nama_ibu,
                'pekerjaan_ayah' => $pekerjaan_ayah,
                'pekerjaan_ibu' => $pekerjaan_ibu,
                'alamat_orang_tua' => $alamat_orang_tua,
                'tahun_mendaftar' => $tahun_mendaftar,
                'status_siswa' => $status_siswa,
                'foto_siswa' => $nama_foto
            ];
            //       dd($data);
            $this->SiswaModel->insert($data);

            session()->setFlashdata(
                'berhasil',
                'Data berhasil ditambah!'
            );
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
            $nisn = $this->request->getVar('nip');
            $data = [
                'title' => 'Data Siswa',
                'nama' => $dataGuru['nama'],
                'dataSiswa' => $this->SiswaModel->where(
                    'nisn',
                    $nisn
                ),
                'validation' => \Config\Services::validation()
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
        } else {
            return redirect()->to('/auth/admin');
        }
    }
}
