<?= $this->extend('layout/template_table'); ?>

<?= $this->section('content'); ?>

<div class="card">
    <div class="card-header py-3 d-sm-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data Guru</h6>
    </div>
    <div class="card-body">
        <form action="<?= base_url('admin/val_tambah_guru'); ?>" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-gourp mb-2">
                        <label for="nip" class="form-label">Nip Guru</label>
                        <input type="text" class="form-control" name="nip" id="nip" placeholder="Masukan nip guru...">

                    </div>
                    <div class="form-gourp mb-2">
                        <label for="nuptk" class="form-label">NUPTK Guru</label>
                        <input type="text" class="form-control" name="nuptk" id="nuptk" placeholder="Masukan nuptk guru...">
                    </div>
                    <div class="form-gourp mb-2">
                        <label for="nama" class="form-label">Nama Guru</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan nama guru...">
                    </div>
                    <div class="form-gourp mb-2">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Masukan tempat lahir...">
                    </div>
                    <div class="form-gourp mb-2">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir">
                    </div>
                    <div class="form-gourp mb-2">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <input class="form-control" list="j_kel" name="jenis_kelamin" id="jenis_kelamin" placeholder="Masukan jenis kelamin...">
                        <datalist id="j_kel">
                            <option value="Laki-laki">
                            <option value="Perempuan">
                        </datalist>
                    </div>
                    <div class="form-gourp mb-2">
                        <label for="agama" class="form-label">Agama</label>
                        <input class="form-control" list="agama_ls" name="agama" id="agama" placeholder="Masukan agama...">
                        <datalist id="agama_ls">
                            <option value="Islam">
                            <option value="Kristen Protestan">
                            <option value="Kristen Katolik">
                            <option value="Hindu">
                            <option value="Buddha">
                            <option value="Konghucu">
                        </datalist>
                    </div>
                    <div class="form-gourp mb-2">
                        <label for="ijazah" class="form-label">Ijazah</label>
                        <input class="form-control" list="ijazah_ls" name="ijazah" id="Ijazah" placeholder="Masukan pendidikan yang diselesaikan...">
                        <datalist id="ijazah_ls">
                            <option value="S1">
                            <option value="S2">
                            <option value="S3">
                        </datalist>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-gourp mb-2">
                        <label for="tanggal_ijazah" class="form-label">Tanggal Ijazah</label>
                        <input type="date" class="form-control" name="tanggal_ijazah" id="tanggal_ijazah">
                    </div>
                    <div class="form-gourp mb-2">
                        <label for="jenis_guru" class="form-label">Jenis Guru</label>
                        <input class="form-control" list="jg_ls" name="jenis_guru" id="jenis_guru" placeholder="Masukan jenis guru...">
                        <datalist id="jg_ls">
                            <option value="Kepala Sekolah">
                            <option value="Guru Kelas">
                            <option value="Guru PAI">
                            <option value="Guru PJOK">
                        </datalist>
                    </div>
                    <div class="form-gourp mb-2">
                        <label for="tanggal_angkatan" class="form-label">Tanggal Angkatan</label>
                        <input type="date" class="form-control" name="tanggal_angkatan" id="tanggal_angkatan">
                    </div>
                    <div class="form-gourp mb-2">
                        <label for="mulai_bekerja_disekolah" class="form-label">Tanggal Mulai Bekerja Di Sekolah</label>
                        <input type="date" class="form-control" name="mulai_bekerja_disekolah" id="mulai_bekerja_disekolah">
                    </div>
                    <div class="form-gourp mb-2">
                        <label for="tmt_masa_pensiun" class="form-label">TMT Masa Pensiun</label>
                        <input type="date" class="form-control" name="tmt_masa_pensiun" id="tmt_masa_pensiun">
                    </div>
                    <div class="form-gourp mb-2">
                        <label for="mengajar_dikelas" class="form-label">Mengajar Dikelas</label>
                        <input class="form-control" list="md_ls" name="mengajar_dikelas" id="mengajar_dikelas" placeholder="Masukan kelas yang diampu...">
                        <datalist id="md_ls">
                            <option value="-">Tidak Mengampu Kelas</option>
                            <option value="1">Kelas Satu</option>
                            <option value="2">Kelas Dua</option>
                            <option value="3">Kelas Tiga</option>
                            <option value="4">Kelas Empat</option>
                            <option value="5">Kelas Lima</option>
                            <option value="6">Kelas Enam</option>
                            <option value="Semua Kelas">Mengampu Semua Kelas</option>
                        </datalist>
                    </div>
                    <div class="form-gourp mb-2">
                        <label for="jumlah_jam_mengajar" class="form-label">Jumlah Jam Mengajar</label>
                        <input type="text" class="form-control" name="jumlah_jam_mengajar" id="jumlah_jam_mengajar" placeholder="Masukan jumlah jam mengajar...">
                    </div>
                    <div class="form-gourp mb-2">
                        <label for="foto_siswa" class="form-label">Foto Guru</label>
                        <input class="form-control" type="file" name="foto_guru" id="foto_guru">
                    </div>
                </div>
                <input type="submit" class="btn btn-primary btn-user btn-block mt-2" value="Simpan Data">
            </div>
        </form>
    </div>
</div>

<?= $this->endSection(''); ?>