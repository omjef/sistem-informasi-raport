<?= $this->extend('layout/template_table') ?>

<?= $this->Section('content') ?>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h5 class="text-primary font-weight-bold m-0 mt-2">Data Mata Pelajaran</h5>
            </div>
            <div class="col-md-6">
                <a href="/admin/tambah_datamapel" class="btn btn-primary float-right"><i class="fa fa-plus"></i></a>
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
                        <th>ID MAPEL</th>
                        <th>NAMA MAPEL</th>
                        <th>KELAS</th>
                        <th>ASPEK</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tfoot class="text-center">
                    <tr>
                        <th>ID MAPEL</th>
                        <th>NAMA MAPEL</th>
                        <th>KELAS</th>
                        <th>ASPEK</th>
                        <th>#</th>
                    </tr>
                </tfoot>

                <body>
                    <?php foreach ($dataMapel as $data) : ?>
                        <tr>
                            <td><?= $data['id_mapel'] ?></td>
                            <td><?= $data['nama_mapel'] ?></td>
                            <td><?= $data['kelas'] ?></td>
                            <td><?= $data['aspek'] ?></td>
                            <td class="text-center"><a href="<?= base_url('admin/edit_datamapel?id_mapel=' . $data['id_mapel']) ?>" class="fa fa-edit"></a></td>
                        </tr>
                    <?php endforeach; ?>
                </body>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>