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
                        <label for="semester">Masukan Semester</label>
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
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="aspek">Aspek</label>
                        <select class="form-control" name="aspek" id="aspek">
                            <option <?php if (isset($_POST['lihat_nilai'])) {
                                        echo ($_POST['aspek'] == 'Keterampilan') ? 'Selected' : '';
                                    } ?>>Keterampilan</option>
                            <option <?php if (isset($_POST['lihat_nilai'])) {
                                        echo ($_POST['aspek'] == 'Pengetahuan') ? 'Selected' : '';
                                    } ?>>Pengetahuan</option>
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
    //Tampung Data Sementara
    $kls = $_POST['kelas'];
    $semester = $_POST['semester'];
    $aspek = $_POST['aspek'];

    //Ambil Data
    $data_kelas = $kelas->where([
        'kelas' => $kls,
        'semester' => $semester,
    ])->first();

    $data_guru = $guru->where([
        'nip' => $data_kelas['nip']
    ])->first();

    //Tampil Data
    $temp_data = $nilai->join('mapel', 'nilai.id_mapel = mapel.id_mapel', 'inner')->where([
        'nisn' => $nisn,
        'id_kelas' => $data_kelas['id_kelas'],
        'aspek' => $aspek
    ])->first();
    $data_nilai = $nilai->join('mapel', 'nilai.id_mapel = mapel.id_mapel', 'inner')->where([
        'nisn' => $nisn,
        'id_kelas' => $data_kelas['id_kelas'],
        'aspek' => $aspek
    ])->find();
    if ($data_nilai == NULL) {
?>
        <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert"> Data Tidak Ditemukan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
    } else {
        $data_ta = $ta->where('id_tahun_ajaran', $temp_data['id_tahun_ajaran'])->first();
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
                        <td><?= $kls; ?></td>
                    </tr>
                    <tr>
                        <td>Semester</td>
                        <td>:</td>
                        <td><?= $semester; ?></td>
                    </tr>
                    <tr>
                        <td>Tahun Ajaran</td>
                        <td>:</td>
                        <td><?= $data_ta['tahun_ajaran'] . "/" . $data_ta['tahun_ajaran'] + 1; ?></td>
                    </tr>
                    <tr>
                        <td>Aspek</td>
                        <td>:</td>
                        <td><?= $aspek; ?></td>
                    </tr>
                    <tr>
                        <td>Wali Kelas</td>
                        <td>:</td>
                        <td><?= $data_guru['nama'] ?></td>
                    </tr>
                </table>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center" width="100%" cellspacing="0">
                        <?php if ($kls <= '3' && $semester == 'Ganjil') : ?>
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
                        <?php elseif ($kls <= '3' && $semester == 'Genap') : ?>
                            <thead>
                                <tr>
                                    <th rowspan="2">MATA PELAJARAN</th>
                                    <th colspan="4">TEMA 5</th>
                                    <th colspan="4">TEMA 6</th>
                                    <th colspan="4">TEMA 7</th>
                                    <th colspan="4">TEMA 8</th>
                                    <th rowspan="2">RERATA SUB TEMA</th>
                                    <th rowspan="2">NILAI PT</th>
                                    <th rowspan="2">NILAI PAS</th>
                                    <th rowspan="2">NILAI RERATA</th>
                                </tr>
                                <tr>
                                    <th>SUB TEMA-5.1</th>
                                    <th>SUB TEMA-5.2</th>
                                    <th>SUB TEMA-5.3</th>
                                    <th>SUB TEMA-5.4</th>
                                    <th>SUB TEMA-6.1</th>
                                    <th>SUB TEMA-6.2</th>
                                    <th>SUB TEMA-6.3</th>
                                    <th>SUB TEMA-6.4</th>
                                    <th>SUB TEMA-7.1</th>
                                    <th>SUB TEMA-7.2</th>
                                    <th>SUB TEMA-7.3</th>
                                    <th>SUB TEMA-7.4</th>
                                    <th>SUB TEMA-8.1</th>
                                    <th>SUB TEMA-8.2</th>
                                    <th>SUB TEMA-8.3</th>
                                    <th>SUB TEMA-8.4</th>
                                </tr>
                            </thead>
                        <?php elseif ($kls >= '4' && $semester == 'Ganjil') : ?>
                            <thead>
                                <tr>
                                    <th rowspan="2">MATA PELAJARAN</th>
                                    <th colspan="3">TEMA 1</th>
                                    <th colspan="3">TEMA 2</th>
                                    <th colspan="3">TEMA 3</th>
                                    <th colspan="3">TEMA 4</th>
                                    <th colspan="3">TEMA 5</th>
                                    <th rowspan="2">RERATA SUB TEMA</th>
                                    <th rowspan="2">NILAI PT</th>
                                    <th rowspan="2">NILAI PAS</th>
                                    <th rowspan="2">NILAI RERATA</th>
                                </tr>
                                <tr>
                                    <th>SUB TEMA-1.1</th>
                                    <th>SUB TEMA-1.2</th>
                                    <th>SUB TEMA-1.3</th>
                                    <th>SUB TEMA-2.1</th>
                                    <th>SUB TEMA-2.2</th>
                                    <th>SUB TEMA-2.3</th>
                                    <th>SUB TEMA-3.1</th>
                                    <th>SUB TEMA-3.2</th>
                                    <th>SUB TEMA-3.3</th>
                                    <th>SUB TEMA-4.1</th>
                                    <th>SUB TEMA-4.2</th>
                                    <th>SUB TEMA-4.3</th>
                                    <th>SUB TEMA-5.1</th>
                                    <th>SUB TEMA-5.2</th>
                                    <th>SUB TEMA-5.3</th>
                                </tr>
                            </thead>
                        <?php elseif ($kls >= '4' && $semester == 'Genap') : ?>
                            <thead>
                                <tr>
                                    <th rowspan="2">MATA PELAJARAN</th>
                                    <th colspan="3">TEMA 6</th>
                                    <th colspan="3">TEMA 7</th>
                                    <th colspan="3">TEMA 8</th>
                                    <th colspan="3">TEMA 9</th>
                                    <th rowspan="2">RERATA SUB TEMA</th>
                                    <th rowspan="2">NILAI PT</th>
                                    <th rowspan="2">NILAI PAS</th>
                                    <th rowspan="2">NILAI RERATA</th>
                                </tr>
                                <tr>
                                    <th>SUB TEMA-6.1</th>
                                    <th>SUB TEMA-6.2</th>
                                    <th>SUB TEMA-6.3</th>
                                    <th>SUB TEMA-7.1</th>
                                    <th>SUB TEMA-7.2</th>
                                    <th>SUB TEMA-7.3</th>
                                    <th>SUB TEMA-8.1</th>
                                    <th>SUB TEMA-8.2</th>
                                    <th>SUB TEMA-8.3</th>
                                    <th>SUB TEMA-9.1</th>
                                    <th>SUB TEMA-9.2</th>
                                    <th>SUB TEMA-9.3</th>
                                </tr>
                            </thead>
                        <?php endif; ?>
                        <?php if ($kls < 4 && $semester == 'Ganjil') : ?>
                            <tbody>
                                <?php
                                foreach ($data_nilai as $data_nilai) :
                                ?>
                                    <tr>
                                        <td><?= $data_nilai['nama_mapel'] ?></td>
                                        <td><?= $data_nilai['nilai_1'] ?></td>
                                        <td><?= $data_nilai['nilai_2'] ?></td>
                                        <td><?= $data_nilai['nilai_3'] ?></td>
                                        <td><?= $data_nilai['nilai_4'] ?></td>
                                        <td><?= $data_nilai['nilai_5'] ?></td>
                                        <td><?= $data_nilai['nilai_6'] ?></td>
                                        <td><?= $data_nilai['nilai_7'] ?></td>
                                        <td><?= $data_nilai['nilai_8'] ?></td>
                                        <td><?= $data_nilai['nilai_9'] ?></td>
                                        <td><?= $data_nilai['nilai_10'] ?></td>
                                        <td><?= $data_nilai['nilai_11'] ?></td>
                                        <td><?= $data_nilai['nilai_12'] ?></td>
                                        <td><?= $data_nilai['nilai_13'] ?></td>
                                        <td><?= $data_nilai['nilai_14'] ?></td>
                                        <td><?= $data_nilai['nilai_15'] ?></td>
                                        <td><?= $data_nilai['nilai_16'] ?></td>
                                        <?php
                                        $temp = $data_nilai['nilai_1'] + $data_nilai['nilai_2'] + $data_nilai['nilai_3'] + $data_nilai['nilai_4'] + $data_nilai['nilai_5'] + $data_nilai['nilai_6'] + $data_nilai['nilai_7'] + $data_nilai['nilai_8'] + $data_nilai['nilai_9'] + $data_nilai['nilai_10'] + $data_nilai['nilai_11'] + $data_nilai['nilai_12'] + $data_nilai['nilai_13'] + $data_nilai['nilai_14'] + $data_nilai['nilai_15'] + $data_nilai['nilai_16'];
                                        ?>
                                        <td><?= $rerata = $temp / 16 ?></td>
                                        <td><?= $data_nilai['pts'] ?></td>
                                        <td><?= $data_nilai['pas'] ?></td>
                                        <td><?= ($rerata + $rerata + $data_nilai['pts'] + $data_nilai['pas']) / 4; ?></td>
                                    </tr>
                                <?php
                                endforeach
                                ?>
                            </tbody>
                        <?php elseif ($kls < 3 && $semester == 'Genap') : ?>
                            <tbody>
                                <?php
                                foreach ($data_nilai as $data_nilai) :
                                ?>
                                    <tr>
                                        <td><?= $data_nilai['nama_mapel'] ?></td>
                                        <td><?= $data_nilai['nilai_1'] ?></td>
                                        <td><?= $data_nilai['nilai_2'] ?></td>
                                        <td><?= $data_nilai['nilai_3'] ?></td>
                                        <td><?= $data_nilai['nilai_4'] ?></td>
                                        <td><?= $data_nilai['nilai_5'] ?></td>
                                        <td><?= $data_nilai['nilai_6'] ?></td>
                                        <td><?= $data_nilai['nilai_7'] ?></td>
                                        <td><?= $data_nilai['nilai_8'] ?></td>
                                        <td><?= $data_nilai['nilai_9'] ?></td>
                                        <td><?= $data_nilai['nilai_10'] ?></td>
                                        <td><?= $data_nilai['nilai_11'] ?></td>
                                        <td><?= $data_nilai['nilai_12'] ?></td>
                                        <td><?= $data_nilai['nilai_13'] ?></td>
                                        <td><?= $data_nilai['nilai_14'] ?></td>
                                        <td><?= $data_nilai['nilai_15'] ?></td>
                                        <td><?= $data_nilai['nilai_16'] ?></td>
                                        <?php
                                        $temp = $data_nilai['nilai_1'] + $data_nilai['nilai_2'] + $data_nilai['nilai_3'] + $data_nilai['nilai_4'] + $data_nilai['nilai_5'] + $data_nilai['nilai_6'] + $data_nilai['nilai_7'] + $data_nilai['nilai_8'] + $data_nilai['nilai_9'] + $data_nilai['nilai_10'] + $data_nilai['nilai_11'] + $data_nilai['nilai_12'] + $data_nilai['nilai_13'] + $data_nilai['nilai_14'] + $data_nilai['nilai_15'] + $data_nilai['nilai_16'];
                                        ?>
                                        <td><?= $rerata = $temp / 16 ?></td>
                                        <td><?= $data_nilai['pts'] ?></td>
                                        <td><?= $data_nilai['pas'] ?></td>
                                        <td><?= ($rerata + $rerata + $data_nilai['pts'] + $data_nilai['pas']) / 4; ?></td>
                                    </tr>
                                <?php
                                endforeach
                                ?>
                            </tbody>
                        <?php elseif ($kls > 3 && $semester == 'Ganjil') : ?>
                            <tbody>
                                <?php
                                foreach ($data_nilai as $data_nilai) :
                                ?>
                                    <tr>
                                        <td><?= $data_nilai['nama_mapel'] ?></td>
                                        <td><?= $data_nilai['nilai_1'] ?></td>
                                        <td><?= $data_nilai['nilai_2'] ?></td>
                                        <td><?= $data_nilai['nilai_3'] ?></td>
                                        <td><?= $data_nilai['nilai_4'] ?></td>
                                        <td><?= $data_nilai['nilai_5'] ?></td>
                                        <td><?= $data_nilai['nilai_6'] ?></td>
                                        <td><?= $data_nilai['nilai_7'] ?></td>
                                        <td><?= $data_nilai['nilai_8'] ?></td>
                                        <td><?= $data_nilai['nilai_9'] ?></td>
                                        <td><?= $data_nilai['nilai_10'] ?></td>
                                        <td><?= $data_nilai['nilai_11'] ?></td>
                                        <td><?= $data_nilai['nilai_12'] ?></td>
                                        <td><?= $data_nilai['nilai_13'] ?></td>
                                        <td><?= $data_nilai['nilai_14'] ?></td>
                                        <td><?= $data_nilai['nilai_15'] ?></td>
                                        <?php
                                        $temp = $data_nilai['nilai_1'] + $data_nilai['nilai_2'] + $data_nilai['nilai_3'] + $data_nilai['nilai_4'] + $data_nilai['nilai_5'] + $data_nilai['nilai_6'] + $data_nilai['nilai_7'] + $data_nilai['nilai_8'] + $data_nilai['nilai_9'] + $data_nilai['nilai_10'] + $data_nilai['nilai_11'] + $data_nilai['nilai_12'] + $data_nilai['nilai_13'] + $data_nilai['nilai_14'] + $data_nilai['nilai_15'];
                                        ?>
                                        <td><?= $rerata = $temp / 15 ?></td>
                                        <td><?= $data_nilai['pts'] ?></td>
                                        <td><?= $data_nilai['pas'] ?></td>
                                        <td><?= ($rerata + $rerata + $data_nilai['pts'] + $data_nilai['pas']) / 4; ?></td>
                                    </tr>
                                <?php
                                endforeach
                                ?>
                            </tbody>
                        <?php elseif ($kls > 3 && $semester == 'Genap') : ?>
                            <tbody>
                                <?php
                                foreach ($data_nilai as $data_nilai) :
                                ?>
                                    <tr>
                                        <td><?= $data_nilai['nama_mapel'] ?></td>
                                        <td><?= $data_nilai['nilai_1'] ?></td>
                                        <td><?= $data_nilai['nilai_2'] ?></td>
                                        <td><?= $data_nilai['nilai_3'] ?></td>
                                        <td><?= $data_nilai['nilai_4'] ?></td>
                                        <td><?= $data_nilai['nilai_5'] ?></td>
                                        <td><?= $data_nilai['nilai_6'] ?></td>
                                        <td><?= $data_nilai['nilai_7'] ?></td>
                                        <td><?= $data_nilai['nilai_8'] ?></td>
                                        <td><?= $data_nilai['nilai_9'] ?></td>
                                        <td><?= $data_nilai['nilai_10'] ?></td>
                                        <td><?= $data_nilai['nilai_11'] ?></td>
                                        <td><?= $data_nilai['nilai_12'] ?></td>
                                        <?php
                                        $temp = $data_nilai['nilai_1'] + $data_nilai['nilai_2'] + $data_nilai['nilai_3'] + $data_nilai['nilai_4'] + $data_nilai['nilai_5'] + $data_nilai['nilai_6'] + $data_nilai['nilai_7'] + $data_nilai['nilai_8'] + $data_nilai['nilai_9'] + $data_nilai['nilai_10'] + $data_nilai['nilai_11'] + $data_nilai['nilai_12'];
                                        ?>
                                        <td><?= $rerata = $temp / 12 ?></td>
                                        <td><?= $data_nilai['pts'] ?></td>
                                        <td><?= $data_nilai['pas'] ?></td>
                                        <td><?= ($rerata + $rerata + $data_nilai['pts'] + $data_nilai['pas']) / 4; ?></td>
                                    </tr>
                                <?php
                                endforeach
                                ?>
                            </tbody>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </div>
<?php
    }
endif
?>
<?= $this->endSection(''); ?>