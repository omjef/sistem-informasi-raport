<?= $this->extend('layout/template_table') ?>

<?= $this->Section('content') ?>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h5 class="text-primary font-weight-bold m-0 mt-2">DATA TAHUN AJARAN</h5>
            </div>
            <div class="col-md-6">
                <button data-toggle="modal" class="btn btn-primary float-right active" data-target="#dataTA"><i class="fa fa-plus"></i></button>
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
                        <th>ID KELAS</th>
                        <th>KELAS DAN SEMESTER</th>
                        <th>SEMESTER</th>
                    </tr>
                </thead>
                <tfoot class="text-center">
                    <tr>
                        <th>ID KELAS</th>
                        <th>KELAS DAN SEMESTER</th>
                        <th>SEMESTER</th>
                    </tr>
                </tfoot>

                <body>
                    <?php foreach ($dataTA->select('tahun_ajaran.id_tahun_ajaran as id_tahun_ajaran, kelas.kelas as kelas, kelas.semester as semester, tahun_ajaran.tahun_ajaran as tahun_ajaran')->join('kelas', 'tahun_ajaran.id_kelas=kelas.id_kelas', 'inner')->find() as $data) : ?>
                        <tr>
                            <td><?= $data['id_tahun_ajaran'] ?></td>
                            <td><?= $data['kelas'] . '-' . $data['semester'] ?></td>
                            <td><?= $data['tahun_ajaran'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </body>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="dataTA" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">TAMBAH TAHUN AJARAN</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= base_url('/admin/val_tambah_datata') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_eskul">TAHUN AJARAN</label>
                        <input type="text" class="form-control" name="tahun_ajaran" id="tahun_ajaran" placeholder="Masukan tahun ajaran">
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