<?= $this->extend('layout/template_table'); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <h6 class="text-primary m-0 font-weight-bold">Input Nilai Siswa</h6>
    </div>
    <div class="card-body">
        <?php
        $nisn = $_GET['nisn'];
        $id_kelas = $_GET['id_kelas'];
        $id_tahun_ajaran = $_GET['id_tahun_ajaran'];

        //ABSENSI
        $absensi = $Absensi->where(['nisn' => $nisn, 'id_kelas' => $id_kelas, 'id_tahun_ajaran' => $id_tahun_ajaran])->first();
        ?>
        <form action="<?= base_url('admin/val_input_absensi') ?>" method="post">
            <div class="form-group">
                <label>NISN</label>
                <input type="text" class="form-control" name="nisn" id="nisn" value="<?= $absensi['nisn'] ?>" readonly>
            </div>
            <div class="form-group">
                <label>ID KELAS</label>
                <input type="text" class="form-control" name="id_kelas" id="id_kelas" value="<?= $absensi['id_kelas'] ?>" readonly>
            </div>
            <div class="form-group">
                <label>ID TAHUN AJARAN</label>
                <input type="text" class="form-control" name="id_tahun_ajaran" id="id_tahun_ajaran" value="<?= $absensi['id_tahun_ajaran'] ?>" readonly>
            </div>
            <hr>
            <h6 class="font-weight-bold">ABSENSI</h6>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>SAKIT</label>
                        <input type="text" class="form-control" name="sakit" id="sakit" value="<?= $absensi['sakit'] ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>IZIN</label>
                        <input type="text" class="form-control" name="izin" id="izin" value="<?= $absensi['izin'] ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>TANPA KETERANGAN</label>
                        <input type="text" class="form-control" name="tanpa_keterangan" id="tanpa_keterangan" value="<?= $absensi['tanpa_keterangan'] ?>">
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="SIMPAN">
            <a href="<?= base_url('/admin/input_nilai_siswa') ?>" class="btn btn-danger">KEMBALI</a>
        </form>
    </div>
</div>
<?= $this->endSection(''); ?>