<?= $this->extend('layout/template_table') ?>

<?= $this->Section('content') ?>
<div class="card">
    <div class="card-header">
        <div class="row">
            <h5 class="text-primary font-weight-bold m-0 mt-2">Data Kelas</h5>
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
                        <th>ID KELAS</th>
                        <th>KELAS</th>
                        <th>SEMESTER</th>
                        <th>NAMA GURU KELAS</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tfoot class="text-center">
                    <tr>
                        <th>ID KELAS</th>
                        <th>KELAS</th>
                        <th>SEMESTER</th>
                        <th>NAMA GURU KELAS</th>
                        <th>#</th>
                    </tr>
                </tfoot>

                <body>
                    <?php foreach ($dataKelas->join('guru', 'kelas.nip=guru.nip', 'inner')->find() as $data) : ?>
                        <tr>
                            <td><?= $data['id_kelas'] ?></td>
                            <td><?= $data['kelas'] ?></td>
                            <td><?= $data['semester'] ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td class="text-center"><a href="<?= base_url('admin/edit_datakelas?id_kelas=' . $data['id_kelas']) ?>" class="fa fa-edit"></a></td>
                        </tr>
                    <?php endforeach; ?>
                </body>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>