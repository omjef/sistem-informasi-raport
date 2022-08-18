<?= $this->extend('layout/template_table') ?>

<?= $this->Section('content') ?>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h5 class="text-primary font-weight-bold m-0">DATA EKSTRAKULIKULER</h5>
            </div>
            <div class="col-md-6"><button data-toggle="modal" class="btn btn-primary float-right active" data-target="#dataEskul"><i class="fa fa-plus"></i></button></div>
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
                        <th>ID EKSTRAKULIKULER</th>
                        <th>NAMA EKSTRAKULIKULER</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tfoot class="text-center">
                    <tr>
                        <th>ID EKSTRAKULIKULER</th>
                        <th>NAMA EKSTRAKULIKULER</th>
                        <th>#</th>
                    </tr>
                </tfoot>

                <body>
                    <?php foreach ($dataEskul as $data) : ?>
                        <tr>
                            <td><?= $data['id_eskul'] ?></td>
                            <td><?= $data['nama_eskul'] ?></td>
                            <td class="text-center"><a href="<?= base_url('admin/edit_dataeskul?id_eskul=' . $data['id_eskul']) ?>" class="fa fa-edit"></a></td>
                        </tr>
                    <?php endforeach; ?>
                </body>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="dataEskul" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">TAMBAH DATA EKSTRAKULIKULER</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= base_url('/admin/val_tambah_dataeskul') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_eskul">ID EKSTRAKULIKULER</label>
                        <input type="text" class="form-control" name="id_eskul" id="id_eskul" placeholder="Masukan id ekstrakulikuler">
                    </div>
                    <div class="form-group">
                        <label for="id_eskul">NAMA EKSTRAKULIKULER</label>
                        <input type="text" class="form-control" name="nama_eskul" id="nama_eskul" placeholder="Masuka nama ekstrakulikuler">
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
<?= $this->endSection() ?>