<?= $this->extend('layout/template_table'); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h6 class="m-0 font-weight-bold text-primary mt-2">Data Siswa Yang Mengikuti Eskul</h6>
            </div>
            <div class="col-md-6">
                <a href="<?= base_url('/admin/tambah_siswaeskul') ?>" class="btn btn-primary font-weight-bold float-right"><i class="fa fa-plus"></i></a>
            </div>
        </div>
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
            Halaman ini berisi data eskul perkelas!
        </div>
        <form action="<?= base_url('/admin/data_siswaeskul') ?>" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="semester">Masukan Eskul</label>
                        <select class="form-control" name="eskul" id="eskul">
                            <?php foreach ($dataEskul->find() as $data) : ?>
                                <option <?php if (isset($_POST['tampung_data'])) {
                                            echo ($_POST['eskul'] == $data['id_eskul']) ? 'Selected' : '';
                                        } ?> value="<?= $data['id_eskul'] ?>"><?= $data['nama_eskul'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="semester">Masukan Kelas</label>
                        <select class="form-control" name="kelas" id="kelas">
                            <option <?php if (isset($_POST['tampung_data'])) {
                                        echo ($_POST['kelas'] == '1') ? 'Selected' : '';
                                    } ?>>1</option>
                            <option <?php if (isset($_POST['tampung_data'])) {
                                        echo ($_POST['kelas'] == '2') ? 'Selected' : '';
                                    } ?>>2</option>
                            <option <?php if (isset($_POST['tampung_data'])) {
                                        echo ($_POST['kelas'] == '3') ? 'Selected' : '';
                                    } ?>>3</option>
                            <option <?php if (isset($_POST['tampung_data'])) {
                                        echo ($_POST['kelas'] == '4') ? 'Selected' : '';
                                    } ?>>4</option>
                            <option <?php if (isset($_POST['tampung_data'])) {
                                        echo ($_POST['kelas'] == '5') ? 'Selected' : '';
                                    } ?>>5</option>
                            <option <?php if (isset($_POST['tampung_data'])) {
                                        echo ($_POST['kelas'] == '6') ? 'Selected' : '';
                                    } ?>>6</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="semester">Masukan Semester</label>
                        <select class="form-control" name="semester" id="semester">
                            <option <?php if (isset($_POST['tampung_data'])) {
                                        echo ($_POST['semester'] == 'Ganjil') ? 'Selected' : '';
                                    } ?>>Ganjil</option>
                            <option <?php if (isset($_POST['tampung_data'])) {
                                        echo ($_POST['semester'] == 'Genap') ? 'Selected' : '';
                                    } ?>>Genap</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="aspek">Tahun Ajaran</label>
                        <select class="form-control" name="tahun_ajaran" id="tahun_ajaran">
                            <?php foreach ($TahunAjaran as $data) : ?>
                                <option value="<?= $data['tahun_ajaran'] ?>" <?php if (isset($_POST['tampung_data'])) {
                                                                                    echo ($_POST['tahun_ajaran'] == $data['tahun_ajaran']) ? 'Selected' : '';
                                                                                } ?>><?= $data['tahun_ajaran'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <input class="btn btn-primary btn-user btn-block" type="Submit" name="tampung_data" value="Lihat Data">
        </form>
    </div>
</div>

<?php if (isset($_POST['tampung_data'])) : ?>
    <div class="card mt-3 mb-3">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary text-center">Tampil Eskul Perkelas</h6>
        </div>
        <div class="card-body">
            <table class="table table-hover table-borderless mb-2" width="100%" cellspacing="0">
                <tr>
                    <td style="width: 25%;">Nama Ekstrakulikuler</td>
                    <td style="width: 3%;">:</td>
                    <?php $namaEskul = $dataEskul->where('id_eskul', $_POST['eskul'])->first() ?>
                    <td><?= $namaEskul['nama_eskul']; ?></td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>:</td>
                    <td><?= $_POST['kelas']; ?></td>
                </tr>
                <tr>
                    <td>Semester</td>
                    <td>:</td>
                    <td><?= $_POST['semester']; ?></td>
                </tr>
                <tr>
                    <td>Tahun Ajaran</td>
                    <td>:</td>
                    <td><?= $_POST['tahun_ajaran']; ?></td>
                </tr>
            </table>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>NISN</th>
                            <th>NAMA</th>
                            <th>OPSI</th>
                        </tr>
                    </thead>
                    <tfoot class="text-center">
                        <tr>
                            <th>NISN</th>
                            <th>NAMA</th>
                            <th>OPSI</th>
                        </tr>
                    </tfoot>
                    <?php
                    $dataKelas = $Kelas->where(['kelas' => $_POST['kelas'], 'semester' => $_POST['semester']])->first();
                    $dataTA = $TA->where(['id_kelas' => $dataKelas['id_kelas'], 'tahun_ajaran' => $_POST['tahun_ajaran']])->first();
                    ?>

                    <body>
                        <?php foreach ($nilaiEskul->where(['id_eskul' => $_POST['eskul'], 'id_kelas' => $dataKelas['id_kelas'], 'id_tahun_ajaran' => $dataTA['id_tahun_ajaran']])->find() as $data) : ?>
                            <tr>
                                <td><?= $data['nisn'] ?></td>
                                <td><?= $data['nama'] ?></td>
                                <td class="text-center"><a class="fa fa-trash" href="<?= base_url('admin/val_hapus_siswaeskul') . "?id_eskul=$data[id_eskul]&nisn=$data[nisn]&id_kelas=$data[id_kelas]&id_tahun_ajaran=$data[id_tahun_ajaran]" ?>" onclick="return confirm('Yakin data mau dihapus?')"></a></td>
                            </tr>
                        <?php endforeach; ?>
                    </body>
                </table>
            </div>
        </div>
    </div>
<?php endif; ?>
<?= $this->endSection(''); ?>