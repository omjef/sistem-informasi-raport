<?= $this->extend('layout/template_table'); ?>

<?= $this->section('content'); ?>
<!-- Card -->
<div class="card">
    <div class="card-header">
        <h6 class=" text-primary font-weight-bold m-0">Edit Akun Guru</h6>
    </div>
    <div class="card-body">
        <?php $data = $akun->where(['id' => $_GET['id'], 'nip' => $_GET['nip']])->first(); ?>
        <form action="<?= base_url('/admin/validasi_edit_akun_guru') ?>" method="post">
            <!-- Id -->
            <input type="text" class="form-control" name="id" id="id" placeholder="Masukan nip" value="<?= $data['id'] ?>" hidden>

            <!-- Nip -->
            <div class="form-group">
                <label for="nip">NIP</label>
                <input type="text" class="form-control" name="nip" id="nip" placeholder="Masukan nip" value="<?= $data['nip'] ?>">
            </div>

            <!-- Username -->
            <div class="form-group">
                <label for="username">USERNAME</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Masukan username" value="<?= $data['username'] ?>">
            </div>

            <!-- Password -->
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="password">PASSWORD</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Masukan password">
                        <small class="form-text text-muted">Jika password tidak akan diganti, kosongkan aja!</small>
                    </div>
                    <div class="col-md-6">
                        <label for="password">KONFIRMASI PASSWORD</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Masukan konfirmasi password">
                    </div>
                </div>
            </div>

            <!-- Status Guru -->
            <div class="form-group">
                <label for="jenis_kelamin">STATUS AKUN</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="is_aktif" id="1" value="1" <?php if ($data['is_aktif'] == 1) {
                                                                                                        echo "checked";
                                                                                                    } ?>>
                    <label class="form-check-label" for="1">
                        Aktif
                    </label>
                    <input class="form-check-input ml-4" type="radio" name="is_aktif" id="0" value="0" <?php if ($data['is_aktif'] == 0) {
                                                                                                            echo "checked";
                                                                                                        } ?>>
                    <label class="form-check-label ml-5" for="0">
                        Tidak Aktif
                    </label>
                </div>
            </div>
            <input type="submit" class="btn btn-primary btn-block mt-4" value="Simpan Data">
        </form>
    </div>
</div>
<!-- Akhir card -->
<?= $this->endSection(''); ?>