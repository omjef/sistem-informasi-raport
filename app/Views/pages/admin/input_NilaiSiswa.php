<?= $this->extend('layout/template_table'); ?>

<?= $this->section('content'); ?>
<div class="card mb-3">
    <div class="card-header">
        <h6 class="m-0 text-primary font-weight-bold">Nilai Siswa</h6>
    </div>
    <div class="card-body">
        <?php if (session()->getFlashdata('berhasil')) : ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <?= session()->getFlashData('berhasil') ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php elseif (session()->getFlashdata('gagal')) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= session()->getFlashData('gagal') ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <div class="card border-left-primary shadow h-100 py-2 pl-2 mb-2">
            <h1 class="h4">Keterangan :</h1>
            Halaman digunakan untuk menginput nilai siswa!
        </div>
        <form action="<?= base_url('/admin/input_nilai_siswa') ?>" method="post">
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Mata Pelajaran</label>
                        <select class="form-control" name="mapel" id="mapel">
                            <?php foreach ($Mapel->find() as $data) : ?>
                                <option <?php if (isset($_POST['cek_data'])) {
                                            echo ($data['id_mapel'] == $_POST['mapel']) ? 'selected' : '';
                                        } ?> value="<?= $data['id_mapel'] ?>"><?= $data['nama_mapel'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kelas</label>
                        <select class="form-control" name="kelas" id="kelas">
                            <?php foreach ($Kelas->where('semester', 'Ganjil')->find() as $data) : ?>
                                <option <?php if (isset($_POST['cek_data'])) {
                                            echo ($data['kelas'] == $_POST['kelas']) ? 'selected' : '';
                                        } ?> value="<?= $data['kelas'] ?>"><?= $data['kelas'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Aspek</label>
                        <select class="form-control" name="aspek" id="aspek">
                            <option value="Pengetahuan">Pengetahuan</option>
                            <option value="Keterampilan">Keterampilan</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Semester</label>
                        <select class="form-control" name="semester" id="semester">
                            <option <?php if (isset($_POST['cek_data'])) {
                                        echo ('Ganjil' == $_POST['semester']) ? 'selected' : '';
                                    } ?> value="Ganjil">Ganjil</option>
                            <option <?php if (isset($_POST['cek_data'])) {
                                        echo ('Genap' == $_POST['semester']) ? 'selected' : '';
                                    } ?> value="Genap">Genap</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tahun Ajaran</label>
                        <select class="form-control" name="tahun_ajaran" id="tahun_ajaran">
                            <?php foreach ($TahunAjaran->where('id_kelas', 'K11')->find() as $data) : ?>
                                <option <?php if (isset($_POST['cek_data'])) {
                                            echo ($data['tahun_ajaran'] == $_POST['tahun_ajaran']) ? 'selected' : '';
                                        } ?> value="<?= $data['tahun_ajaran'] ?>"><?= $data['tahun_ajaran'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-primary" name="cek_data" value="Cek Data">
        </form>
    </div>
</div>

<?php if (isset($_POST['cek_data'])) : ?>
    <div class="card mb-2">
        <div class="card-header">
            <h6 class="text-primary text-center font-weight-bold m-0">Tampil Data Siswa</h6>
        </div>
        <div class="card-body">
            <!-- Tampung Query -->
            <?php
            $mapel = $_POST['mapel'];
            $kelas = $_POST['kelas'];
            $semester = $_POST['semester'];
            $tahun_ajaran = $_POST['tahun_ajaran'];

            //ID MAPEL
            $namaIDMAPEL = $Mapel->where('id_mapel', $mapel)->first();
            $tempIDMAPEL = $Mapel->where('nama_mapel', $namaIDMAPEL['nama_mapel'])->first();
            //KELAS
            if ($kelas == 1) :
                $tempKELAS = 'Satu';
            elseif ($kelas == 2) :
                $tempKELAS = 'Dua';
            elseif ($kelas == 3) :
                $tempKELAS = 'Tiga';
            elseif ($kelas == 4) :
                $tempKELAS = 'Empat';
            elseif ($kelas == 5) :
                $tempKELAS = 'Lima';
            elseif ($kelas == 6) :
                $tempKELAS = 'Enam';
            endif;

            //NAMA WALI KELAS
            $namaWALIKELAS = $Kelas->join('guru', 'kelas.nip=guru.nip', 'inner')->where(['kelas.kelas' => $kelas, 'kelas.semester' => $semester])->first();

            //ID KELAS
            $IDKELAS = $Kelas->where(['kelas' => $kelas, 'semester' => $semester])->first();

            //ID TAHUN AJARAN
            $IDTAHUNAJARAN = $TahunAjaran->where(['id_kelas' => $IDKELAS['id_kelas'], 'tahun_ajaran' => $tahun_ajaran])->first()
            ?>
            <!-- Akhir Tampung Query -->
            <table class="table table-hover table-borderless mb-2" width="100%" cellspacing="0">
                <tr>
                    <td style="width: 25%;">Mata Pelajaran</td>
                    <td style="width: 2%;">:</td>
                    <td><?= $tempIDMAPEL['nama_mapel'] ?></td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>:</td>
                    <td><?= $kelas . ' (' . $tempKELAS . ')'; ?></td>
                </tr>
                <tr>
                    <td>Semester</td>
                    <td>:</td>
                    <td><?= $semester ?></td>
                </tr>
                <tr>
                    <td>Tahun Ajaran</td>
                    <td>:</td>
                    <td><?= $tahun_ajaran ?></td>
                </tr>
                <tr>
                    <td>Wali Kelas</td>
                    <td>:</td>
                    <td><?= $namaWALIKELAS['nama'] ?></td>
                </tr>
                <tr>
                    <td>Kkm Satuan Pendidikan</td>
                    <td>:</td>
                    <td>75</td>
                </tr>
            </table>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <?php if ($IDKELAS['id_kelas'] == 'K11' or $IDKELAS['id_kelas'] == 'K21' or $IDKELAS['id_kelas'] == 'K31') : ?>
                        <thead class="text-center">
                            <tr>
                                <th rowspan="2">NAMA</th>
                                <th colspan="4">TEMA 1</th>
                                <th colspan="4">TEMA 2</th>
                                <th colspan="4">TEMA 3</th>
                                <th colspan="4">TEMA 4</th>
                                <th rowspan="2">NILAI RATA-RATA TEMA</th>
                                <th rowspan="2">PTS</th>
                                <th rowspan="2">PTA</th>
                                <th rowspan="2">NILAI RATA-RATA</th>
                                <th rowspan="2">KET. TUNTAS/TIDAK TUNTAS</th>
                                <th rowspan="2">OPTION</th>
                            </tr>
                            <tr>
                                <td>SUB TEMA 1</td>
                                <td>SUB TEMA 2</td>
                                <td>SUB TEMA 3</td>
                                <td>SUB TEMA 4</td>
                                <td>SUB TEMA 1</td>
                                <td>SUB TEMA 2</td>
                                <td>SUB TEMA 3</td>
                                <td>SUB TEMA 4</td>
                                <td>SUB TEMA 1</td>
                                <td>SUB TEMA 2</td>
                                <td>SUB TEMA 3</td>
                                <td>SUB TEMA 4</td>
                                <td>SUB TEMA 1</td>
                                <td>SUB TEMA 2</td>
                                <td>SUB TEMA 3</td>
                                <td>SUB TEMA 4</td>
                            </tr>
                        </thead>
                    <?php elseif ($IDKELAS['id_kelas'] == 'K12' or $IDKELAS['id_kelas'] == 'K22' or $IDKELAS['id_kelas'] == 'K32') : ?>
                        <thead class="text-center">
                            <tr>
                                <th rowspan="2">NAMA</th>
                                <th colspan="4">TEMA 5</th>
                                <th colspan="4">TEMA 6</th>
                                <th colspan="4">TEMA 7</th>
                                <th colspan="4">TEMA 8</th>
                                <th rowspan="2">PTS</th>
                                <th rowspan="2">PTA</th>
                                <th rowspan="2">NILAI RATA-RATA</th>
                                <th rowspan="2">OPTION</th>
                            </tr>
                            <tr>
                                <td>SUB TEMA 1</td>
                                <td>SUB TEMA 2</td>
                                <td>SUB TEMA 3</td>
                                <td>SUB TEMA 4</td>
                                <td>SUB TEMA 1</td>
                                <td>SUB TEMA 2</td>
                                <td>SUB TEMA 3</td>
                                <td>SUB TEMA 4</td>
                                <td>SUB TEMA 1</td>
                                <td>SUB TEMA 2</td>
                                <td>SUB TEMA 3</td>
                                <td>SUB TEMA 4</td>
                                <td>SUB TEMA 1</td>
                                <td>SUB TEMA 2</td>
                                <td>SUB TEMA 3</td>
                                <td>SUB TEMA 4</td>
                            </tr>
                        </thead>
                    <?php elseif ($IDKELAS['id_kelas'] == 'K41' or $IDKELAS['id_kelas'] == 'K51' or $IDKELAS['id_kelas'] == 'K61') : ?>
                        <thead class="text-center">
                            <tr>
                                <th rowspan="2">NAMA</th>
                                <th colspan="3">TEMA 1</th>
                                <th colspan="3">TEMA 2</th>
                                <th colspan="3">TEMA 3</th>
                                <th colspan="3">TEMA 4</th>
                                <th colspan="3">TEMA 5</th>
                                <th rowspan="2">PTS</th>
                                <th rowspan="2">PTA</th>
                                <th rowspan="2">NILAI RATA-RATA</th>
                                <th rowspan="2">OPTION</th>
                            </tr>
                            <tr>
                                <td>SUB TEMA 1</td>
                                <td>SUB TEMA 2</td>
                                <td>SUB TEMA 3</td>
                                <td>SUB TEMA 1</td>
                                <td>SUB TEMA 2</td>
                                <td>SUB TEMA 3</td>
                                <td>SUB TEMA 1</td>
                                <td>SUB TEMA 2</td>
                                <td>SUB TEMA 3</td>
                                <td>SUB TEMA 1</td>
                                <td>SUB TEMA 2</td>
                                <td>SUB TEMA 3</td>
                                <td>SUB TEMA 1</td>
                                <td>SUB TEMA 2</td>
                                <td>SUB TEMA 3</td>
                            </tr>
                        </thead>
                    <?php elseif ($IDKELAS['id_kelas'] == 'K42' or $IDKELAS['id_kelas'] == 'K52' or $IDKELAS['id_kelas'] == 'K62') : ?>
                        <thead class="text-center">
                            <tr>
                                <th rowspan="2">NAMA</th>
                                <th colspan="3">TEMA 6</th>
                                <th colspan="3">TEMA 7</th>
                                <th colspan="3">TEMA 8</th>
                                <th colspan="3">TEMA 9</th>
                                <th rowspan="2">PTS</th>
                                <th rowspan="2">PAS</th>
                                <th rowspan="2">NILAI RATA-RATA</th>
                                <th rowspan="2">OPTION</th>
                            </tr>
                            <tr>
                                <td>SUB TEMA 1</td>
                                <td>SUB TEMA 2</td>
                                <td>SUB TEMA 3</td>
                                <td>SUB TEMA 1</td>
                                <td>SUB TEMA 2</td>
                                <td>SUB TEMA 3</td>
                                <td>SUB TEMA 1</td>
                                <td>SUB TEMA 2</td>
                                <td>SUB TEMA 3</td>
                                <td>SUB TEMA 1</td>
                                <td>SUB TEMA 2</td>
                                <td>SUB TEMA 3</td>
                            </tr>
                        </thead>
                    <?php endif; ?>

                    <?php if ($IDKELAS['id_kelas'] == 'K11' or $IDKELAS['id_kelas'] == 'K21' or $IDKELAS['id_kelas'] == 'K31') : ?>
                        <Tbody>
                            <?php foreach ($Nilai->join('siswa', 'nilai.nisn=siswa.nisn', 'inner')->where(['id_kelas' => $IDKELAS['id_kelas'], 'id_mapel' => $tempIDMAPEL['id_mapel'], 'id_tahun_ajaran' => $IDTAHUNAJARAN['id_tahun_ajaran']])->find() as $data) : ?>
                                <tr>
                                    <td><?= $data['nama'] ?></td>
                                    <td><?= $data['nilai_1'] ?></td>
                                    <td><?= $data['nilai_2'] ?></td>
                                    <td><?= $data['nilai_3'] ?></td>
                                    <td><?= $data['nilai_4'] ?></td>
                                    <td><?= $data['nilai_5'] ?></td>
                                    <td><?= $data['nilai_6'] ?></td>
                                    <td><?= $data['nilai_7'] ?></td>
                                    <td><?= $data['nilai_8'] ?></td>
                                    <td><?= $data['nilai_9'] ?></td>
                                    <td><?= $data['nilai_10'] ?></td>
                                    <td><?= $data['nilai_11'] ?></td>
                                    <td><?= $data['nilai_12'] ?></td>
                                    <td><?= $data['nilai_13'] ?></td>
                                    <td><?= $data['nilai_14'] ?></td>
                                    <td><?= $data['nilai_15'] ?></td>
                                    <td><?= $data['nilai_16'] ?></td>
                                    <!-- NILAI RATA-RATA TEMA -->
                                    <?php
                                    $rerata = 0;
                                    for ($i = 1; $i <= 16; $i++) :
                                        $rerata = $rerata + $data['nilai_' . $i];
                                    endfor;
                                    ?>
                                    <!-- END NILAI RATA-RATA TEMA -->

                                    <td class="font-weight-bold"><?= ($rerata / 16); ?></td>

                                    <td><?= $data['pts'] ?></td>
                                    <td><?= $data['pas'] ?></td>

                                    <!-- NILAI AKHIR -->
                                    <?php
                                    $tempNilaiAkhir = (($rerata / 16) + ($rerata / 16) + $data['pts'] + $data['pas']) / 4;
                                    ?>
                                    <td class="font-weight-bold"><?= $tempNilaiAkhir ?></td>
                                    <!-- END NILAI AKHIR -->

                                    <!-- KET. TUNTAS/TIDAK TUNTAS -->
                                    <?php
                                    if ($tempNilaiAkhir < 75) : ?>
                                        <td>
                                            <h6 class="text-danger font-weight-bold text-center">Tidak Lulus</h6>
                                        </td>
                                    <?php elseif ($tempNilaiAkhir >= 75) : ?>
                                        <td>
                                            <h6 class="text-success font-weight-bold text-center">Lulus</h6>
                                        </td>
                                    <?php endif; ?>
                                    <!-- END KET. TUNTAS/TIDAK TUNTAS -->
                                    <td>
                                        <a href="#" class="btn btn-success btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                            <span class="text">Input Nilai</span>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </Tbody>
                    <?php elseif ($IDKELAS['id_kelas'] == 'K12' or $IDKELAS['id_kelas'] == 'K22' or $IDKELAS['id_kelas'] == 'K32') : ?>
                        <Tbody>

                        </Tbody>
                    <?php elseif ($IDKELAS['id_kelas'] == 'K41' or $IDKELAS['id_kelas'] == 'K51' or $IDKELAS['id_kelas'] == 'K61') : ?>
                        <Tbody>

                        </Tbody>
                    <?php elseif ($IDKELAS['id_kelas'] == 'K42' or $IDKELAS['id_kelas'] == 'K52' or $IDKELAS['id_kelas'] == 'K62') : ?>
                        <Tbody>

                        </Tbody>
                    <?php endif; ?>

                </table>
            </div>

        </div>
    </div>
<?php endif; ?>
<?= $this->endSection(''); ?>