<?= $this->extend('layout/template_table'); ?>

<?= $this->section('content'); ?>
<div class="card mb-3">
    <div class="card-header">
        <h6 class="m-0 text-primary font-weight-bold">Absensi Siswa</h6>
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
            Halaman ini digunakan untuk menginput absensi siswa!
        </div>
        <form action="<?= base_url('/admin/input_absensi_siswa') ?>" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kelas</label>
                        <select class="form-control" name="kelas" id="kelas">
                            <?php foreach ($Kelas->where('semester', 'genap')->find() as $data) : ?>
                                <option value="<?= $data['kelas'] ?>"><?= $data['kelas'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Semester</label>
                        <select class="form-control" name="semester" id="semester">
                            <option value="Ganjil">Ganjil</option>
                            <option value="Genap">Genap</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tahun Ajaran</label>
                        <select class="form-control" name="tahun_ajaran" id="tahun_ajaran">
                            <?php foreach ($TahunAjaran->where('id_kelas', 'K11')->find() as $data) : ?>
                                <option value="<?= $data['tahun_ajaran'] ?>"><?= $data['tahun_ajaran'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <input type="submit" name="cek_siswa" id="cek_siswa" value="Cek Siswa" class="btn btn-primary">
        </form>
    </div>
</div>

<?php if (isset($_POST['cek_siswa'])) : ?>
    <div class="card mb-2">
        <div class="card-header">
            <h6 class="text-primary text-center font-weight-bold m-0">Tampil Data Absensi Siswa</h6>
        </div>
        <div class="card-body">
            <!-- Tampung Data -->
            <?php
            $kelas = $_POST['kelas'];
            $semester = $_POST['semester'];
            $tahun_ajaran = $_POST['tahun_ajaran'];

            //Wali Kelas
            $wali = $Kelas->join('guru', 'kelas.nip=guru.nip', 'inner')->where(['kelas' => $kelas, 'semester' => $semester])->first();
            ?>
            <!-- End Tampung Data -->
            <table class="table table-hover table-borderless mb-2" width="100%" cellspacing="0">
                <tr>
                    <td class="w-25">Kelas</td>
                    <td style="width: 1%;">:</td>
                    <td><?= $kelas ?></td>
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
                    <td><?= $wali['nama'] ?></td>
                </tr>
            </table>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th style="width: 40%;">NAMA</th>
                            <th style="width: 10%;">SAKIT</th>
                            <th style="width: 10%;">IZIN</th>
                            <th style="width: 10%;">TANPA KETERANGAN</th>
                            <th style="width: 15%;">OPSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Tampung -->
                        <?php
                        //ID KELAS
                        $idkelas = $Kelas->where(['kelas' => $kelas, 'semester' => $semester])->first();

                        //ID TAHUN AJARAN
                        $idtahunajaran = $TahunAjaran->where(['id_kelas' => $idkelas['id_kelas'], 'tahun_ajaran' => $tahun_ajaran])->first();
                        ?>
                        <!-- Akhir Tampung -->
                        <?php foreach ($Absensi->join('siswa', 'absensi.nisn=siswa.nisn', 'inner')->where(['id_kelas' => $idkelas['id_kelas'], 'id_tahun_ajaran' => $idtahunajaran['id_tahun_ajaran']])->find() as $data) : ?>
                            <tr>
                                <td><?= $data['nama'] ?></td>
                                <td><?= $data['sakit'] ?></td>
                                <td><?= $data['izin'] ?></td>
                                <td><?= $data['tanpa_keterangan'] ?></td>
                                <td>
                                    <a href="<?= base_url('/admin/input_absensi' . '?nisn=' . $data['nisn'] . '&' . 'id_kelas=' . $data['id_kelas'] . '&' . 'id_tahun_ajaran=' . $data['id_tahun_ajaran']) ?>" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-edit"></i>
                                        </span>
                                        <span class="text">Input Absensi</span>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
<?php endif; ?>
<?= $this->endSection(''); ?>