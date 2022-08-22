<?= $this->extend('layout/template_table'); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <h6 class="text-primary m-0 font-weight-bold">Input Nilai Eskul</h6>
    </div>
    <div class="card-body">
        <?php
        $nisn = $_GET['nisn'];
        $id_kelas = $_GET['id_kelas'];
        $id_tahun_ajaran = $_GET['id_tahun_ajaran'];

        //ABSENSI
        $eskul = $Eskul->where(['nisn' => $nisn, 'id_kelas' => $id_kelas, 'id_tahun_ajaran' => $id_tahun_ajaran])->first();
        ?>
        <form action="<?= base_url('admin/val_nilai_eskul') ?>" method="post">
            <div class="form-group">
                <label>ID ESKUL</label>
                <input type="text" class="form-control" name="id_eskul" id="id_eskul" value="<?= $eskul['id_eskul'] ?>" readonly>
            </div>
            <div class="form-group">
                <label>NISN</label>
                <input type="text" class="form-control" name="nisn" id="nisn" value="<?= $eskul['nisn'] ?>" readonly>
            </div>
            <div class="form-group">
                <label>ID KELAS</label>
                <input type="text" class="form-control" name="id_kelas" id="id_kelas" value="<?= $eskul['id_kelas'] ?>" readonly>
            </div>
            <div class="form-group">
                <label>ID TAHUN AJARAN</label>
                <input type="text" class="form-control" name="id_tahun_ajaran" id="id_tahun_ajaran" value="<?= $eskul['id_tahun_ajaran'] ?>" readonly>
            </div>
            <hr>
            <h6 class="font-weight-bold">NILAI ESKUL</h6>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>NILAI</label>
                        <input type="text" class="form-control" name="nilai" id="nilai" value="<?= $eskul['nilai'] ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>DESKRIPSI</label>
                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="3" class="form-control"><?= $eskul['deskripsi'] ?></textarea>
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="SIMPAN">
            <a href="<?= base_url('/admin/input_eskul_siswa') ?>" class="btn btn-danger">KEMBALI</a>
        </form>
    </div>
</div>
<?= $this->endSection(''); ?>