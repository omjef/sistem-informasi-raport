<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RAPORT SD</title>
    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/css/sb-admin-2.min.css" rel="stylesheet">


</head>

<body>
    <div class="card m-3">
        <div class="card-body">
            <?php
            $getNISN = $_GET['nisn'];
            $getID_KELAS = $_GET['id_kelas'];
            $getID_TAHUN_AJARAN = $_GET['id_tahun_ajaran'];

            $getSiswa = $siswa->where('nisn', $getNISN)->first();
            $getKelas = $kelas->where('id_kelas', $getID_KELAS)->first();
            $getSekolah = $sekolah->first();
            $getTahunAjaran = $tahun_ajaran->where('id_tahun_ajaran', $getID_TAHUN_AJARAN)->first();
            ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">Nama Peserta Didik</div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-6"><?= $getSiswa['nama'] ?></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">Kelas</div>
                        <div class="col-md-1">:</div>
                        <div class="col-md"><?= $getKelas['kelas'] ?></div>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">NISN</div>
                        <div class="col-md-1">:</div>
                        <div class="col-md"><?= $getSiswa['nisn'] ?></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">Semester</div>
                        <div class="col-md-1">:</div>
                        <div class="col-md"><?= $getKelas['semester'] ?></div>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">Nama Sekolah</div>
                        <div class="col-md-1">:</div>
                        <div class="col-md"><?= $getSekolah['nama'] ?></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">Tahun Ajaran</div>
                        <div class="col-md-1">:</div>
                        <div class="col-md"><?= $getTahunAjaran['tahun_ajaran'] ?></div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">Alamat Sekolah</div>
                        <div class="col-md-1">:</div>
                        <div class="col-md"><?= $getSekolah['alamat'] . ', Kelurahan ' . $getSekolah['kelurahan'] . ', Kecamatan ' . $getSekolah['kecamatan'] . ', Kota ' . $getSekolah['kota'] . ', ' . $getSekolah['provinsi'] ?></div>
                    </div>
                </div>
            </div>

            <h6 class="font-weight-bold mt-4">A. Kompetensi Sikap</h6>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center" colspan="2">Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="w-25">1.Sikap Spiritual</td>
                            <td>Baik dalam ketaatan beribadah, berperilaku syukur, berdo'a sebelum dan sesudah melakukan kegiatan, toleransi beragama.
                            </td>
                        </tr>
                        <tr>
                            <td>2.Sikap Sosial</td>
                            <td>Baik dalam bersikap jujur, disiplin, percaya diri, santun, peduli.</td>
                        </tr>
                    </tbody>
                </table>

                <h6 class="font-weight-bold mt-4">B. Kompetensi Pengetahuan dan Keterampilan</h6>
                <h6 class="font-weight-bold">KKM Satuan Pendidikan : 75,00</h6>
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center" rowspan="2">NO</th>
                                <th class="text-center w-25" rowspan="2">Muatan Pelajaran</th>
                                <th class="text-center w-25" colspan="3">Pengetahuan</th>
                                <th class="text-center w-25" colspan="3">Keterampilan</th>
                            </tr>
                            <tr>
                                <th class="text-center">Nilai</th>
                                <th class="text-center">Predikat</th>
                                <th class="text-center w-25">Deskripsi</th>
                                <th class="text-center">Nilai</th>
                                <th class="text-center">Predikat</th>
                                <th class="text-center w-25">Deskripsi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <td>1</td>
                                <td>Pendidikan Agama dan Budi Pekerti</td>
                                <?php
                                if ($getID_KELAS == 'K11' or $getID_KELAS == 'K21' or $getID_KELAS == 'K31' or $getID_KELAS == 'K12' or $getID_KELAS == 'K22' or $getID_KELAS == 'K32') :
                                    $nilai_p = $nilai->where(['nisn' => $getNISN, 'id_kelas' => $getID_KELAS, 'id_mapel' => 'P7', 'id_tahun_ajaran' => $getID_TAHUN_AJARAN])->first();
                                    $hasil_p = $nilai_p['nilai_1'] + $nilai_p['nilai_2'] + $nilai_p['nilai_3'] + $nilai_p['nilai_4'] + $nilai_p['nilai_5'] +
                                        $nilai_p['nilai_6'] + $nilai_p['nilai_7'] + $nilai_p['nilai_8'] + $nilai_p['nilai_9'] + $nilai_p['nilai_10'] + $nilai_p['nilai_11']
                                        + $nilai_p['nilai_12'] + $nilai_p['nilai_13'] + $nilai_p['nilai_14'] + $nilai_p['nilai_15'] + $nilai_p['nilai_16'];
                                    $hasil_akhir = (($hasil_p / 16) + ($hasil_p / 16) + $nilai_p['pts'] + $nilai_p['pas']) / 4;
                                elseif ($getID_KELAS == 'K41' or $getID_KELAS == 'K51' or $getID_KELAS == 'K61') :
                                    $nilai_p = $nilai->where(['nisn' => $getNISN, 'id_kelas' => $getID_KELAS, 'id_mapel' => 'P7', 'id_tahun_ajaran' => $getID_TAHUN_AJARAN])->first();
                                    $hasil_p = $nilai_p['nilai_1'] + $nilai_p['nilai_2'] + $nilai_p['nilai_3'] + $nilai_p['nilai_4'] + $nilai_p['nilai_5'] +
                                        $nilai_p['nilai_6'] + $nilai_p['nilai_7'] + $nilai_p['nilai_8'] + $nilai_p['nilai_9'] + $nilai_p['nilai_10'] + $nilai_p['nilai_11']
                                        + $nilai_p['nilai_12'] + $nilai_p['nilai_13'] + $nilai_p['nilai_14'] + $nilai_p['nilai_15'];
                                    $hasil_akhir = (($hasil_p / 15) + ($hasil_p / 15) + $nilai_p['pts'] + $nilai_p['pas']) / 4;
                                elseif ($getID_KELAS == 'K42' or $getID_KELAS == 'K52' or $getID_KELAS == 'K62') :
                                    $nilai_p = $nilai->where(['nisn' => $getNISN, 'id_kelas' => $getID_KELAS, 'id_mapel' => 'P7', 'id_tahun_ajaran' => $getID_TAHUN_AJARAN])->first();
                                    $hasil_p = $nilai_p['nilai_1'] + $nilai_p['nilai_2'] + $nilai_p['nilai_3'] + $nilai_p['nilai_4'] + $nilai_p['nilai_5'] +
                                        $nilai_p['nilai_6'] + $nilai_p['nilai_7'] + $nilai_p['nilai_8'] + $nilai_p['nilai_9'] + $nilai_p['nilai_10'] + $nilai_p['nilai_11']
                                        + $nilai_p['nilai_12'];
                                    $hasil_akhir = (($hasil_p / 12) + ($hasil_p / 12) + $nilai_p['pts'] + $nilai_p['pas']) / 4;
                                endif;
                                ?>
                                <td><?= number_format($hasil_akhir, 0) ?></td>
                                <td><?php
                                    if ($hasil_akhir > 90) :
                                        echo "A";
                                    elseif ($hasil_akhir > 80 and $hasil_akhir <= 90) :
                                        echo "B";
                                    elseif ($hasil_akhir > 75  and $hasil_akhir <= 80) :
                                        echo "C";
                                    elseif ($hasil_akhir > 70 and $hasil_akhir <= 75) :
                                        echo "D";
                                    else :
                                        echo "E";
                                    endif;
                                    ?></td>
                                <td><?= $nilai_p['deskripsi'] ?></td>
                                <?php
                                if ($getID_KELAS == 'K11' or $getID_KELAS == 'K21' or $getID_KELAS == 'K31' or $getID_KELAS == 'K12' or $getID_KELAS == 'K22' or $getID_KELAS == 'K32') :
                                    $nilai_p = $nilai->where(['nisn' => $getNISN, 'id_kelas' => $getID_KELAS, 'id_mapel' => 'K7', 'id_tahun_ajaran' => $getID_TAHUN_AJARAN])->first();
                                    $hasil_p = $nilai_p['nilai_1'] + $nilai_p['nilai_2'] + $nilai_p['nilai_3'] + $nilai_p['nilai_4'] + $nilai_p['nilai_5'] +
                                        $nilai_p['nilai_6'] + $nilai_p['nilai_7'] + $nilai_p['nilai_8'] + $nilai_p['nilai_9'] + $nilai_p['nilai_10'] + $nilai_p['nilai_11']
                                        + $nilai_p['nilai_12'] + $nilai_p['nilai_13'] + $nilai_p['nilai_14'] + $nilai_p['nilai_15'] + $nilai_p['nilai_16'];
                                    $hasil_akhir = (($hasil_p / 16) + ($hasil_p / 16) + $nilai_p['pts'] + $nilai_p['pas']) / 4;
                                elseif ($getID_KELAS == 'K41' or $getID_KELAS == 'K51' or $getID_KELAS == 'K61') :
                                    $nilai_p = $nilai->where(['nisn' => $getNISN, 'id_kelas' => $getID_KELAS, 'id_mapel' => 'K7', 'id_tahun_ajaran' => $getID_TAHUN_AJARAN])->first();
                                    $hasil_p = $nilai_p['nilai_1'] + $nilai_p['nilai_2'] + $nilai_p['nilai_3'] + $nilai_p['nilai_4'] + $nilai_p['nilai_5'] +
                                        $nilai_p['nilai_6'] + $nilai_p['nilai_7'] + $nilai_p['nilai_8'] + $nilai_p['nilai_9'] + $nilai_p['nilai_10'] + $nilai_p['nilai_11']
                                        + $nilai_p['nilai_12'] + $nilai_p['nilai_13'] + $nilai_p['nilai_14'] + $nilai_p['nilai_15'];
                                    $hasil_akhir = (($hasil_p / 15) + ($hasil_p / 15) + $nilai_p['pts'] + $nilai_p['pas']) / 4;
                                elseif ($getID_KELAS == 'K42' or $getID_KELAS == 'K52' or $getID_KELAS == 'K62') :
                                    $nilai_p = $nilai->where(['nisn' => $getNISN, 'id_kelas' => $getID_KELAS, 'id_mapel' => 'K7', 'id_tahun_ajaran' => $getID_TAHUN_AJARAN])->first();
                                    $hasil_p = $nilai_p['nilai_1'] + $nilai_p['nilai_2'] + $nilai_p['nilai_3'] + $nilai_p['nilai_4'] + $nilai_p['nilai_5'] +
                                        $nilai_p['nilai_6'] + $nilai_p['nilai_7'] + $nilai_p['nilai_8'] + $nilai_p['nilai_9'] + $nilai_p['nilai_10'] + $nilai_p['nilai_11']
                                        + $nilai_p['nilai_12'];
                                    $hasil_akhir = (($hasil_p / 12) + ($hasil_p / 12) + $nilai_p['pts'] + $nilai_p['pas']) / 4;
                                endif;
                                ?>
                                <td><?= number_format($hasil_akhir, 0) ?></td>
                                <td><?php
                                    if ($hasil_akhir > 90) :
                                        echo "A";
                                    elseif ($hasil_akhir > 80 and $hasil_akhir <= 90) :
                                        echo "B";
                                    elseif ($hasil_akhir > 75  and $hasil_akhir <= 80) :
                                        echo "C";
                                    elseif ($hasil_akhir > 70 and $hasil_akhir <= 75) :
                                        echo "D";
                                    else :
                                        echo "E";
                                    endif;
                                    ?></td>
                                <td><?= $nilai_p['deskripsi'] ?></td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>Pendidikan Pancasila dan Kewarganegaraan</td>
                                <?php
                                if ($getID_KELAS == 'K11' or $getID_KELAS == 'K21' or $getID_KELAS == 'K31' or $getID_KELAS == 'K12' or $getID_KELAS == 'K22' or $getID_KELAS == 'K32') :
                                    $nilai_p = $nilai->where(['nisn' => $getNISN, 'id_kelas' => $getID_KELAS, 'id_mapel' => 'P1', 'id_tahun_ajaran' => $getID_TAHUN_AJARAN])->first();
                                    $hasil_p = $nilai_p['nilai_1'] + $nilai_p['nilai_2'] + $nilai_p['nilai_3'] + $nilai_p['nilai_4'] + $nilai_p['nilai_5'] +
                                        $nilai_p['nilai_6'] + $nilai_p['nilai_7'] + $nilai_p['nilai_8'] + $nilai_p['nilai_9'] + $nilai_p['nilai_10'] + $nilai_p['nilai_11']
                                        + $nilai_p['nilai_12'] + $nilai_p['nilai_13'] + $nilai_p['nilai_14'] + $nilai_p['nilai_15'] + $nilai_p['nilai_16'];
                                    $hasil_akhir = (($hasil_p / 16) + ($hasil_p / 16) + $nilai_p['pts'] + $nilai_p['pas']) / 4;
                                elseif ($getID_KELAS == 'K41' or $getID_KELAS == 'K51' or $getID_KELAS == 'K61') :
                                    $nilai_p = $nilai->where(['nisn' => $getNISN, 'id_kelas' => $getID_KELAS, 'id_mapel' => 'P1', 'id_tahun_ajaran' => $getID_TAHUN_AJARAN])->first();
                                    $hasil_p = $nilai_p['nilai_1'] + $nilai_p['nilai_2'] + $nilai_p['nilai_3'] + $nilai_p['nilai_4'] + $nilai_p['nilai_5'] +
                                        $nilai_p['nilai_6'] + $nilai_p['nilai_7'] + $nilai_p['nilai_8'] + $nilai_p['nilai_9'] + $nilai_p['nilai_10'] + $nilai_p['nilai_11']
                                        + $nilai_p['nilai_12'] + $nilai_p['nilai_13'] + $nilai_p['nilai_14'] + $nilai_p['nilai_15'];
                                    $hasil_akhir = (($hasil_p / 15) + ($hasil_p / 15) + $nilai_p['pts'] + $nilai_p['pas']) / 4;
                                elseif ($getID_KELAS == 'K42' or $getID_KELAS == 'K52' or $getID_KELAS == 'K62') :
                                    $nilai_p = $nilai->where(['nisn' => $getNISN, 'id_kelas' => $getID_KELAS, 'id_mapel' => 'P1', 'id_tahun_ajaran' => $getID_TAHUN_AJARAN])->first();
                                    $hasil_p = $nilai_p['nilai_1'] + $nilai_p['nilai_2'] + $nilai_p['nilai_3'] + $nilai_p['nilai_4'] + $nilai_p['nilai_5'] +
                                        $nilai_p['nilai_6'] + $nilai_p['nilai_7'] + $nilai_p['nilai_8'] + $nilai_p['nilai_9'] + $nilai_p['nilai_10'] + $nilai_p['nilai_11']
                                        + $nilai_p['nilai_12'];
                                    $hasil_akhir = (($hasil_p / 12) + ($hasil_p / 12) + $nilai_p['pts'] + $nilai_p['pas']) / 4;
                                endif;
                                ?>
                                <td><?= number_format($hasil_akhir, 0) ?></td>
                                <td><?php
                                    if ($hasil_akhir > 90) :
                                        echo "A";
                                    elseif ($hasil_akhir > 80 and $hasil_akhir <= 90) :
                                        echo "B";
                                    elseif ($hasil_akhir > 75  and $hasil_akhir <= 80) :
                                        echo "C";
                                    elseif ($hasil_akhir > 70 and $hasil_akhir <= 75) :
                                        echo "D";
                                    else :
                                        echo "E";
                                    endif;
                                    ?></td>
                                <td><?= $nilai_p['deskripsi'] ?></td>
                                <?php
                                if ($getID_KELAS == 'K11' or $getID_KELAS == 'K21' or $getID_KELAS == 'K31' or $getID_KELAS == 'K12' or $getID_KELAS == 'K22' or $getID_KELAS == 'K32') :
                                    $nilai_p = $nilai->where(['nisn' => $getNISN, 'id_kelas' => $getID_KELAS, 'id_mapel' => 'K1', 'id_tahun_ajaran' => $getID_TAHUN_AJARAN])->first();
                                    $hasil_p = $nilai_p['nilai_1'] + $nilai_p['nilai_2'] + $nilai_p['nilai_3'] + $nilai_p['nilai_4'] + $nilai_p['nilai_5'] +
                                        $nilai_p['nilai_6'] + $nilai_p['nilai_7'] + $nilai_p['nilai_8'] + $nilai_p['nilai_9'] + $nilai_p['nilai_10'] + $nilai_p['nilai_11']
                                        + $nilai_p['nilai_12'] + $nilai_p['nilai_13'] + $nilai_p['nilai_14'] + $nilai_p['nilai_15'] + $nilai_p['nilai_16'];
                                    $hasil_akhir = (($hasil_p / 16) + ($hasil_p / 16) + $nilai_p['pts'] + $nilai_p['pas']) / 4;
                                elseif ($getID_KELAS == 'K41' or $getID_KELAS == 'K51' or $getID_KELAS == 'K61') :
                                    $nilai_p = $nilai->where(['nisn' => $getNISN, 'id_kelas' => $getID_KELAS, 'id_mapel' => 'K1', 'id_tahun_ajaran' => $getID_TAHUN_AJARAN])->first();
                                    $hasil_p = $nilai_p['nilai_1'] + $nilai_p['nilai_2'] + $nilai_p['nilai_3'] + $nilai_p['nilai_4'] + $nilai_p['nilai_5'] +
                                        $nilai_p['nilai_6'] + $nilai_p['nilai_7'] + $nilai_p['nilai_8'] + $nilai_p['nilai_9'] + $nilai_p['nilai_10'] + $nilai_p['nilai_11']
                                        + $nilai_p['nilai_12'] + $nilai_p['nilai_13'] + $nilai_p['nilai_14'] + $nilai_p['nilai_15'];
                                    $hasil_akhir = (($hasil_p / 15) + ($hasil_p / 15) + $nilai_p['pts'] + $nilai_p['pas']) / 4;
                                elseif ($getID_KELAS == 'K42' or $getID_KELAS == 'K52' or $getID_KELAS == 'K62') :
                                    $nilai_p = $nilai->where(['nisn' => $getNISN, 'id_kelas' => $getID_KELAS, 'id_mapel' => 'K1', 'id_tahun_ajaran' => $getID_TAHUN_AJARAN])->first();
                                    $hasil_p = $nilai_p['nilai_1'] + $nilai_p['nilai_2'] + $nilai_p['nilai_3'] + $nilai_p['nilai_4'] + $nilai_p['nilai_5'] +
                                        $nilai_p['nilai_6'] + $nilai_p['nilai_7'] + $nilai_p['nilai_8'] + $nilai_p['nilai_9'] + $nilai_p['nilai_10'] + $nilai_p['nilai_11']
                                        + $nilai_p['nilai_12'];
                                    $hasil_akhir = (($hasil_p / 12) + ($hasil_p / 12) + $nilai_p['pts'] + $nilai_p['pas']) / 4;
                                endif;
                                ?>
                                <td><?= number_format($hasil_akhir, 0) ?></td>
                                <td><?php
                                    if ($hasil_akhir > 90) :
                                        echo "A";
                                    elseif ($hasil_akhir > 80 and $hasil_akhir <= 90) :
                                        echo "B";
                                    elseif ($hasil_akhir > 75  and $hasil_akhir <= 80) :
                                        echo "C";
                                    elseif ($hasil_akhir > 60 and $hasil_akhir <= 75) :
                                        echo "D";
                                    else :
                                        echo "E";
                                    endif;
                                    ?></td>
                                <td><?= $nilai_p['deskripsi'] ?></td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>Bahasa Indonesia</td>
                                <?php
                                if ($getID_KELAS == 'K11' or $getID_KELAS == 'K21' or $getID_KELAS == 'K31' or $getID_KELAS == 'K12' or $getID_KELAS == 'K22' or $getID_KELAS == 'K32') :
                                    $nilai_p = $nilai->where(['nisn' => $getNISN, 'id_kelas' => $getID_KELAS, 'id_mapel' => 'P2', 'id_tahun_ajaran' => $getID_TAHUN_AJARAN])->first();
                                    $hasil_p = $nilai_p['nilai_1'] + $nilai_p['nilai_2'] + $nilai_p['nilai_3'] + $nilai_p['nilai_4'] + $nilai_p['nilai_5'] +
                                        $nilai_p['nilai_6'] + $nilai_p['nilai_7'] + $nilai_p['nilai_8'] + $nilai_p['nilai_9'] + $nilai_p['nilai_10'] + $nilai_p['nilai_11']
                                        + $nilai_p['nilai_12'] + $nilai_p['nilai_13'] + $nilai_p['nilai_14'] + $nilai_p['nilai_15'] + $nilai_p['nilai_16'];
                                    $hasil_akhir = (($hasil_p / 16) + ($hasil_p / 16) + $nilai_p['pts'] + $nilai_p['pas']) / 4;
                                elseif ($getID_KELAS == 'K41' or $getID_KELAS == 'K51' or $getID_KELAS == 'K61') :
                                    $nilai_p = $nilai->where(['nisn' => $getNISN, 'id_kelas' => $getID_KELAS, 'id_mapel' => 'P2', 'id_tahun_ajaran' => $getID_TAHUN_AJARAN])->first();
                                    $hasil_p = $nilai_p['nilai_1'] + $nilai_p['nilai_2'] + $nilai_p['nilai_3'] + $nilai_p['nilai_4'] + $nilai_p['nilai_5'] +
                                        $nilai_p['nilai_6'] + $nilai_p['nilai_7'] + $nilai_p['nilai_8'] + $nilai_p['nilai_9'] + $nilai_p['nilai_10'] + $nilai_p['nilai_11']
                                        + $nilai_p['nilai_12'] + $nilai_p['nilai_13'] + $nilai_p['nilai_14'] + $nilai_p['nilai_15'];
                                    $hasil_akhir = (($hasil_p / 15) + ($hasil_p / 15) + $nilai_p['pts'] + $nilai_p['pas']) / 4;
                                elseif ($getID_KELAS == 'K42' or $getID_KELAS == 'K52' or $getID_KELAS == 'K62') :
                                    $nilai_p = $nilai->where(['nisn' => $getNISN, 'id_kelas' => $getID_KELAS, 'id_mapel' => 'P2', 'id_tahun_ajaran' => $getID_TAHUN_AJARAN])->first();
                                    $hasil_p = $nilai_p['nilai_1'] + $nilai_p['nilai_2'] + $nilai_p['nilai_3'] + $nilai_p['nilai_4'] + $nilai_p['nilai_5'] +
                                        $nilai_p['nilai_6'] + $nilai_p['nilai_7'] + $nilai_p['nilai_8'] + $nilai_p['nilai_9'] + $nilai_p['nilai_10'] + $nilai_p['nilai_11']
                                        + $nilai_p['nilai_12'];
                                    $hasil_akhir = (($hasil_p / 12) + ($hasil_p / 12) + $nilai_p['pts'] + $nilai_p['pas']) / 4;
                                endif;
                                ?>
                                <td><?= number_format($hasil_akhir, 0) ?></td>
                                <td><?php
                                    if ($hasil_akhir > 90) :
                                        echo "A";
                                    elseif ($hasil_akhir > 80 and $hasil_akhir <= 90) :
                                        echo "B";
                                    elseif ($hasil_akhir > 75  and $hasil_akhir <= 80) :
                                        echo "C";
                                    elseif ($hasil_akhir > 70 and $hasil_akhir <= 75) :
                                        echo "D";
                                    else :
                                        echo "E";
                                    endif;
                                    ?></td>
                                <td><?= $nilai_p['deskripsi'] ?></td>
                                <?php
                                if ($getID_KELAS == 'K11' or $getID_KELAS == 'K21' or $getID_KELAS == 'K31' or $getID_KELAS == 'K12' or $getID_KELAS == 'K22' or $getID_KELAS == 'K32') :
                                    $nilai_p = $nilai->where(['nisn' => $getNISN, 'id_kelas' => $getID_KELAS, 'id_mapel' => 'K2', 'id_tahun_ajaran' => $getID_TAHUN_AJARAN])->first();
                                    $hasil_p = $nilai_p['nilai_1'] + $nilai_p['nilai_2'] + $nilai_p['nilai_3'] + $nilai_p['nilai_4'] + $nilai_p['nilai_5'] +
                                        $nilai_p['nilai_6'] + $nilai_p['nilai_7'] + $nilai_p['nilai_8'] + $nilai_p['nilai_9'] + $nilai_p['nilai_10'] + $nilai_p['nilai_11']
                                        + $nilai_p['nilai_12'] + $nilai_p['nilai_13'] + $nilai_p['nilai_14'] + $nilai_p['nilai_15'] + $nilai_p['nilai_16'];
                                    $hasil_akhir = (($hasil_p / 16) + ($hasil_p / 16) + $nilai_p['pts'] + $nilai_p['pas']) / 4;
                                elseif ($getID_KELAS == 'K41' or $getID_KELAS == 'K51' or $getID_KELAS == 'K61') :
                                    $nilai_p = $nilai->where(['nisn' => $getNISN, 'id_kelas' => $getID_KELAS, 'id_mapel' => 'K2', 'id_tahun_ajaran' => $getID_TAHUN_AJARAN])->first();
                                    $hasil_p = $nilai_p['nilai_1'] + $nilai_p['nilai_2'] + $nilai_p['nilai_3'] + $nilai_p['nilai_4'] + $nilai_p['nilai_5'] +
                                        $nilai_p['nilai_6'] + $nilai_p['nilai_7'] + $nilai_p['nilai_8'] + $nilai_p['nilai_9'] + $nilai_p['nilai_10'] + $nilai_p['nilai_11']
                                        + $nilai_p['nilai_12'] + $nilai_p['nilai_13'] + $nilai_p['nilai_14'] + $nilai_p['nilai_15'];
                                    $hasil_akhir = (($hasil_p / 15) + ($hasil_p / 15) + $nilai_p['pts'] + $nilai_p['pas']) / 4;
                                elseif ($getID_KELAS == 'K42' or $getID_KELAS == 'K52' or $getID_KELAS == 'K62') :
                                    $nilai_p = $nilai->where(['nisn' => $getNISN, 'id_kelas' => $getID_KELAS, 'id_mapel' => 'K2', 'id_tahun_ajaran' => $getID_TAHUN_AJARAN])->first();
                                    $hasil_p = $nilai_p['nilai_1'] + $nilai_p['nilai_2'] + $nilai_p['nilai_3'] + $nilai_p['nilai_4'] + $nilai_p['nilai_5'] +
                                        $nilai_p['nilai_6'] + $nilai_p['nilai_7'] + $nilai_p['nilai_8'] + $nilai_p['nilai_9'] + $nilai_p['nilai_10'] + $nilai_p['nilai_11']
                                        + $nilai_p['nilai_12'];
                                    $hasil_akhir = (($hasil_p / 12) + ($hasil_p / 12) + $nilai_p['pts'] + $nilai_p['pas']) / 4;
                                endif;
                                ?>
                                <td><?= number_format($hasil_akhir, 0) ?></td>
                                <td><?php
                                    if ($hasil_akhir > 90) :
                                        echo "A";
                                    elseif ($hasil_akhir > 80 and $hasil_akhir <= 90) :
                                        echo "B";
                                    elseif ($hasil_akhir > 75  and $hasil_akhir <= 80) :
                                        echo "C";
                                    elseif ($hasil_akhir > 70 and $hasil_akhir <= 75) :
                                        echo "D";
                                    else :
                                        echo "E";
                                    endif;
                                    ?></td>
                                <td><?= $nilai_p['deskripsi'] ?></td>
                            </tr>
                            <tr>
                                <td>4.</td>
                                <td>Matematika</td>
                                <?php
                                if ($getID_KELAS == 'K11' or $getID_KELAS == 'K21' or $getID_KELAS == 'K31' or $getID_KELAS == 'K12' or $getID_KELAS == 'K22' or $getID_KELAS == 'K32') :
                                    $nilai_p = $nilai->where(['nisn' => $getNISN, 'id_kelas' => $getID_KELAS, 'id_mapel' => 'P3', 'id_tahun_ajaran' => $getID_TAHUN_AJARAN])->first();
                                    $hasil_p = $nilai_p['nilai_1'] + $nilai_p['nilai_2'] + $nilai_p['nilai_3'] + $nilai_p['nilai_4'] + $nilai_p['nilai_5'] +
                                        $nilai_p['nilai_6'] + $nilai_p['nilai_7'] + $nilai_p['nilai_8'] + $nilai_p['nilai_9'] + $nilai_p['nilai_10'] + $nilai_p['nilai_11']
                                        + $nilai_p['nilai_12'] + $nilai_p['nilai_13'] + $nilai_p['nilai_14'] + $nilai_p['nilai_15'] + $nilai_p['nilai_16'];
                                    $hasil_akhir = (($hasil_p / 16) + ($hasil_p / 16) + $nilai_p['pts'] + $nilai_p['pas']) / 4;
                                elseif ($getID_KELAS == 'K41' or $getID_KELAS == 'K51' or $getID_KELAS == 'K61') :
                                    $nilai_p = $nilai->where(['nisn' => $getNISN, 'id_kelas' => $getID_KELAS, 'id_mapel' => 'P3', 'id_tahun_ajaran' => $getID_TAHUN_AJARAN])->first();
                                    $hasil_p = $nilai_p['nilai_1'] + $nilai_p['nilai_2'] + $nilai_p['nilai_3'] + $nilai_p['nilai_4'] + $nilai_p['nilai_5'] +
                                        $nilai_p['nilai_6'] + $nilai_p['nilai_7'] + $nilai_p['nilai_8'] + $nilai_p['nilai_9'] + $nilai_p['nilai_10'] + $nilai_p['nilai_11']
                                        + $nilai_p['nilai_12'] + $nilai_p['nilai_13'] + $nilai_p['nilai_14'] + $nilai_p['nilai_15'];
                                    $hasil_akhir = (($hasil_p / 15) + ($hasil_p / 15) + $nilai_p['pts'] + $nilai_p['pas']) / 4;
                                elseif ($getID_KELAS == 'K42' or $getID_KELAS == 'K52' or $getID_KELAS == 'K62') :
                                    $nilai_p = $nilai->where(['nisn' => $getNISN, 'id_kelas' => $getID_KELAS, 'id_mapel' => 'P3', 'id_tahun_ajaran' => $getID_TAHUN_AJARAN])->first();
                                    $hasil_p = $nilai_p['nilai_1'] + $nilai_p['nilai_2'] + $nilai_p['nilai_3'] + $nilai_p['nilai_4'] + $nilai_p['nilai_5'] +
                                        $nilai_p['nilai_6'] + $nilai_p['nilai_7'] + $nilai_p['nilai_8'] + $nilai_p['nilai_9'] + $nilai_p['nilai_10'] + $nilai_p['nilai_11']
                                        + $nilai_p['nilai_12'];
                                    $hasil_akhir = (($hasil_p / 12) + ($hasil_p / 12) + $nilai_p['pts'] + $nilai_p['pas']) / 4;
                                endif;
                                ?>
                                <td><?= number_format($hasil_akhir, 0) ?></td>
                                <td><?php
                                    if ($hasil_akhir > 90) :
                                        echo "A";
                                    elseif ($hasil_akhir > 80 and $hasil_akhir <= 90) :
                                        echo "B";
                                    elseif ($hasil_akhir > 75  and $hasil_akhir <= 80) :
                                        echo "C";
                                    elseif ($hasil_akhir > 70 and $hasil_akhir <= 75) :
                                        echo "D";
                                    else :
                                        echo "E";
                                    endif;
                                    ?></td>
                                <td><?= $nilai_p['deskripsi'] ?></td>
                                <?php
                                if ($getID_KELAS == 'K11' or $getID_KELAS == 'K21' or $getID_KELAS == 'K31' or $getID_KELAS == 'K12' or $getID_KELAS == 'K22' or $getID_KELAS == 'K32') :
                                    $nilai_p = $nilai->where(['nisn' => $getNISN, 'id_kelas' => $getID_KELAS, 'id_mapel' => 'K3', 'id_tahun_ajaran' => $getID_TAHUN_AJARAN])->first();
                                    $hasil_p = $nilai_p['nilai_1'] + $nilai_p['nilai_2'] + $nilai_p['nilai_3'] + $nilai_p['nilai_4'] + $nilai_p['nilai_5'] +
                                        $nilai_p['nilai_6'] + $nilai_p['nilai_7'] + $nilai_p['nilai_8'] + $nilai_p['nilai_9'] + $nilai_p['nilai_10'] + $nilai_p['nilai_11']
                                        + $nilai_p['nilai_12'] + $nilai_p['nilai_13'] + $nilai_p['nilai_14'] + $nilai_p['nilai_15'] + $nilai_p['nilai_16'];
                                    $hasil_akhir = (($hasil_p / 16) + ($hasil_p / 16) + $nilai_p['pts'] + $nilai_p['pas']) / 4;
                                elseif ($getID_KELAS == 'K41' or $getID_KELAS == 'K51' or $getID_KELAS == 'K61') :
                                    $nilai_p = $nilai->where(['nisn' => $getNISN, 'id_kelas' => $getID_KELAS, 'id_mapel' => 'K3', 'id_tahun_ajaran' => $getID_TAHUN_AJARAN])->first();
                                    $hasil_p = $nilai_p['nilai_1'] + $nilai_p['nilai_2'] + $nilai_p['nilai_3'] + $nilai_p['nilai_4'] + $nilai_p['nilai_5'] +
                                        $nilai_p['nilai_6'] + $nilai_p['nilai_7'] + $nilai_p['nilai_8'] + $nilai_p['nilai_9'] + $nilai_p['nilai_10'] + $nilai_p['nilai_11']
                                        + $nilai_p['nilai_12'] + $nilai_p['nilai_13'] + $nilai_p['nilai_14'] + $nilai_p['nilai_15'];
                                    $hasil_akhir = (($hasil_p / 15) + ($hasil_p / 15) + $nilai_p['pts'] + $nilai_p['pas']) / 4;
                                elseif ($getID_KELAS == 'K42' or $getID_KELAS == 'K52' or $getID_KELAS == 'K62') :
                                    $nilai_p = $nilai->where(['nisn' => $getNISN, 'id_kelas' => $getID_KELAS, 'id_mapel' => 'K3', 'id_tahun_ajaran' => $getID_TAHUN_AJARAN])->first();
                                    $hasil_p = $nilai_p['nilai_1'] + $nilai_p['nilai_2'] + $nilai_p['nilai_3'] + $nilai_p['nilai_4'] + $nilai_p['nilai_5'] +
                                        $nilai_p['nilai_6'] + $nilai_p['nilai_7'] + $nilai_p['nilai_8'] + $nilai_p['nilai_9'] + $nilai_p['nilai_10'] + $nilai_p['nilai_11']
                                        + $nilai_p['nilai_12'];
                                    $hasil_akhir = (($hasil_p / 12) + ($hasil_p / 12) + $nilai_p['pts'] + $nilai_p['pas']) / 4;
                                endif;
                                ?>
                                <td><?= number_format($hasil_akhir, 0) ?></td>
                                <td><?php
                                    if ($hasil_akhir > 90) :
                                        echo "A";
                                    elseif ($hasil_akhir > 80 and $hasil_akhir <= 90) :
                                        echo "B";
                                    elseif ($hasil_akhir > 75  and $hasil_akhir <= 80) :
                                        echo "C";
                                    elseif ($hasil_akhir > 70 and $hasil_akhir <= 75) :
                                        echo "D";
                                    else :
                                        echo "E";
                                    endif;
                                    ?></td>
                                <td><?= $nilai_p['deskripsi'] ?></td>
                            </tr>
                            <tr>
                                <td>5.</td>
                                <td>Seni Budaya Dan Prakarya</td>
                                <?php
                                if ($getID_KELAS == 'K11' or $getID_KELAS == 'K21' or $getID_KELAS == 'K31' or $getID_KELAS == 'K12' or $getID_KELAS == 'K22' or $getID_KELAS == 'K32') :
                                    $nilai_p = $nilai->where(['nisn' => $getNISN, 'id_kelas' => $getID_KELAS, 'id_mapel' => 'P4', 'id_tahun_ajaran' => $getID_TAHUN_AJARAN])->first();
                                    $hasil_p = $nilai_p['nilai_1'] + $nilai_p['nilai_2'] + $nilai_p['nilai_3'] + $nilai_p['nilai_4'] + $nilai_p['nilai_5'] +
                                        $nilai_p['nilai_6'] + $nilai_p['nilai_7'] + $nilai_p['nilai_8'] + $nilai_p['nilai_9'] + $nilai_p['nilai_10'] + $nilai_p['nilai_11']
                                        + $nilai_p['nilai_12'] + $nilai_p['nilai_13'] + $nilai_p['nilai_14'] + $nilai_p['nilai_15'] + $nilai_p['nilai_16'];
                                    $hasil_akhir = (($hasil_p / 16) + ($hasil_p / 16) + $nilai_p['pts'] + $nilai_p['pas']) / 4;
                                elseif ($getID_KELAS == 'K41' or $getID_KELAS == 'K51' or $getID_KELAS == 'K61') :
                                    $nilai_p = $nilai->where(['nisn' => $getNISN, 'id_kelas' => $getID_KELAS, 'id_mapel' => 'P4', 'id_tahun_ajaran' => $getID_TAHUN_AJARAN])->first();
                                    $hasil_p = $nilai_p['nilai_1'] + $nilai_p['nilai_2'] + $nilai_p['nilai_3'] + $nilai_p['nilai_4'] + $nilai_p['nilai_5'] +
                                        $nilai_p['nilai_6'] + $nilai_p['nilai_7'] + $nilai_p['nilai_8'] + $nilai_p['nilai_9'] + $nilai_p['nilai_10'] + $nilai_p['nilai_11']
                                        + $nilai_p['nilai_12'] + $nilai_p['nilai_13'] + $nilai_p['nilai_14'] + $nilai_p['nilai_15'];
                                    $hasil_akhir = (($hasil_p / 15) + ($hasil_p / 15) + $nilai_p['pts'] + $nilai_p['pas']) / 4;
                                elseif ($getID_KELAS == 'K42' or $getID_KELAS == 'K52' or $getID_KELAS == 'K62') :
                                    $nilai_p = $nilai->where(['nisn' => $getNISN, 'id_kelas' => $getID_KELAS, 'id_mapel' => 'P4', 'id_tahun_ajaran' => $getID_TAHUN_AJARAN])->first();
                                    $hasil_p = $nilai_p['nilai_1'] + $nilai_p['nilai_2'] + $nilai_p['nilai_3'] + $nilai_p['nilai_4'] + $nilai_p['nilai_5'] +
                                        $nilai_p['nilai_6'] + $nilai_p['nilai_7'] + $nilai_p['nilai_8'] + $nilai_p['nilai_9'] + $nilai_p['nilai_10'] + $nilai_p['nilai_11']
                                        + $nilai_p['nilai_12'];
                                    $hasil_akhir = (($hasil_p / 12) + ($hasil_p / 12) + $nilai_p['pts'] + $nilai_p['pas']) / 4;
                                endif;
                                ?>
                                <td><?= number_format($hasil_akhir, 0) ?></td>
                                <td><?php
                                    if ($hasil_akhir > 90) :
                                        echo "A";
                                    elseif ($hasil_akhir > 80 and $hasil_akhir <= 90) :
                                        echo "B";
                                    elseif ($hasil_akhir > 75  and $hasil_akhir <= 80) :
                                        echo "C";
                                    elseif ($hasil_akhir > 70 and $hasil_akhir <= 75) :
                                        echo "D";
                                    else :
                                        echo "E";
                                    endif;
                                    ?></td>
                                <td><?= $nilai_p['deskripsi'] ?></td>
                                <?php
                                if ($getID_KELAS == 'K11' or $getID_KELAS == 'K21' or $getID_KELAS == 'K31' or $getID_KELAS == 'K12' or $getID_KELAS == 'K22' or $getID_KELAS == 'K32') :
                                    $nilai_p = $nilai->where(['nisn' => $getNISN, 'id_kelas' => $getID_KELAS, 'id_mapel' => 'K4', 'id_tahun_ajaran' => $getID_TAHUN_AJARAN])->first();
                                    $hasil_p = $nilai_p['nilai_1'] + $nilai_p['nilai_2'] + $nilai_p['nilai_3'] + $nilai_p['nilai_4'] + $nilai_p['nilai_5'] +
                                        $nilai_p['nilai_6'] + $nilai_p['nilai_7'] + $nilai_p['nilai_8'] + $nilai_p['nilai_9'] + $nilai_p['nilai_10'] + $nilai_p['nilai_11']
                                        + $nilai_p['nilai_12'] + $nilai_p['nilai_13'] + $nilai_p['nilai_14'] + $nilai_p['nilai_15'] + $nilai_p['nilai_16'];
                                    $hasil_akhir = (($hasil_p / 16) + ($hasil_p / 16) + $nilai_p['pts'] + $nilai_p['pas']) / 4;
                                elseif ($getID_KELAS == 'K41' or $getID_KELAS == 'K51' or $getID_KELAS == 'K61') :
                                    $nilai_p = $nilai->where(['nisn' => $getNISN, 'id_kelas' => $getID_KELAS, 'id_mapel' => 'K4', 'id_tahun_ajaran' => $getID_TAHUN_AJARAN])->first();
                                    $hasil_p = $nilai_p['nilai_1'] + $nilai_p['nilai_2'] + $nilai_p['nilai_3'] + $nilai_p['nilai_4'] + $nilai_p['nilai_5'] +
                                        $nilai_p['nilai_6'] + $nilai_p['nilai_7'] + $nilai_p['nilai_8'] + $nilai_p['nilai_9'] + $nilai_p['nilai_10'] + $nilai_p['nilai_11']
                                        + $nilai_p['nilai_12'] + $nilai_p['nilai_13'] + $nilai_p['nilai_14'] + $nilai_p['nilai_15'];
                                    $hasil_akhir = (($hasil_p / 15) + ($hasil_p / 15) + $nilai_p['pts'] + $nilai_p['pas']) / 4;
                                elseif ($getID_KELAS == 'K42' or $getID_KELAS == 'K52' or $getID_KELAS == 'K62') :
                                    $nilai_p = $nilai->where(['nisn' => $getNISN, 'id_kelas' => $getID_KELAS, 'id_mapel' => 'K4', 'id_tahun_ajaran' => $getID_TAHUN_AJARAN])->first();
                                    $hasil_p = $nilai_p['nilai_1'] + $nilai_p['nilai_2'] + $nilai_p['nilai_3'] + $nilai_p['nilai_4'] + $nilai_p['nilai_5'] +
                                        $nilai_p['nilai_6'] + $nilai_p['nilai_7'] + $nilai_p['nilai_8'] + $nilai_p['nilai_9'] + $nilai_p['nilai_10'] + $nilai_p['nilai_11']
                                        + $nilai_p['nilai_12'];
                                    $hasil_akhir = (($hasil_p / 12) + ($hasil_p / 12) + $nilai_p['pts'] + $nilai_p['pas']) / 4;
                                endif;
                                ?>
                                <td><?= number_format($hasil_akhir, 0) ?></td>
                                <td><?php
                                    if ($hasil_akhir > 90) :
                                        echo "A";
                                    elseif ($hasil_akhir > 80 and $hasil_akhir <= 90) :
                                        echo "B";
                                    elseif ($hasil_akhir > 75  and $hasil_akhir <= 80) :
                                        echo "C";
                                    elseif ($hasil_akhir > 70 and $hasil_akhir <= 75) :
                                        echo "D";
                                    else :
                                        echo "E";
                                    endif;
                                    ?></td>
                                <td><?= $nilai_p['deskripsi'] ?></td>
                            </tr>
                            <tr>
                                <td>6.</td>
                                <td>Pendidikan Jasmani, Olah Raga, dan Kesehatan </td>
                                <?php
                                if ($getID_KELAS == 'K11' or $getID_KELAS == 'K21' or $getID_KELAS == 'K31' or $getID_KELAS == 'K12' or $getID_KELAS == 'K22' or $getID_KELAS == 'K32') :
                                    $nilai_p = $nilai->where(['nisn' => $getNISN, 'id_kelas' => $getID_KELAS, 'id_mapel' => 'P5', 'id_tahun_ajaran' => $getID_TAHUN_AJARAN])->first();
                                    $hasil_p = $nilai_p['nilai_1'] + $nilai_p['nilai_2'] + $nilai_p['nilai_3'] + $nilai_p['nilai_4'] + $nilai_p['nilai_5'] +
                                        $nilai_p['nilai_6'] + $nilai_p['nilai_7'] + $nilai_p['nilai_8'] + $nilai_p['nilai_9'] + $nilai_p['nilai_10'] + $nilai_p['nilai_11']
                                        + $nilai_p['nilai_12'] + $nilai_p['nilai_13'] + $nilai_p['nilai_14'] + $nilai_p['nilai_15'] + $nilai_p['nilai_16'];
                                    $hasil_akhir = (($hasil_p / 16) + ($hasil_p / 16) + $nilai_p['pts'] + $nilai_p['pas']) / 4;
                                elseif ($getID_KELAS == 'K41' or $getID_KELAS == 'K51' or $getID_KELAS == 'K61') :
                                    $nilai_p = $nilai->where(['nisn' => $getNISN, 'id_kelas' => $getID_KELAS, 'id_mapel' => 'P5', 'id_tahun_ajaran' => $getID_TAHUN_AJARAN])->first();
                                    $hasil_p = $nilai_p['nilai_1'] + $nilai_p['nilai_2'] + $nilai_p['nilai_3'] + $nilai_p['nilai_4'] + $nilai_p['nilai_5'] +
                                        $nilai_p['nilai_6'] + $nilai_p['nilai_7'] + $nilai_p['nilai_8'] + $nilai_p['nilai_9'] + $nilai_p['nilai_10'] + $nilai_p['nilai_11']
                                        + $nilai_p['nilai_12'] + $nilai_p['nilai_13'] + $nilai_p['nilai_14'] + $nilai_p['nilai_15'];
                                    $hasil_akhir = (($hasil_p / 15) + ($hasil_p / 15) + $nilai_p['pts'] + $nilai_p['pas']) / 4;
                                elseif ($getID_KELAS == 'K42' or $getID_KELAS == 'K52' or $getID_KELAS == 'K62') :
                                    $nilai_p = $nilai->where(['nisn' => $getNISN, 'id_kelas' => $getID_KELAS, 'id_mapel' => 'P5', 'id_tahun_ajaran' => $getID_TAHUN_AJARAN])->first();
                                    $hasil_p = $nilai_p['nilai_1'] + $nilai_p['nilai_2'] + $nilai_p['nilai_3'] + $nilai_p['nilai_4'] + $nilai_p['nilai_5'] +
                                        $nilai_p['nilai_6'] + $nilai_p['nilai_7'] + $nilai_p['nilai_8'] + $nilai_p['nilai_9'] + $nilai_p['nilai_10'] + $nilai_p['nilai_11']
                                        + $nilai_p['nilai_12'];
                                    $hasil_akhir = (($hasil_p / 12) + ($hasil_p / 12) + $nilai_p['pts'] + $nilai_p['pas']) / 4;
                                endif;
                                ?>
                                <td><?= number_format($hasil_akhir, 0) ?></td>
                                <td><?php
                                    if ($hasil_akhir > 90) :
                                        echo "A";
                                    elseif ($hasil_akhir > 80 and $hasil_akhir <= 90) :
                                        echo "B";
                                    elseif ($hasil_akhir > 75  and $hasil_akhir <= 80) :
                                        echo "C";
                                    elseif ($hasil_akhir > 70 and $hasil_akhir <= 75) :
                                        echo "D";
                                    else :
                                        echo "E";
                                    endif;
                                    ?></td>
                                <td><?= $nilai_p['deskripsi'] ?></td>
                                <?php
                                if ($getID_KELAS == 'K11' or $getID_KELAS == 'K21' or $getID_KELAS == 'K31' or $getID_KELAS == 'K12' or $getID_KELAS == 'K22' or $getID_KELAS == 'K32') :
                                    $nilai_p = $nilai->where(['nisn' => $getNISN, 'id_kelas' => $getID_KELAS, 'id_mapel' => 'K5', 'id_tahun_ajaran' => $getID_TAHUN_AJARAN])->first();
                                    $hasil_p = $nilai_p['nilai_1'] + $nilai_p['nilai_2'] + $nilai_p['nilai_3'] + $nilai_p['nilai_4'] + $nilai_p['nilai_5'] +
                                        $nilai_p['nilai_6'] + $nilai_p['nilai_7'] + $nilai_p['nilai_8'] + $nilai_p['nilai_9'] + $nilai_p['nilai_10'] + $nilai_p['nilai_11']
                                        + $nilai_p['nilai_12'] + $nilai_p['nilai_13'] + $nilai_p['nilai_14'] + $nilai_p['nilai_15'] + $nilai_p['nilai_16'];
                                    $hasil_akhir = (($hasil_p / 16) + ($hasil_p / 16) + $nilai_p['pts'] + $nilai_p['pas']) / 4;
                                elseif ($getID_KELAS == 'K41' or $getID_KELAS == 'K51' or $getID_KELAS == 'K61') :
                                    $nilai_p = $nilai->where(['nisn' => $getNISN, 'id_kelas' => $getID_KELAS, 'id_mapel' => 'K5', 'id_tahun_ajaran' => $getID_TAHUN_AJARAN])->first();
                                    $hasil_p = $nilai_p['nilai_1'] + $nilai_p['nilai_2'] + $nilai_p['nilai_3'] + $nilai_p['nilai_4'] + $nilai_p['nilai_5'] +
                                        $nilai_p['nilai_6'] + $nilai_p['nilai_7'] + $nilai_p['nilai_8'] + $nilai_p['nilai_9'] + $nilai_p['nilai_10'] + $nilai_p['nilai_11']
                                        + $nilai_p['nilai_12'] + $nilai_p['nilai_13'] + $nilai_p['nilai_14'] + $nilai_p['nilai_15'];
                                    $hasil_akhir = (($hasil_p / 15) + ($hasil_p / 15) + $nilai_p['pts'] + $nilai_p['pas']) / 4;
                                elseif ($getID_KELAS == 'K42' or $getID_KELAS == 'K52' or $getID_KELAS == 'K62') :
                                    $nilai_p = $nilai->where(['nisn' => $getNISN, 'id_kelas' => $getID_KELAS, 'id_mapel' => 'K5', 'id_tahun_ajaran' => $getID_TAHUN_AJARAN])->first();
                                    $hasil_p = $nilai_p['nilai_1'] + $nilai_p['nilai_2'] + $nilai_p['nilai_3'] + $nilai_p['nilai_4'] + $nilai_p['nilai_5'] +
                                        $nilai_p['nilai_6'] + $nilai_p['nilai_7'] + $nilai_p['nilai_8'] + $nilai_p['nilai_9'] + $nilai_p['nilai_10'] + $nilai_p['nilai_11']
                                        + $nilai_p['nilai_12'];
                                    $hasil_akhir = (($hasil_p / 12) + ($hasil_p / 12) + $nilai_p['pts'] + $nilai_p['pas']) / 4;
                                endif;
                                ?>
                                <td><?= number_format($hasil_akhir, 0) ?></td>
                                <td><?php
                                    if ($hasil_akhir > 90) :
                                        echo "A";
                                    elseif ($hasil_akhir > 80 and $hasil_akhir <= 90) :
                                        echo "B";
                                    elseif ($hasil_akhir > 75  and $hasil_akhir <= 80) :
                                        echo "C";
                                    elseif ($hasil_akhir > 70 and $hasil_akhir <= 75) :
                                        echo "D";
                                    else :
                                        echo "E";
                                    endif;
                                    ?></td>
                                <td><?= $nilai_p['deskripsi'] ?></td>
                            </tr>
                            <tr>
                                <td>7.</td>
                                <td class="text-left" colspan="7">Muatan Lokal</td>
                            </tr>
                            <tr>
                                <td>a.</td>
                                <td>Seni Budaya Dan Prakarya</td>
                                <?php
                                if ($getID_KELAS == 'K11' or $getID_KELAS == 'K21' or $getID_KELAS == 'K31' or $getID_KELAS == 'K12' or $getID_KELAS == 'K22' or $getID_KELAS == 'K32') :
                                    $nilai_p = $nilai->where(['nisn' => $getNISN, 'id_kelas' => $getID_KELAS, 'id_mapel' => 'P6', 'id_tahun_ajaran' => $getID_TAHUN_AJARAN])->first();
                                    $hasil_p = $nilai_p['nilai_1'] + $nilai_p['nilai_2'] + $nilai_p['nilai_3'] + $nilai_p['nilai_4'] + $nilai_p['nilai_5'] +
                                        $nilai_p['nilai_6'] + $nilai_p['nilai_7'] + $nilai_p['nilai_8'] + $nilai_p['nilai_9'] + $nilai_p['nilai_10'] + $nilai_p['nilai_11']
                                        + $nilai_p['nilai_12'] + $nilai_p['nilai_13'] + $nilai_p['nilai_14'] + $nilai_p['nilai_15'] + $nilai_p['nilai_16'];
                                    $hasil_akhir = (($hasil_p / 16) + ($hasil_p / 16) + $nilai_p['pts'] + $nilai_p['pas']) / 4;
                                elseif ($getID_KELAS == 'K41' or $getID_KELAS == 'K51' or $getID_KELAS == 'K61') :
                                    $nilai_p = $nilai->where(['nisn' => $getNISN, 'id_kelas' => $getID_KELAS, 'id_mapel' => 'P6', 'id_tahun_ajaran' => $getID_TAHUN_AJARAN])->first();
                                    $hasil_p = $nilai_p['nilai_1'] + $nilai_p['nilai_2'] + $nilai_p['nilai_3'] + $nilai_p['nilai_4'] + $nilai_p['nilai_5'] +
                                        $nilai_p['nilai_6'] + $nilai_p['nilai_7'] + $nilai_p['nilai_8'] + $nilai_p['nilai_9'] + $nilai_p['nilai_10'] + $nilai_p['nilai_11']
                                        + $nilai_p['nilai_12'] + $nilai_p['nilai_13'] + $nilai_p['nilai_14'] + $nilai_p['nilai_15'];
                                    $hasil_akhir = (($hasil_p / 15) + ($hasil_p / 15) + $nilai_p['pts'] + $nilai_p['pas']) / 4;
                                elseif ($getID_KELAS == 'K42' or $getID_KELAS == 'K52' or $getID_KELAS == 'K62') :
                                    $nilai_p = $nilai->where(['nisn' => $getNISN, 'id_kelas' => $getID_KELAS, 'id_mapel' => 'P6', 'id_tahun_ajaran' => $getID_TAHUN_AJARAN])->first();
                                    $hasil_p = $nilai_p['nilai_1'] + $nilai_p['nilai_2'] + $nilai_p['nilai_3'] + $nilai_p['nilai_4'] + $nilai_p['nilai_5'] +
                                        $nilai_p['nilai_6'] + $nilai_p['nilai_7'] + $nilai_p['nilai_8'] + $nilai_p['nilai_9'] + $nilai_p['nilai_10'] + $nilai_p['nilai_11']
                                        + $nilai_p['nilai_12'];
                                    $hasil_akhir = (($hasil_p / 12) + ($hasil_p / 12) + $nilai_p['pts'] + $nilai_p['pas']) / 4;
                                endif;
                                ?>
                                <td><?= number_format($hasil_akhir, 0) ?></td>
                                <td><?php
                                    if ($hasil_akhir > 90) :
                                        echo "A";
                                    elseif ($hasil_akhir > 80 and $hasil_akhir <= 90) :
                                        echo "B";
                                    elseif ($hasil_akhir > 75  and $hasil_akhir <= 80) :
                                        echo "C";
                                    elseif ($hasil_akhir > 70 and $hasil_akhir <= 75) :
                                        echo "D";
                                    else :
                                        echo "E";
                                    endif;
                                    ?></td>
                                <td><?= $nilai_p['deskripsi'] ?></td>
                                <?php
                                if ($getID_KELAS == 'K11' or $getID_KELAS == 'K21' or $getID_KELAS == 'K31' or $getID_KELAS == 'K12' or $getID_KELAS == 'K22' or $getID_KELAS == 'K32') :
                                    $nilai_p = $nilai->where(['nisn' => $getNISN, 'id_kelas' => $getID_KELAS, 'id_mapel' => 'K6', 'id_tahun_ajaran' => $getID_TAHUN_AJARAN])->first();
                                    $hasil_p = $nilai_p['nilai_1'] + $nilai_p['nilai_2'] + $nilai_p['nilai_3'] + $nilai_p['nilai_4'] + $nilai_p['nilai_5'] +
                                        $nilai_p['nilai_6'] + $nilai_p['nilai_7'] + $nilai_p['nilai_8'] + $nilai_p['nilai_9'] + $nilai_p['nilai_10'] + $nilai_p['nilai_11']
                                        + $nilai_p['nilai_12'] + $nilai_p['nilai_13'] + $nilai_p['nilai_14'] + $nilai_p['nilai_15'] + $nilai_p['nilai_16'];
                                    $hasil_akhir = (($hasil_p / 16) + ($hasil_p / 16) + $nilai_p['pts'] + $nilai_p['pas']) / 4;
                                elseif ($getID_KELAS == 'K41' or $getID_KELAS == 'K51' or $getID_KELAS == 'K61') :
                                    $nilai_p = $nilai->where(['nisn' => $getNISN, 'id_kelas' => $getID_KELAS, 'id_mapel' => 'K6', 'id_tahun_ajaran' => $getID_TAHUN_AJARAN])->first();
                                    $hasil_p = $nilai_p['nilai_1'] + $nilai_p['nilai_2'] + $nilai_p['nilai_3'] + $nilai_p['nilai_4'] + $nilai_p['nilai_5'] +
                                        $nilai_p['nilai_6'] + $nilai_p['nilai_7'] + $nilai_p['nilai_8'] + $nilai_p['nilai_9'] + $nilai_p['nilai_10'] + $nilai_p['nilai_11']
                                        + $nilai_p['nilai_12'] + $nilai_p['nilai_13'] + $nilai_p['nilai_14'] + $nilai_p['nilai_15'];
                                    $hasil_akhir = (($hasil_p / 15) + ($hasil_p / 15) + $nilai_p['pts'] + $nilai_p['pas']) / 4;
                                elseif ($getID_KELAS == 'K42' or $getID_KELAS == 'K52' or $getID_KELAS == 'K62') :
                                    $nilai_p = $nilai->where(['nisn' => $getNISN, 'id_kelas' => $getID_KELAS, 'id_mapel' => 'K6', 'id_tahun_ajaran' => $getID_TAHUN_AJARAN])->first();
                                    $hasil_p = $nilai_p['nilai_1'] + $nilai_p['nilai_2'] + $nilai_p['nilai_3'] + $nilai_p['nilai_4'] + $nilai_p['nilai_5'] +
                                        $nilai_p['nilai_6'] + $nilai_p['nilai_7'] + $nilai_p['nilai_8'] + $nilai_p['nilai_9'] + $nilai_p['nilai_10'] + $nilai_p['nilai_11']
                                        + $nilai_p['nilai_12'];
                                    $hasil_akhir = (($hasil_p / 12) + ($hasil_p / 12) + $nilai_p['pts'] + $nilai_p['pas']) / 4;
                                endif;
                                ?>
                                <td><?= number_format($hasil_akhir, 0) ?></td>
                                <td><?php
                                    if ($hasil_akhir > 90) :
                                        echo "A";
                                    elseif ($hasil_akhir > 80 and $hasil_akhir <= 90) :
                                        echo "B";
                                    elseif ($hasil_akhir > 75  and $hasil_akhir <= 80) :
                                        echo "C";
                                    elseif ($hasil_akhir > 70 and $hasil_akhir <= 75) :
                                        echo "D";
                                    else :
                                        echo "E";
                                    endif;
                                    ?></td>
                                <td><?= $nilai_p['deskripsi'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h6 class="font-weight-bold mt-4">C. Ekstrakulikuler</h6>
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th class="w-25">Kegiatan Ekstrakulikuler</th>
                                <th class="w-75">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php $no = 1;
                            foreach ($nilai_eskul->join('eskul', 'nilai_eskul.id_eskul=eskul.id_eskul', 'inner')->where(['nisn' => $getNISN, 'id_kelas' => $getID_KELAS, 'id_tahun_ajaran' => $getID_TAHUN_AJARAN])->find() as $data) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data['nama_eskul'] ?></td>
                                    <td><?= $data['deskripsi'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php

                $getAbsensi = $absensi->where(['nisn' => $getNISN, 'id_kelas' => $getID_KELAS, 'id_tahun_ajaran' => $getID_TAHUN_AJARAN])->first();
                ?>
                <h6 class="font-weight-bold mt-4">D. Ketidakhadiran</h6>
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th class="w-25">Aspek Ketidakhadiran</th>
                                <th class="w-75">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <td>1.</td>
                                <td>Sakit</td>
                                <td><?= $getAbsensi['sakit'] ?> Hari</td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>Izin</td>
                                <td><?= $getAbsensi['izin'] ?> Hari</td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>Tanpa Keterangan</td>
                                <td><?= $getAbsensi['tanpa_keterangan'] ?> Hari</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div style="page-break-after: always;" class="table-responsive mt-4">
                    <table width="100%" cellspacing="0">
                        <?php
                        $kepala_sekolah = $guru->where('jenis_guru', 'Kepala Sekolah')->first();
                        $kelas_tampil = $kelas->where('id_kelas', $nilai_p['id_kelas'])->first();
                        $sekolah = $guru->where('nip', $kelas_tampil['nip'])->first();
                        ?>
                        <thead class="text-center">
                            <tr>
                                <td class="w-25">Mengetahui<br>Orang Tua/Wali <br><br><br><br>
                                    <hr class="w-50">

                                </td>
                                <td class="text-center"><br><br><br><br>Mengetahui,<br>Kepala Sekolah<br><br><br><br>
                                    <hr class="w-25">
                                    <?= $kepala_sekolah['nama']; ?>
                                </td>
                                <td class="w-25">Tasikmalaya, <?= date("d-m-Y") ?><br>Guru Kelas,<br><br><br><br>
                                    <hr class="w-50">
                                    <?= $sekolah['nama'] ?>
                                </td>
                            </tr>
                        </thead>
                        <tbody class="text-center">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script>
            window.print();
        </script>
</body>

</html>