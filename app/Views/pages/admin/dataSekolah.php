<?= $this->extend('layout/template_table'); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <h5 class="text-primary font-weight-bold text-center m-0">Data Sekolah</h5>
    </div>
    <div class="card-body">
        <?php $sekolah = $dataSekolah->where('nss', '101327806004')->first() ?>
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
        <!-- NSS DAN NPSN -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nip">NSS</label>
                    <input type="text" class="form-control" value="<?= $sekolah['nss'] ?>" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nip">NPSN</label>
                    <input type="text" class="form-control" value="<?= $sekolah['npsn'] ?>" readonly>
                </div>
            </div>
        </div>

        <!-- NAMA SEKOLAH -->
        <div class="form-group">
            <label for="nip">NAMA SEKOLAH</label>
            <input type="text" class="form-control" value="<?= $sekolah['nama'] ?>" readonly>
        </div>

        <!-- ALAMAT -->
        <div class="form-group">
            <label for="nip">ALAMAT</label>
            <textarea class="form-control" cols="30" rows="3" readonly><?= $sekolah['alamat'] ?></textarea>
        </div>

        <!-- KELURAHAN, KECAMATAN, KOTA, PROVINSI -->
        <div class="row">
            <div class="col-md-3">
                <!-- KELURAHAN -->
                <div class="form-group">
                    <label for="nip">KELURAHAN</label>
                    <input type="text" class="form-control" value="<?= $sekolah['kelurahan'] ?>" readonly>
                </div>
            </div>
            <div class="col-md-3">
                <!-- KECAMATAN -->
                <div class="form-group">
                    <label for="nip">KECAMATAN</label>
                    <input type="text" class="form-control" value="<?= $sekolah['kecamatan'] ?>" readonly>
                </div>
            </div>
            <div class="col-md-3">
                <!-- KOTA -->
                <div class="form-group">
                    <label for="nip">KOTA</label>
                    <input type="text" class="form-control" value="<?= $sekolah['kota'] ?>" readonly>
                </div>
            </div>
            <div class="col-md-3">
                <!-- PROVINSI -->
                <div class="form-group">
                    <label for="nip">PROVINSI</label>
                    <input type="text" class="form-control" value="<?= $sekolah['provinsi'] ?>" readonly>
                </div>
            </div>
        </div>

        <!-- WEBSITE, EMAIL -->
        <div class="row">
            <div class="col-md-6">
                <!-- WEBSITE -->
                <div class="form-group">
                    <label for="nip">WEBSITE</label>
                    <input type="text" class="form-control" value="<?= $sekolah['website'] ?>" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <!-- EMAIL -->
                <div class="form-group">
                    <label for="nip">EMAIL</label>
                    <input type="text" class="form-control" value="<?= $sekolah['email'] ?>" readonly>
                </div>
            </div>
        </div>
        <a href="<?= base_url('/admin/edit_datasekolah?' . 'nss=' . $sekolah['nss']) ?>" class="btn btn-primary float-right">EDIT DATA SEKOLAH</a>
    </div>
</div>
<?= $this->endSection(''); ?>