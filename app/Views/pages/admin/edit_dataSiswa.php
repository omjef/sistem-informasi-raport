<?= $this->extend('layout/template_table'); ?>

<?= $this->section('content'); ?>
<div class="card mb-2">
    <div class="card-header">
        <h5 class="text-primary font-weight-bold m-0">Edit Data Siswa</h5>
    </div>
    <div class="card-body">
        <form action="<?= base_url('/admin/val_edit_datasiswa') ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nisn">NISN</label>
                                <input type="text" class="form-control <?= ($validation->hasError('nisn')) ? 'is-invalid' : ''; ?>" name="nisn" id="nisn" placeholder="Masukan nisn" value="<?= $dataSiswa['nisn'] ?>">
                                <small class="form-text text-danger"><?= $validation->getError('nisn'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nis">NIS</label>
                                <input type="text" class="form-control <?= ($validation->hasError('nis')) ? 'is-invalid' : ''; ?>" name="nis" id="nis" placeholder="Masukan nis" value="<?= $dataSiswa['nis'] ?>">
                                <small class=" form-text text-danger"><?= $validation->getError('nis'); ?></small>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nama">NAMA</label>
                        <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" name="nama" id="nama" placeholder="Masukan nama guru" value="<?= $dataSiswa['nama'] ?>">
                        <small class=" form-text text-danger"><?= $validation->getError('nama'); ?></small>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tempat_lahir">TEMPAT LAHIR</label>
                                <input type="text" class="form-control <?= ($validation->hasError('tempat_lahir')) ? 'is-invalid' : ''; ?>" name="tempat_lahir" id="tempat_lahir" placeholder="Masukan tempat lahir" value="<?= $dataSiswa['tempat_lahir'] ?>">
                                <small class=" form-text text-danger"><?= $validation->getError('tempat_lahir'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal_lahir">TANGGAL LAHIR</label>
                                <input type="date" class="form-control <?= ($validation->hasError('tanggal_lahir')) ? 'is-invalid' : ''; ?>" name="tanggal_lahir" id="tanggal_lahir" value="<?= $dataSiswa['tanggal_lahir'] ?>">
                                <small class=" form-text text-danger"><?= $validation->getError('tanggal_lahir'); ?></small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jenis_kelamin">JENIS KELAMIN</label>
                                <div class="form-check">
                                    <input <?= ($dataSiswa['jenis_kelamin'] == 'Laki-laki') ? 'checked' : ''; ?> class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="Laki-laki">
                                    <label class="form-check-label" for="laki-laki">
                                        Laki-laki
                                    </label>
                                    <input <?= ($dataSiswa['jenis_kelamin'] == 'Perempuan') ? 'checked' : ''; ?> class="form-check-input ml-4" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan">
                                    <label class="form-check-label ml-5" for="perempuan">
                                        Perempuan
                                    </label>
                                </div>
                                <small class=" form-text text-danger"><?= $validation->getError('tanggal_lahir'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="agama">AGAMA</label>
                                <input type="text" class="form-control <?= ($validation->hasError('agama')) ? 'is-invalid' : ''; ?>" name="agama" id="agama" placeholder="Masukan agama" value="<?= $dataSiswa['agama'] ?>">
                                <small class=" form-text text-danger"><?= $validation->getError('agama'); ?></small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pendidikan_sebelum">Pendidikan Sebelumnya</label>
                                <input type="text" class="form-control <?= ($validation->hasError('pendidikan_sebelum')) ? 'is-invalid' : ''; ?>" name="pendidikan_sebelum" id="pendidikan_sebelum" placeholder="Masukan pendidikan sebelumnya" value="<?= $dataSiswa['pendidikan_sebelum'] ?>">
                                <small class=" form-text text-danger"><?= $validation->getError('pendidikan_sebelum'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="1" placeholder="Masukan alamat"><?= $dataSiswa['alamat'] ?></textarea>
                                <small class=" form-text text-danger"><?= $validation->getError('alamat'); ?></small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_ayah">Nama Ayah</label>
                                <input type="text" class="form-control <?= ($validation->hasError('nama_ayah')) ? 'is-invalid' : ''; ?>" name="nama_ayah" id="nama_ayah" placeholder="Masukan nama ayah" value="<?= $dataSiswa['nama_ayah'] ?>">
                                <small class=" form-text text-danger"><?= $validation->getError('nama_ayah'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_ayah">Nama Ibu</label>
                                <input type="text" class="form-control <?= ($validation->hasError('nama_ibu')) ? 'is-invalid' : ''; ?>" name="nama_ibu" id="nama_ibu" placeholder="Masukan nama ibu" value="<?= $dataSiswa['nama_ibu'] ?>">
                                <small class=" form-text text-danger"><?= $validation->getError('nama_ibu'); ?></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_ayah">Pekerjaan Ayah</label>
                                <input type="text" class="form-control <?= ($validation->hasError('pekerjaan_ayah')) ? 'is-invalid' : ''; ?>" name="pekerjaan_ayah" id="pekerjaan_ayah" placeholder="Masukan pekerjaan ayah" value="<?= $dataSiswa['pekerjaan_ayah'] ?>">
                                <small class=" form-text text-danger"><?= $validation->getError('pekerjaan_ayah'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_ayah">Pekerjaan Ibu</label>
                                <input type="text" class="form-control <?= ($validation->hasError('pekerjaan_ibu')) ? 'is-invalid' : ''; ?>" name="pekerjaan_ibu" id="pekerjaan_ibu" placeholder="Masukan pekerjaan ibu" value="<?= $dataSiswa['pekerjaan_ibu'] ?>">
                                <small class=" form-text text-danger"><?= $validation->getError('pekerjaan_ibu'); ?></small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat_orang_tua">Alamat Orang Tua</label>
                        <textarea name="alamat_orang_tua" id="alamat_orang_tua" cols="30" rows="2" class="form-control <?= ($validation->hasError('alamat_orang_tua')) ? 'is-invalid' : ''; ?>" placeholder="Masukan alamat orang tua"><?= $dataSiswa['alamat_orang_tua'] ?></textarea>
                        <small class=" form-text text-danger"><?= $validation->getError('alamat_orang_tua'); ?></small>
                    </div>

                    <div class="form-group">
                        <label for="tahun_mendaftar">Tahun Mendaftar</label>
                        <input type="text" class="form-control <?= ($validation->hasError('tahun_mendaftar')) ? 'is-invalid' : ''; ?>" name="tahun_mendaftar" id="tahun_mendaftar" placeholder="Masukan tahun mendaftar" value="<?= $dataSiswa['tahun_mendaftar'] ?>">
                        <small class=" form-text text-danger"><?= $validation->getError('tahun_mendaftar'); ?></small>
                    </div>

                    <div class="form-group">
                        <label for="status_siswa">Status Siswa</label>
                        <select class="form-control" name="status_siswa" id="status_siswa">
                            <option <?= ($dataSiswa['status_siswa'] == 'Aktif') ? '' : ''; ?> value="Aktif">Aktif</option>
                            <option <?= ($dataSiswa['status_siswa'] == 'Lulus') ? '' : ''; ?> value="Lulus">Lulus</option>
                            <option <?= ($dataSiswa['status_siswa'] == 'Pindah') ? '' : ''; ?> value="Pindah">Pindah</option>
                            <option <?= ($dataSiswa['status_siswa'] == 'Keluar') ? '' : ''; ?> value="Keluar">Keluar</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="foto_siswa">Foto Siswa</label>
                        <input type="file" class="form-control" name="foto_siswa" id="foto_siswa">
                        <small class="form-text">Jika foto tidak akan diganti, biarkan saja!</small>
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-primary btn-block mt-4" value="Simpan Data">
        </form>
    </div>
</div>
<?= $this->endSection(''); ?>