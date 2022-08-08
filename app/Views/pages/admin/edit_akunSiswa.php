<?= $this->extend('layout/template_table'); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header m-0">
        <h5 class="text-primary font-weight-bold m-0">EDIT AKUN SISWA</h5>
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
        <?php
        $inpSiswa = $akunSiswa->where('nisn', $nisn)->first();
        ?>
        <form action="<?= base_url('/admin/val_edit_akunsiswa') ?>" method="post">
            <!-- NISN -->
            <div class="form-group">
                <label for="nisn">NISN</label>
                <input type="text" class="form-control" name="nisn" id="nisn" placeholder="Masukan nisn" value="<?= $inpSiswa['nisn'] ?>" readonly>
            </div>

            <!-- NAMA -->
            <div class="form-group">
                <label for="username">USERNAME</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Masukan username" value="<?= $inpSiswa['username'] ?>">
            </div>

            <div class="row">
                <div class="col-md-6">
                    <!-- PASSWORD -->
                    <div class="form-group">
                        <label for="username">PASSWORD</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Masukan password" value="">
                        <small class="form-text text-muted">Jika password tidak akan diganti, kosongkan aja!</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- KONFIRMASI PASSWORD -->
                    <div class="form-group">
                        <label for="username">KONFIRMASI PASSWORD</label>
                        <input type="password" class="form-control" name="konfirmasi_password" id="konfirmasi_password" placeholder="Masukan konfirmasi password" value="">
                    </div>
                </div>
            </div>
            <!-- KONFIRMASI PASSWORD -->
            <div class="form-group">
                <label for="aspek">STATUS AKUN</label>
                <select class="form-control" name="status_akun" id="status_akun">
                    <option value="Aktif" <?= ($inpSiswa['status_akun'] == 'Aktif') ? 'Selected' : ''; ?>>Aktif</option>
                    <option value="Tidak Aktif" <?= ($inpSiswa['status_akun'] == 'Tidak Aktif') ? 'Selected' : ''; ?>>Tidak Aktif</option>
                </select>
            </div>
            <div class="form-group mt-2">
                <input type="submit" class="btn btn-primary btn-block" value="Simpan Data">
            </div>
        </form>

    </div>
</div>
<?= $this->endSection(); ?>