<?= $this->extend('layout/template_table') ?>

<?= $this->Section('content') ?>
<div class="card">
    <div class="card-header">
        <h5 class="text-primary font-weight-bold m-0">EDIT DATA EKSTRAKULIKULER</h5>
    </div>
    <div class="card-body">
        <form action="<?= base_url('/admin/val_edit_dataeskul') ?>" method="post">
            <div class="modal-body">
                <div class="form-group">
                    <label for="id_eskul">ID EKSTRAKULIKULER</label>
                    <input type="text" class="form-control" name="id_eskul" id="id_eskul" value="<?= $dataEskul['id_eskul'] ?>" placeholder="Masukan id ekstrakulikuler" hidden>
                    <input type="text" class="form-control" name="id_eskul1" id="id_eskul1" value="<?= $dataEskul['id_eskul'] ?>" placeholder="Masukan id ekstrakulikuler">
                </div>
                <div class="form-group">
                    <label for="id_eskul">NAMA EKSTRAKULIKULER</label>
                    <input type="text" class="form-control" name="nama_eskul" id="nama_eskul" value="<?= $dataEskul['nama_eskul'] ?>" placeholder="Masuka nama ekstrakulikuler">
                </div>
                <input type="submit" class="btn btn-primary" value="Simpan Data">
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>