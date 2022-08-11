<?= $this->extend('layout/template_table') ?>

<?= $this->Section('content') ?>
<div class="card">
    <div class="card-header">
        <h5 class="text-primary font-weight-bold m-0">EDIT DATA KELAS</h5>
    </div>
    <div class="card-body">
        <form action="<?= base_url('/admin/val_tambah_datamapel') ?>" method="post">

            <div class="form-group">
                <label for="id_mapel">ID KELAS</label>
                <input type="text" class="form-control <?= ($validation->hasError('id_kelas')) ? 'is-invalid' : ''; ?>" name="id_mapel" id="id_mapel" placeholder="Masukan id mata pelajaran" value="<?= $dataKelas['id_kelas'] ?>">
                <small class=" form-text text-danger"><?= $validation->getError('id_kelas'); ?></small>
            </div>

            <div class="form-group">
                <label for="id_mapel">KELAS</label>
                <input type="text" class="form-control <?= ($validation->hasError('kelas')) ? 'is-invalid' : ''; ?>" name="kelas" id="kelas" placeholder="Masukan kelas" value="<?= $dataKelas['kelas'] ?>">
                <small class=" form-text text-danger"><?= $validation->getError('kelas'); ?></small>
            </div>
            <div class="form-group">
                <label for="id_mapel">SEMESTER</label>
                <input type="text" class="form-control <?= ($validation->hasError('semester')) ? 'is-invalid' : ''; ?>" name="semester" id="semester" placeholder="Masukan kelas" value="<?= $dataKelas['semester'] ?>">
                <small class=" form-text text-danger"><?= $validation->getError('semester'); ?></small>
            </div>
            <div class="form-group">
                <label for="aspek">ASPEK</label>
                <select class="form-control" name="nip" id="nip">
                    <?php foreach ($guru->find() as $data) : ?>
                        <option value="<?= $data['nip'] ?>" <?= ($data['nip'] == old('nip')) ? 'selected' : ''; ?>><?= $data['nip'] . ' - ' . $data['nama'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <input type="submit" value="Simpan Data" class="btn btn-primary btn-block mt-2">
        </form>
    </div>
</div>
<?= $this->endSection() ?>