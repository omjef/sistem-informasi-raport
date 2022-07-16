<?= $this->extend('layout/template_table'); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Nilai Siswa</h6>
    </div>
    <div class="card-body">
        <div class="card border-left-primary shadow h-100 py-2 pl-2 mb-2">
            <h1 class="h4">Keterangan :</h1>
            Halaman nilai siswa ini berisi informasi mengenai nilai siswa.
        </div>
        <form action="<?= base_url('/user/nilai') ?>" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="semester">Masukan Kelas</label>
                        <select class="form-control" name="kelas" id="kelas">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="semester">Masukan Semester</label>
                        <select class="form-control" name="semester" id="semester">
                            <option>Ganjil</option>
                            <option>Genap</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="aspek">Aspek</label>
                        <select class="form-control" name="aspek" id="aspek">
                            <option>Keterampilan</option>
                            <option>Pengetahuan</option>
                        </select>
                    </div>
                </div>
            </div>
            <input class="btn btn-primary btn-user btn-block" type="Submit" name="lihat_nilai" value="Lihat Nilai">
        </form>
    </div>
</div>

<?php
//Eksekusi
if (isset($_POST['lihat_nilai'])) :
    $kelas1 = $_POST['kelas'];
    $semester = $_POST['semester'];
    $aspek = $_POST['aspek'];

    //Data Siswa
    $kls = $kelas->where(array('kelas' => $kelas1, 'semester' => $semester))->first();
    //Nilai Siswa
    $tampil_nilai = $nilai->select('*')->join('tb_mapel', 'tb_nilai.no_mapel = tb_mapel.no_mapel', 'inner')->where(array('no_kelas' => $kls['no_kelas'], 'aspek' => $aspek, 'nisn' => $nisn))->find();
    //Tahun Ajaran
    $tahun_ajaran = $nilai->select('*')->join('tb_mapel', 'tb_nilai.no_mapel = tb_mapel.no_mapel', 'inner')->where(array('no_kelas' => $kls['no_kelas'], 'aspek' => $aspek, 'nisn' => $nisn))->first();
    //Data Guru
    $gru = $guru->where('nip', $kls['nip'])->first();
    //Jika data tidak ditemukan
    if ($tampil_nilai == NULL) {
?>
        <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert"> Data Tidak Ditemukan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
    } else {
    ?>
        <div class="card mt-4 mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary text-center">Data Siswa Dan Nilai Siswa</h6>
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
                        <td><?= $kelas1; ?></td>
                    </tr>
                    <tr>
                        <td>Semester</td>
                        <td>:</td>
                        <td><?= $semester; ?></td>
                    </tr>
                    <tr>
                        <td>Tahun Ajaran</td>
                        <td>:</td>
                        <td><?= $tahun_ajaran['tahun_ajaran'] . "/" . $tahun_ajaran['tahun_ajaran'] + 1; ?></td>
                    </tr>
                    <tr>
                        <td>Aspek</td>
                        <td>:</td>
                        <td><?= $aspek; ?></td>
                    </tr>
                    <tr>
                        <td>Wali Kelas</td>
                        <td>:</td>
                        <td><?= $gru['nama'] ?></td>
                    </tr>
                </table>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th rowspan="2">MATA PELAJARAN</th>
                                <th colspan="4">TEMA 1</th>
                                <th colspan="4">TEMA 2</th>
                                <th colspan="4">TEMA 3</th>
                                <th colspan="4">TEMA 4</th>
                                <th rowspan="2">RERATA SUB TEMA</th>
                                <th rowspan="2">NILAI PT</th>
                                <th rowspan="2">NILAI PAS</th>
                                <th rowspan="2">NILAI RERATA</th>
                            </tr>
                            <tr>
                                <th>SUB TEMA-1.1</th>
                                <th>SUB TEMA-1.2</th>
                                <th>SUB TEMA-1.3</th>
                                <th>SUB TEMA-1.4</th>
                                <th>SUB TEMA-2.1</th>
                                <th>SUB TEMA-2.2</th>
                                <th>SUB TEMA-2.3</th>
                                <th>SUB TEMA-2.4</th>
                                <th>SUB TEMA-3.1</th>
                                <th>SUB TEMA-3.2</th>
                                <th>SUB TEMA-3.3</th>
                                <th>SUB TEMA-3.4</th>
                                <th>SUB TEMA-4.1</th>
                                <th>SUB TEMA-4.2</th>
                                <th>SUB TEMA-4.3</th>
                                <th>SUB TEMA-4.4</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($tampil_nilai as $tampil_nilai) :
                            ?>
                                <tr>
                                    <td><?= $tampil_nilai['nama_mapel'] ?></td>
                                    <td><?= $tampil_nilai['nilai_1_1'] ?></td>
                                    <td><?= $tampil_nilai['nilai_1_2'] ?></td>
                                    <td><?= $tampil_nilai['nilai_1_3'] ?></td>
                                    <td><?= $tampil_nilai['nilai_1_4'] ?></td>
                                    <td><?= $tampil_nilai['nilai_2_1'] ?></td>
                                    <td><?= $tampil_nilai['nilai_2_2'] ?></td>
                                    <td><?= $tampil_nilai['nilai_2_3'] ?></td>
                                    <td><?= $tampil_nilai['nilai_2_4'] ?></td>
                                    <td><?= $tampil_nilai['nilai_3_1'] ?></td>
                                    <td><?= $tampil_nilai['nilai_3_2'] ?></td>
                                    <td><?= $tampil_nilai['nilai_3_3'] ?></td>
                                    <td><?= $tampil_nilai['nilai_3_4'] ?></td>
                                    <td><?= $tampil_nilai['nilai_4_1'] ?></td>
                                    <td><?= $tampil_nilai['nilai_4_2'] ?></td>
                                    <td><?= $tampil_nilai['nilai_4_3'] ?></td>
                                    <td><?= $tampil_nilai['nilai_4_4'] ?></td>
                                    <?php
                                    $temp = $tampil_nilai['nilai_1_1'] + $tampil_nilai['nilai_1_2'] + $tampil_nilai['nilai_1_3'] + $tampil_nilai['nilai_1_4'] + $tampil_nilai['nilai_2_1'] + $tampil_nilai['nilai_2_2'] + $tampil_nilai['nilai_2_3'] + $tampil_nilai['nilai_2_4'] + $tampil_nilai['nilai_3_1'] + $tampil_nilai['nilai_3_2'] + $tampil_nilai['nilai_3_3'] + $tampil_nilai['nilai_3_4'] + $tampil_nilai['nilai_4_1'] + $tampil_nilai['nilai_4_2'] + $tampil_nilai['nilai_4_3'] + $tampil_nilai['nilai_4_4'];
                                    ?>
                                    <td><?= $rerata = $temp / 16 ?></td>
                                    <td><?= $tampil_nilai['nilai_5_1'] ?></td>
                                    <td><?= $tampil_nilai['nilai_5_2'] ?></td>
                                    <td><?= ($rerata + $rerata + $tampil_nilai['nilai_5_1'] + $tampil_nilai['nilai_5_2']) / 4; ?></td>
                                </tr>
                            <?php
                            endforeach
                            ?>
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