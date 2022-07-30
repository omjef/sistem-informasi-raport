<?= $this->extend('layout/template_table'); ?>

<?= $this->section('content'); ?>
<!-- Card -->
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6 mt-2">
                <h6 class="text-primary font-weight-bold m-0">Data Guru</h6>
            </div>
            <div class="col-md-6">
                <a href="#" data-toggle="modal" class="btn btn-primary float-right" data-target="#akunGuru">
                    <i class="fa fa-plus"></i>
                </a>
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
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="text-center">
                    <tr>
                        <th>NIP</th>
                        <th>NUPTK</th>
                        <th>NAMA</th>
                        <th>TEMPAT TANGGAL LAHIR</th>
                        <th>JENIS KELAMIN</th>
                        <th>AGAMA</th>
                        <th>IJAZAH DAN TAHUN IJAZAH</th>
                        <th>JENIS GURU</th>
                        <th>TANGGAL DI ANGKAT</th>
                        <th>MULAI BEKERJA DISEKOLAH INI</th>
                        <th>MENGAJAR DIKELAS</th>
                        <th>PENSIUN</th>
                        <th>JUMLAH JAM MENGAJAR</th>
                        <th>FOTO</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tfoot class="text-center">
                    <tr>
                        <th>NIP</th>
                        <th>NUPTK</th>
                        <th>NAMA</th>
                        <th>TEMPAT TANGGAL LAHIR</th>
                        <th>JENIS KELAMIN</th>
                        <th>AGAMA</th>
                        <th>IJAZAH DAN TAHUN IJAZAH</th>
                        <th>JENIS GURU</th>
                        <th>TANGGAL DI ANGKAT</th>
                        <th>MULAI BEKERJA DISEKOLAH INI</th>
                        <th>MENGAJAR DIKELAS</th>
                        <th>PENSIUN</th>
                        <th>JUMLAH JAM MENGAJAR</th>
                        <th>FOTO</th>
                        <th>#</th>
                    </tr>
                </tfoot>

                <body>
                    <?php
                    $data = $akun->find();
                    foreach ($data as $data) :
                    ?>
                        <tr>
                            <td><?= $data['nip'] ?></td>
                            <td><?= $data['nuptk'] ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['tempat_lahir'] . " / " . date("d-m-Y", strtotime($data['tanggal_lahir'])); ?></td>
                            <td><?= $data['jenis_kelamin'] ?></td>
                            <td><?= $data['agama'] ?></td>
                            <td><?= $data['ijazah'] . " / " . $data['tahun_ijazah'] ?></td>
                            <td><?= $data['jenis_guru'] ?></td>
                            <td><?= date("d-m-Y", strtotime($data['tanggal_angkatan'])) ?></td>
                            <td><?= date("d-m-Y", strtotime($data['mulai_bekerja_disekolah'])) ?></td>
                            <td><?= date("d-m-Y", strtotime($data['tmt_masa_pensiun'])) ?></td>
                            <td><?= $data['mengajar_dikelas'] ?></td>
                            <td><?= $data['jumlah_jam_mengajar'] ?></td>
                            <td class="text-center"><img style="width: 55px; height: 60px;" src="<?= base_url('/img') . "/" . $data['foto_guru'] ?>" alt=""></td>
                            <td class="text-center"><a href="<?= base_url('admin/edit_akun_guru?') . "nip=$data[nip]" ?>" class="fa fa-edit"></a> <a href="" class="fa fa-trash"></a></td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                </body>
            </table>
        </div>
    </div>
</div>
<!-- Akhir card -->
<!-- Tambah akun guru -->
<div class="modal fade" id="akunGuru" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Akun Guru</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= base_url('/admin/validasi_tambah_akun_guru') ?>" method="post">
                <div class="modal-body">
                    <!-- Nip -->
                    <div class="form-group">
                        <label for="nip">Nip</label>
                        <input type="text" class="form-control" name="nip" id="nip" aria-describedby="emailHelp" placeholder="Masukan nip">
                    </div>

                    <!-- Username -->
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp" placeholder="Masukan username">
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" aria-describedby="emailHelp" placeholder="Masukan password">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Simpan Data">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Akhir tambah akun guru -->
<?= $this->endSection(''); ?>