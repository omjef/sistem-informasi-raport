<?= $this->extend('layout/template_table') ?>

<?= $this->Section('content') ?>
<div class="card">
    <div class="card-header">
        <h5 class="text-primary font-weight-bold m-0">EDIT TAHUN AJARAN</h5>
    </div>
    <div class="card-body">
        <form action="<?= base_url('/admin/val_edit_datakelas') ?>" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="id_mapel">ID KELAS</label>
                        <input type="text" class="form-control <?= ($validation->hasError('id_kelas')) ? 'is-invalid' : ''; ?>" name="id_kelas" id="id_kelas" placeholder="Masukan id mata pelajaran" value="<?= $dataKelas['id_kelas'] ?>" readonly>
                        <small class=" form-text text-danger"><?= $validation->getError('id_kelas'); ?></small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="id_mapel">KELAS</label>
                        <input type="text" class="form-control <?= ($validation->hasError('kelas')) ? 'is-invalid' : ''; ?>" name="kelas" id="kelas" placeholder="Masukan kelas" value="<?= $dataKelas['kelas'] ?>">
                        <small class=" form-text text-danger"><?= $validation->getError('kelas'); ?></small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="aspek">SEMESTER</label>
                        <select class="form-control" name="semester" id="semester">
                            <option value="Ganjil" <?= ($dataKelas['semester'] == 'Ganjil') ? 'selected' : ''; ?>>Ganjil</option>
                            <option value="Genap" <?= ($dataKelas['semester'] == 'Genap') ? 'selected' : ''; ?>>Genap</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="aspek">ASPEK</label>
                        <select class="form-control" name="nip" id="nip">
                            <?php foreach ($guru->find() as $data) : ?>
                                <option value="<?= $data['nip'] ?>" <?= ($data['nip'] == $dataKelas['nip']) ? 'selected' : ''; ?>><?= $data['nip'] . ' - ' . $data['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <input type="submit" value="Simpan Data" class="btn btn-primary btn-block mt-2">
        </form>
    </div>
</div>
<?= $this->endSection() ?>