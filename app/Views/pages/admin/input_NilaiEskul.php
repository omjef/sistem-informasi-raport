<?= $this->extend('layout/template_table'); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <h6 class="text-primary m-0 font-weight-bold">Nilai Eskul</h6>
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
        <form action="" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Ekstrakulikuler</label>
                        <select name="nama_eskul" id="nama_eskul" class="form-control">
                            <?php foreach ($Eskul->find() as $data) : ?>
                                <option value="<?= $data['nama_eskul'] ?>"><?= $data['nama_eskul'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kelas</label>
                        <select name="kelas" id="kelas" class="form-control">
                            <?php foreach ($Kelas->where('semester', 'ganjil')->find() as $data) : ?>
                                <option value="<?= $data['kelas'] ?>"><?= $data['kelas'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Semester</label>
                        <select name="semester" id="semester" class="form-control">
                            <option value="Ganjil">Ganjil</option>
                            <option value="Genap">Genap</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tahun Ajaran</label>
                        <select name="tahun_ajaran" id="tahun_ajaran" class="form-control">
                            <?php foreach ($TahunAjaran->where('id_kelas', 'K11')->find() as $data) : ?>
                                <option value="<?= $data['tahun_ajaran'] ?>"><?= $data['tahun_ajaran'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <input type="submit" value="Cek Siswa" class="btn btn-primary" name="cek_data" id="cek_data">
        </form>
    </div>
</div>
<?php if (isset($_POST['cek_data'])) : ?>
    <div class="card mt-3">
        <div class="card-header">
            <h6 class="text-primary font-weight-bold m-0 text-center">Data Eskul</h6>
        </div>
        <div class="card-body">
            <!-- Tampung Data -->
            <?php
            $nama_eskul = $_POST['nama_eskul'];
            $kelas = $_POST['kelas'];
            $semester = $_POST['semester'];
            $tahun_ajaran = $_POST['tahun_ajaran'];
            ?>
            <!-- Akhir Tampung Data -->
            <table class="table table-hover table-borderless mb-2" width="100%" cellspacing="0">
                <tr>
                    <td class="w-25">Nama Eskul</td>
                    <td style="width: 1%;">:</td>
                    <td><?= $nama_eskul ?></td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>:</td>
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
            </table>

            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th style="width: 50%;">NAMA</th>
                            <th style="width: 15%;">NILAI</th>
                            <th style="width: 15%;">DESKRIPSI</th>
                            <th style="width: 20%;">OPSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //ID KELAS
                        $id_kelas = $Kelas->where(['kelas' => $kelas, 'semester' => $semester])->first();

                        // ID TAHUN AJARAN
                        $id_tahun_ajaran = $TahunAjaran->where(['id_kelas' => $id_kelas['id_kelas'], 'tahun_ajaran' => $tahun_ajaran])->first();
                        ?>
                        <?php foreach ($NilaiEskul->join('siswa', 'nilai_eskul.nisn=siswa.nisn', 'inner')->where(['id_kelas' => $id_kelas['id_kelas'], 'id_tahun_ajaran' => $id_tahun_ajaran['id_tahun_ajaran']])->find() as $data) : ?>
                            <tr>
                                <td><?= $data['nama'] ?></td>
                                <td><?= $data['nilai'] ?></td>
                                <td><?= $data['deskripsi'] ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('/admin/nilai_eskul' . '?id_eskul=' . $data['id_eskul'] . '&' . 'nisn=' . $data['nisn'] . '&' . 'id_kelas=' . $data['id_kelas'] . '&' . 'id_tahun_ajaran=' . $data['id_tahun_ajaran']) ?>" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-edit"></i>
                                        </span>
                                        <span class="text">Input Nilai Eskul</span>
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