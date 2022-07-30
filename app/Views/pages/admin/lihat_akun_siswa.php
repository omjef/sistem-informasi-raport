<?= $this->extend('layout/template_table'); ?>

<?= $this->section('content'); ?>
<!-- Card -->
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6 mt-2">
                <h6 class="text-primary font-weight-bold m-0">Data Akun Guru</h6>
            </div>
            <div class="col-md-6">
                <a href="#" data-toggle="modal" class="btn btn-primary float-right" data-target="#akunGuru">
                    <i class="fa fa-plus"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Nip</th>
                        <th>Username</th>
                        <th>Status Akun</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tfoot class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Nip</th>
                        <th>Username</th>
                        <th>Status Akun</th>
                        <th>#</th>
                    </tr>
                </tfoot>

                <body>
                    <?php
                    $data = $akun->find();
                    foreach ($data as $data) :
                    ?>
                        <tr>
                            <td><?= $data['id'] ?></td>
                            <td><?= $data['nip'] ?></td>
                            <td><?= $data['username'] ?></td>
                            <td><?php
                                if ($data['is_aktif'] == 1) {
                                    echo "Aktif";
                                } else {
                                    echo "Tidak Aktif";
                                }
                                ?></td>
                            <td class="text-center"><a href="<?= base_url('admin/edit_akun_guru?') . "id=$data[id]&nip=$data[nip]" ?>" class="fa fa-edit mr-3"></a> <a href="" class="fa fa-trash"></a></td>
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
<!-- Tambah akun guru -->
<!-- Akhir tambah akun guru -->
<?= $this->endSection(''); ?>