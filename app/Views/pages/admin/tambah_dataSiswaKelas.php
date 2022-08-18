<?= $this->extend('layout/template_table'); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <h6 class="text-primary font-weight-bold m-0">Tambah Data Siswa Ke Kelas</h6>
    </div>
    <div class="card-body">
        <form action="<?= base_url('/admin/tambah_data_siswakelas') ?>" method="post">
            <div class="form-group">
                <label>Tahun Terdaftar</label>
                <input class="form-control" type="text" name="tahun_siswa" id="tahun_siswa" placeholder="Masukan tahun siswa terdaftar">
            </div>
            <input class="btn btn-primary" type="submit" name="cari_siswa" id="cari_siswa" value="Cari Siswa">
        </form>
    </div>
</div>

<?php if (isset($_POST['cari_siswa'])) : ?>
    <div class="card mt-3">
        <form action="<?= base_url('/admin/val_tambah_data_siswakelas') ?>" method="post">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Kelas</label>
                            <select class="form-control" name="kelas" id="kelas">
                                <?php for ($i = 1; $i <= 6; $i++) : ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Semester</label>
                            <select class="form-control" name="semester" id="semester">
                                <option value="Ganjil">Ganjil</option>
                                <option value="Ganjil">Genap</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tahun Ajaran</label>
                            <select class="form-control" name="tahun_ajaran" id="tahun_ajaran">
                                <?php foreach ($TahunAjaran as $data) : ?>
                                    <option value="<?= $data['tahun_ajaran'] ?>"><?= $data['tahun_ajaran'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="table-responsive mt-2">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th>NISN</th>
                                <th>NAMA</th>
                                <th>TAHUN TERDAFTAR</th>
                                <th>PILIH SISWA</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php foreach ($Siswa->where('tahun_mendaftar', $_POST['tahun_siswa'])->find() as $data) : ?>
                                <tr>
                                    <td><?= $data['nisn'] ?></td>
                                    <td><?= $data['nama'] ?></td>
                                    <td><?= $data['tahun_mendaftar'] ?></td>
                                    <td><input type="checkbox" name="siswa[]" id="siswa[]" value="<?= $data['nisn'] ?>"></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <input type="submit" class="btn btn-primary mt-2" value="Masukan Siswa">
                <a href="<?= base_url('/admin/data_siswakelas') ?>" class="btn btn-danger mt-2 ml-2">Kembali</a>
            </div>
        </form>
    </div>
<?php endif; ?>
<?= $this->endSection(''); ?>