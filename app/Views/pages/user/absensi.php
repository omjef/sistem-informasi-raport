<?= $this->extend('layout/template_table'); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Absensi Siswa</h6>
    </div>
    <div class="card-body">
        <div class="card border-left-primary shadow h-100 py-2 pl-2 mb-2">
            <h1 class="h4">Keterangan :</h1>
            Absensi siswa berisi ketidak hadiran siswa.
        </div>
        <form action="<?= base_url('/user/absensi') ?>" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Masukan Kelas</label>
                        <select class="form-control" name="kelas" id="kelas">
                            <option <?php if (isset($_POST['lihat_nilai'])) {
                                        echo ($_POST['kelas'] == '1') ? 'Selected' : '';
                                    } ?>>1</option>
                            <option <?php if (isset($_POST['lihat_nilai'])) {
                                        echo ($_POST['kelas'] == '2') ? 'Selected' : '';
                                    } ?>>2</option>
                            <option <?php if (isset($_POST['lihat_nilai'])) {
                                        echo ($_POST['kelas'] == '3') ? 'Selected' : '';
                                    } ?>>3</option>
                            <option <?php if (isset($_POST['lihat_nilai'])) {
                                        echo ($_POST['kelas'] == '4') ? 'Selected' : '';
                                    } ?>>4</option>
                            <option <?php if (isset($_POST['lihat_nilai'])) {
                                        echo ($_POST['kelas'] == '5') ? 'Selected' : '';
                                    } ?>>5</option>
                            <option <?php if (isset($_POST['lihat_nilai'])) {
                                        echo ($_POST['kelas'] == '6') ? 'Selected' : '';
                                    } ?>>6</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Masukan Semester</label>
                        <select class="form-control" name="semester" id="semester">
                            <option <?php if (isset($_POST['lihat_nilai'])) {
                                        echo ($_POST['semester'] == 'Ganjil') ? 'Selected' : '';
                                    } ?>>Ganjil</option>
                            <option <?php if (isset($_POST['lihat_nilai'])) {
                                        echo ($_POST['semester'] == 'Genap') ? 'Selected' : '';
                                    } ?>>Genap</option>
                        </select>
                    </div>
                </div>
            </div>
            <input class="btn btn-primary btn-user btn-block" type="Submit" name="lihat_nilai" value="Lihat Nilai">
        </form>
    </div>
</div>

<?php
if (isset($_POST['lihat_nilai'])) :
    $kls = $_POST['kelas'];
    $semester = $_POST['semester'];

    $data_kelas = $kelas->where([
        'kelas' => $kls,
        'semester' => $semester
    ])->first();

    $data_absensi = $absensi->where([
        'nisn' => $nisn,
        'id_kelas' => $data_kelas['id_kelas']
    ])->first();
    if ($data_absensi == NULL) {
?>
        <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert"> Data Tidak Ditemukan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } else {
        $data_guru = $guru->where('nip', $data_kelas['nip'])->first();
    ?>
        <div class="card mt-4 mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary text-center">Data Siswa Dan Absensi Siswa</h6>
            </div>
            <div class="card-body">
                <table class="table table-hover table-borderless mb-2" width="100%" cellspacing="0">
                    <tr>
                        <td style="width: 25%;">Nama</td>
                        <td style="width: 3%;">:</td>
                        <td><?= $nama; ?></td>
                    </tr>
                    <tr>
                        <td>Kelas</td>
                        <td>:</td>
                        <td><?= $kls; ?></td>
                    </tr>
                    <tr>
                        <td>Semester</td>
                        <td>:</td>
                        <td><?= $semester; ?></td>
                    </tr>
                    <tr>
                        <td>Wali Kelas</td>
                        <td>:</td>
                        <td><?= $data_guru['nama'] ?></td>
                    </tr>
                </table>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="width: 35%;">Sakit</th>
                                <th style="width: 35%;">Izin</th>
                                <th>Tanpa Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $data_absensi['sakit'] ?></td>
                                <td><?= $data_absensi['izin'] ?></td>
                                <td><?= $data_absensi['tanpa_keterangan'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
<?php
    }
endif
?>
<?= $this->endSection(''); ?>