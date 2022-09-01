<?= $this->extend('layout/template_table'); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <h5 class="text-primary font-weight-bold m-0">EDIT AKUN GURU</h5>
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
        <?php $data = $akunGuru->where('nip', $_GET['nip'])->first(); ?>
        <form action="<?= base_url('/admin/val_edit_akunguru') ?>" method="post">
            <!-- Id -->
            <input type="text" class="form-control" name="id" id="id" value="<?= $data['id'] ?>" hidden>

            <!-- Nip -->
            <div class="form-group">
                <label for="nip">NIP</label>
                <input type="text" class="form-control" name="nip" id="nip" value="<?= $data['nip'] ?>" readonly>
            </div>

            <!-- Username -->
            <div class="form-group">
                <label for="username">USERNAME</label>
                <input type="text" class="form-control" name="username" id="username" value="<?= $data['username'] ?>">
            </div>

            <!-- Password -->
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="password">PASSWORD</label>
                        <input type="password" class="form-control" name="password" id="password">
                        <small class="form-text text-muted">Jika password tidak akan diganti, kosongkan aja!</small>
                    </div>
                    <div class="col-md-6">
                        <label for="password">KONFIRMASI PASSWORD</label>
                        <input type="password" class="form-control" name="konfirmasi_password" id="konfirmasi_password">
                    </div>
                </div>
            </div>

            <!-- Status Guru -->
            <div class="form-group">
                <label for="jenis_kelamin">JENIS AKUN</label>
                <select class="form-control" name="jenis_akun" id="jenis_akun">
                    <option <?= ($data['jenis_akun'] == 'Kepala Sekolah') ? 'Selected' : ''; ?>>Kepala Sekolah</option>
                    <option <?= ($data['jenis_akun'] == 'Guru') ? 'Selected' : ''; ?>>Guru</option>
                </select>
            </div>

            <!-- Status Guru -->
            <div class="form-group">
                <label for="jenis_kelamin">STATUS AKUN</label>
                <select class="form-control" name="status_akun" id="status_akun">
                    <option <?= ($data['status_akun'] == 'Aktif') ? 'selected' : ''; ?>>Aktif</option>
                    <option <?= ($data['status_akun'] == 'Tidak Aktif') ? 'selected' : ''; ?>>Tidak Aktif</option>
                </select>
            </div>
    </div>
    <input type="submit" class="btn btn-primary btn-block mt-4" value="Simpan Data">
    </form>
</div>
</div>
<?= $this->endSection(); ?>