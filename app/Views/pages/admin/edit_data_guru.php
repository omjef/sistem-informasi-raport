<?= $this->extend('layout/template_table'); ?>

<?= $this->section('content'); ?>
<!-- Card -->
<div class="card">
    <div class="card-header">
        <h6 class=" text-primary font-weight-bold m-0">Edit Akun Guru</h6>
    </div>
    <div class="card-body">
        <?php $data = $guru->where('nip', $_GET['nip'])->first(); ?>
        <form action="<?= base_url('/admin/validasi_edit_data_guru') ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <!-- NIP -->
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <input type="text" class="form-control" name="nip" id="nip" value="<?= $data['nip']; ?>" readonly>
                    </div>

                    <!-- NUPTK -->
                    <div class="form-group">
                        <label for="nuptk">NUPTK</label>
                        <input type="text" class="form-control" name="nuptk" id="nuptk" placeholder="Masukan nuptk" value="<?= $data['nuptk']; ?>">
                    </div>

                    <!-- NAMA -->
                    <div class="form-group">
                        <label for="nama">NAMA</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan nama guru" value="<?= $data['nama']; ?>">
                    </div>

                    <!-- TEMPAT LAHIR -->
                    <div class="form-group">
                        <label for="tempat_lahir">TEMPAT LAHIR</label>
                        <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Masukan tempat lahir" value="<?= $data['tempat_lahir']; ?>">
                    </div>

                    <!-- TANGGAL LAHIR -->
                    <div class="form-group">
                        <label for="tanggal_lahir">TANGGAL LAHIR</label>
                        <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="<?= $data['tanggal_lahir']; ?>">
                    </div>

                    <!-- JENIS KELAMIN -->
                    <div class="form-group">
                        <label for="jenis_kelamin">JENIS KELAMIN</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="Laki-laki" <?php if ($data['jenis_kelamin'] == 'Laki-laki') echo 'checked'; ?>>
                            <label class="form-check-label" for="laki-laki">
                                Laki-laki
                            </label>
                            <input class="form-check-input ml-4" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan" <?php if ($data['jenis_kelamin'] == 'Perempuan') echo 'checked'; ?>>
                            <label class="form-check-label ml-5" for="perempuan">
                                Perempuan
                            </label>
                        </div>
                    </div>

                    <!-- AGAMA -->
                    <div class="form-group">
                        <label for="agama">AGAMA</label>
                        <input type="text" class="form-control" name="agama" id="agama" placeholder="Masukan agama" value="<?= $data['agama']; ?>">
                    </div>

                    <!-- IJAZAH -->
                    <div class="form-group">
                        <label for="ijazah">IJAZAH</label>
                        <input type="text" class="form-control" name="ijazah" id="ijazah" placeholder="Masukan ijazah" value="<?= $data['ijazah']; ?>">
                    </div>

                    <!-- TAHUN IJAZAH -->
                    <div class="form-group">
                        <label for="tahun_ijazah">TAHUN IJAZAH</label>
                        <input type="text" class="form-control" name="tahun_ijazah" id="tahun_ijazah" placeholder="Masukan tahun ijazah" value="<?= $data['tahun_ijazah']; ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- JENIS GURU -->
                    <div class="form-group">
                        <label for="jenis_guru">JENIS GURU</label>
                        <select class="form-control" aria-label="Default select example" name="jenis_guru" id="jenis_guru">
                            <option <?php if ($data['jenis_guru'] == "Kepala Sekolah") echo "selected"; ?> value="Kepala Sekolah">Kepala Sekolah</option>
                            <option <?php if ($data['jenis_guru'] == "Guru Kelas") echo "selected"; ?> value="Guru Kelas">Guru Kelas</option>
                            <option <?php if ($data['jenis_guru'] == "Guru PAI") echo "selected"; ?> value="Guru PAI">Guru PAI</option>
                            <option <?php if ($data['jenis_guru'] == "Guru PJOK") echo "selected"; ?> value="Guru PJOK">Guru PJOK</option>
                        </select>
                    </div>

                    <!-- TANGGAL DIANGKAT -->
                    <div class="form-group">
                        <label for="tanggal_angkatan">TANGGAL DIANGKAT</label>
                        <input type="date" class="form-control" name="tanggal_angkatan" id="tanggal_angkatan" value="<?= $data['tanggal_angkatan']; ?>">
                    </div>

                    <!-- TANGGAL MULAI MENGAJAR DISEKOLAH INI -->
                    <div class="form-group">
                        <label for="Mulai_bekerja_disekolah">TANGGAL MULAI MENGAJAR DISEKOLAH INI</label>
                        <input type="date" class="form-control" name="mulai_bekerja_disekolah" id="mulai_bekerja_disekolah" value="<?= $data['mulai_bekerja_disekolah']; ?>">
                    </div>

                    <!-- TANGGAL PENSIUN -->
                    <div class="form-group">
                        <label for="tmt_masa_pensiun">TANGGAL PENSIUN</label>
                        <input type="date" class="form-control" name="tmt_masa_pensiun" id="tmt_masa_pensiun" value="<?= $data['tmt_masa_pensiun']; ?>">
                    </div>

                    <!-- MENGAJAR DIKELAS -->
                    <div class="form-group">
                        <label for="mengajar_dikelas">MENGAJAR DIKELAS</label>
                        <select class="form-control" name="mengajar_dikelas" id="mengajar_dikelas">
                            <option <?php if ($data['mengajar_dikelas'] == "1") echo "selected"; ?> value="1">1</option>
                            <option <?php if ($data['mengajar_dikelas'] == "2") echo "selected"; ?> value="2">2</option>
                            <option <?php if ($data['mengajar_dikelas'] == "3") echo "selected"; ?> value="3">3</option>
                            <option <?php if ($data['mengajar_dikelas'] == "4") echo "selected"; ?> value="4">4</option>
                            <option <?php if ($data['mengajar_dikelas'] == "5") echo "selected"; ?> value="5">5</option>
                            <option <?php if ($data['mengajar_dikelas'] == "6") echo "selected"; ?> value="6">6</option>
                            <option <?php if ($data['mengajar_dikelas'] == "Semua Kelas") echo "selected"; ?> value="Semua Kelas">Semua Kelas</option>
                        </select>
                    </div>

                    <!-- JUMLAH JAM MENGAJAR -->
                    <div class="form-group">
                        <label for="nama">JUMLAH JAM MENGAJAR</label>
                        <input type="text" class="form-control" name="jumlah_jam_mengajar" id="jumlah_jam_mengajar" placeholder="Masukan jumlah jam mengajar" value="<?= $data['jumlah_jam_mengajar'] ?>">
                    </div>

                    <!-- FOTO -->
                    <div class="form-group">
                        <label for="foto_guru">FOTO GURU</label>
                        <input type="file" class="form-control" name="foto_guru" id="foto_guru">
                        <small class="form-text text-muted">Jika foto tidak di ganti, biarkan saja!</small>
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-primary btn-block mt-4" value="Simpan Data">
        </form>
    </div>
</div>
<!-- Akhir card -->
<?= $this->endSection(''); ?>