<?= $this->extend('layout/template_table') ?>

<?= $this->Section('content') ?>
<div class="card">
    <div class="card-header">
        <h5 class="text-primary font-weight-bold m-0">TAMBAH DATA MATA PELAJARAN</h5>
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
        <form action="<?= base_url('/admin/val_tambah_datamapel') ?>" method="post">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_mapel">ID MATAPELAJARAN</label>
                        <input type="text" class="form-control <?= ($validation->hasError('id_mapel')) ? 'is-invalid' : ''; ?>" name="id_mapel" id="id_mapel" placeholder="Masukan id mata pelajaran" value="<?= old('id_mapel') ?>">
                        <small class=" form-text text-danger"><?= $validation->getError('id_mapel'); ?></small>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="id_mapel">NAMA MATAPELAJARN</label>
                        <input type="text" class="form-control <?= ($validation->hasError('nama_mapel')) ? 'is-invalid' : ''; ?>" name="nama_mapel" id="nama_mapel" placeholder="Masukan id mata pelajaran" value="<?= old('nama_mapel') ?>">
                        <small class=" form-text text-danger"><?= $validation->getError('nama_mapel'); ?></small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="aspek">ASPEK</label>
                        <select class="form-control" name="aspek" id="aspek">
                            <option value="Keterampilan" <?= (old('aspek') == 'Keterampilan') ? 'selected' : ''; ?>>Keterampilan</option>
                            <option value="Pengetahuan" <?= (old('aspek') == 'Pengetahuan') ? 'selected' : ''; ?>>Pengetahuan</option>
                        </select>
                    </div>
                </div>
            </div>
            <input type="submit" value="Simpan Data" class="btn btn-primary btn-block mt-2">
        </form>
    </div>
</div>
<?= $this->endSection() ?>