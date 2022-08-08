<?= $this->extend('layout/template_table'); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h5 class="text-primary font-weight-bold m-0 mt-2">AKUN GURU</h5>
            </div>
            <div class="col-md-6">
                <button data-toggle="modal" class="btn btn-primary float-right active" data-target="#akunGuru"><i class="fa fa-plus"></i></button>
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
                        <th>NO</th>
                        <th>NIP</th>
                        <th>USERNAME</th>
                        <th>JENIS AKUN</th>
                        <th>STATUS AKUN</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tfoot class="text-center">
                    <tr>
                        <th>NO</th>
                        <th>NIP</th>
                        <th>USERNAME</th>
                        <th>JENIS AKUN</th>
                        <th>STATUS AKUN</th>
                        <th>#</th>
                    </tr>
                </tfoot>

                <body>
                    <?php
                    $data = $akunGuru->find();
                    foreach ($data as $data) :
                    ?>
                        <tr>
                            <td><?= $data['id'] ?></td>
                            <td><?= $data['nip'] ?></td>
                            <td><?= $data['username'] ?></td>
                            <td><?= $data['jenis_akun'] ?></td>
                            <td><?= ($data['status_akun'] == 'Aktif') ? "<span class='text-success'>$data[status_akun]</span>" : "<span class='text-danger'>$data[status_akun]</span>"; ?></td>
                            <td class="text-center"><a href="<?= base_url('admin/edit_akunguru') . "?nip=$data[nip]" ?>" class="fa fa-edit mr-3"></a> <a class="fa fa-trash" href="<?= base_url('admin/hapus_akunguru') . "?nip=$data[nip]" ?>" onclick="return confirm('Yakin data mau dihapus?')"></a></td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                </body>
            </table>
        </div>
    </div>
</div>

<!-- MODAL TAMPIL AKUN GURU -->
<div class="modal fade" id="akunGuru" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">TAMBAH AKUN GURU</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= base_url('/admin/val_takunguru') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <select class="form-control" name="nip" id="nip">
                            <?php foreach ($dataGuru->find() as $inpGuru) : ?>
                                <option value="<?= $inpGuru['nip'] ?>"><?= $inpGuru['nip'] . " - " . $inpGuru['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="username">USERNAME</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Masukan username">
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="password">PASSWORD</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Masukan password">
                            </div>
                            <div class="col-md-6">
                                <label for="password">KONFIRMASI PASSWORD</label>
                                <input type="password" class="form-control" name="konfirmasi_password" id="konfirmasi_password" placeholder="Masukan konfirmasi password">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="aspek">JENIS AKUN</label>
                        <select class="form-control" name="jenis_akun" id="jenis_akun">
                            <option value="Kepala Sekolah">Kepala Sekolah</option>
                            <option value="Guru Kelas">Guru Kelas</option>
                        </select>
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
<?= $this->endSection(''); ?>