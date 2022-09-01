<?= $this->extend('layout/template_table'); ?>

<?= $this->section('content'); ?>
<div class="card mb-2">
    <div class="card-header">
        <h5 class="text-primary font-weight-bold m-0">Tambah Data Guru</h5>
    </div>
    <div class="card-body">
        <form action="<?= base_url('/admin/val_tambah_dataguru') ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <!-- NIP DAN NUPTK -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="text" class="form-control <?= ($validation->hasError('nip')) ? 'is-invalid' : ''; ?>" name="nip" id="nip" value="<?= old('nip') ?>">
                                <small class=" form-text text-danger"><?= $validation->getError('nip'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nuptk">NUPTK</label>
                                <input type="text" class="form-control <?= ($validation->hasError('nuptk')) ? 'is-invalid' : ''; ?>" name="nuptk" id="nuptk" value="<?= old('nuptk') ?>">
                                <small class=" form-text text-danger"><?= $validation->getError('nuptk'); ?></small>
                            </div>
                        </div>
                    </div>

                    <!-- NAMA -->
                    <div class="form-group">
                        <label for="nama">NAMA</label>
                        <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" name="nama" id="nama" value="<?= old('nama') ?>">
                        <small class=" form-text text-danger"><?= $validation->getError('nama'); ?></small>
                    </div>

                    <!-- TEMPAT LAHIR DAN TANGGAL LAHIR -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tempat_lahir">TEMPAT LAHIR</label>
                                <input type="text" class="form-control <?= ($validation->hasError('tempat_lahir')) ? 'is-invalid' : ''; ?>" name="tempat_lahir" id="tempat_lahir" value="<?= old('tempat_lahir') ?>">
                                <small class=" form-text text-danger"><?= $validation->getError('tempat_lahir'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal_lahir">TANGGAL LAHIR</label>
                                <input type="date" class="form-control <?= ($validation->hasError('tanggal_lahir')) ? 'is-invalid' : ''; ?>" name="tanggal_lahir" id="tanggal_lahir" value="<?= old('tanggal_lahir') ?>">
                                <small class=" form-text text-danger"><?= $validation->getError('tanggal_lahir'); ?></small>
                            </div>
                        </div>
                    </div>

                    <!-- JENIS KELAMIN -->

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jenis_kelamin">JENIS KELAMIN</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="Laki-laki" checked>
                                    <label class="form-check-label" for="laki-laki">
                                        Laki-laki
                                    </label>
                                    <input class="form-check-input ml-4" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan">
                                    <label class="form-check-label ml-5" for="perempuan">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="agama">AGAMA</label>
                                <input type="text" class="form-control <?= ($validation->hasError('agama')) ? 'is-invalid' : ''; ?>" name="agama" id="agama" value="<?= old('agama') ?>">
                                <small class=" form-text text-danger"><?= $validation->getError('agama'); ?></small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ijazah">IJAZAH</label>
                                <input type="text" class="form-control <?= ($validation->hasError('ijazah')) ? 'is-invalid' : ''; ?>" name="ijazah" id="ijazah" value="<?= old('ijazah') ?>">
                                <small class=" form-text text-danger"><?= $validation->getError('ijazah'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tahun_ijazah">TAHUN IJAZAH</label>
                                <input type="text" class="form-control <?= ($validation->hasError('tahun_ijazah')) ? 'is-invalid' : ''; ?>" name="tahun_ijazah" id="tahun_ijazah" value="<?= old('tahun_ijazah') ?>">
                                <small class=" form-text text-danger"><?= $validation->getError('tahun_ijazah'); ?></small>
                            </div>
                        </div>
                    </div>

                    <!-- JENIS GURU -->
                    <div class="form-group">
                        <label for="jenis_guru">JENIS GURU</label>
                        <select class="form-control" name="jenis_guru" id="jenis_guru">
                            <option value="Kepala Sekolah">Kepala Sekolah</option>
                            <option value="Guru Kelas">Guru Kelas</option>
                            <option value="Guru PAI">Guru PAI</option>
                            <option value="Guru PJOK">Guru PJOK</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- TANGGAL DIANGKAT -->
                    <div class="form-group">
                        <label for="tanggal_angkatan">TANGGAL DIANGKAT</label>
                        <input type="date" class="form-control <?= ($validation->hasError('tanggal_diangkat')) ? 'is-invalid' : ''; ?>" name="tanggal_diangkat" id="tanggal_diangkat" value="<?= old('tanggal_diangkat') ?>">
                        <small class=" form-text text-danger"><?= $validation->getError('tanggal_diangkat'); ?></small>
                    </div>

                    <!-- TANGGAL MULAI MENGAJAR DISEKOLAH INI -->
                    <div class="form-group">
                        <label for="Mulai_bekerja_disekolah">TANGGAL MULAI BEKERJA DISEKOLAH INI</label>
                        <input type="date" class="form-control <?= ($validation->hasError('tanggal_bekerja')) ? 'is-invalid' : ''; ?>" name="tanggal_bekerja" id="tanggal_bekerja" value="<?= old('tanggal_bekerja') ?>">
                        <small class=" form-text text-danger"><?= $validation->getError('tanggal_bekerja'); ?></small>
                    </div>

                    <!-- TANGGAL PENSIUN -->
                    <div class="form-group">
                        <label for="tmt_masa_pensiun">TANGGAL PENSIUN</label>
                        <input type="date" class="form-control <?= ($validation->hasError('tanggal_pensiun')) ? 'is-invalid' : ''; ?>" name="tanggal_pensiun" id="tanggal_pensiun" value="<?= old('tanggal_pensiun') ?>">
                        <small class=" form-text text-danger"><?= $validation->getError('tanggal_pensiun'); ?></small>
                    </div>

                    <!-- MENGAJAR DIKELAS -->
                    <div class="form-group">
                        <label for="mengajar_dikelas">MENGAMPU KELAS</label>
                        <select class="form-control" name="kelas_diampu" id="kelas_diampu">
                            <option value="-">-</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="Semua Kelas">Semua Kelas</option>
                        </select>
                    </div>

                    <!-- JUMLAH JAM MENGAJAR -->
                    <div class="form-group">
                        <label for="nama">JUMLAH JAM MENGAJAR</label>
                        <input type="text" class="form-control <?= ($validation->hasError('jam_mengajar')) ? 'is-invalid' : ''; ?>" name="jam_mengajar" id="jam_mengajar" value="<?= old('jam_mengajar') ?>">
                        <small class=" form-text text-danger"><?= $validation->getError('jam_mengajar'); ?></small>
                    </div>

                    <!-- FOTO -->
                    <div class="form-group">
                        <label for="foto_guru">FOTO GURU</label>
                        <input type="file" class="form-control" name="foto" id="foto">
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-primary btn-block mt-4" value="Simpan Data">
        </form>
    </div>
</div>
<?= $this->endSection(''); ?>