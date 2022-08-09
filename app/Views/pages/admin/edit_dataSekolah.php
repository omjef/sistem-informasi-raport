<?= $this->extend('layout/template_table'); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <h5 class="text-primary font-weight-bold text-center m-0">Edit Data Sekolah</h5>
    </div>
    <div class="card-body">
        <?php $sekolah = $dataSekolah->where('nss', '101327806004')->first() ?>
        <form action="<?= base_url('/admin/val_edit_datasekolah') ?>" method="post">
            <!-- NSS DAN NPSN -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nip">NSS</label>
                        <input type="text" class="form-control" name="nss" id="nss" value="<?= $sekolah['nss'] ?>" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nip">NPSN</label>
                        <input type="text" class="form-control" name="npsn" id="npsn" value="<?= $sekolah['npsn'] ?>" readonly>
                    </div>
                </div>
            </div>

            <!-- NAMA SEKOLAH -->
            <div class="form-group">
                <label for="nip">NAMA SEKOLAH</label>
                <input type="text" class="form-control" name="nama" id="nama" value="<?= $sekolah['nama'] ?>">
            </div>

            <!-- ALAMAT -->
            <div class="form-group">
                <label for="nip">ALAMAT</label>
                <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="3"><?= $sekolah['alamat'] ?></textarea>
            </div>

            <!-- KELURAHAN, KECAMATAN, KOTA, PROVINSI -->
            <div class="row">
                <div class="col-md-3">
                    <!-- KELURAHAN -->
                    <div class="form-group">
                        <label for="nip">KELURAHAN</label>
                        <input type="text" class="form-control" name="kelurahan" id="kelurahan" value="<?= $sekolah['kelurahan'] ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <!-- KECAMATAN -->
                    <div class="form-group">
                        <label for="nip">KECAMATAN</label>
                        <input type="text" class="form-control" name="kecamatan" id="kecamatan" value="<?= $sekolah['kecamatan'] ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <!-- KOTA -->
                    <div class="form-group">
                        <label for="nip">KOTA</label>
                        <input type="text" class="form-control" name="kota" id="kota" value="<?= $sekolah['kota'] ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <!-- PROVINSI -->
                    <div class="form-group">
                        <label for="nip">PROVINSI</label>
                        <input type="text" class="form-control" name="provinsi" id="provinsi" value="<?= $sekolah['provinsi'] ?>">
                    </div>
                </div>
            </div>

            <!-- WEBSITE, EMAIL -->
            <div class="row">
                <div class="col-md-6">
                    <!-- WEBSITE -->
                    <div class="form-group">
                        <label for="nip">WEBSITE</label>
                        <input type="text" class="form-control" name="website" id="website" value="<?= $sekolah['website'] ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- EMAIL -->
                    <div class="form-group">
                        <label for="nip">EMAIL</label>
                        <input type="text" class="form-control" name="email" id="email" value="<?= $sekolah['email'] ?>">
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-primary btn-block mt-3" value="Simpan Data">
        </form>

    </div>
</div>
<?= $this->endSection(''); ?>