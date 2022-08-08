<?= $this->extend('layout/template_table'); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <h5 class="text-primary font-weight-bold text-center m-0">Data Sekolah</h5>
    </div>
    <div class="card-body">
        <!-- NSS DAN NPSN -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nip">NSS</label>
                    <input type="text" class="form-control" value="" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nip">NPSN</label>
                    <input type="text" class="form-control" value="" readonly>
                </div>
            </div>
        </div>

        <!-- NAMA SEKOLAH -->
        <div class="form-group">
            <label for="nip">NAMA SEKOLAH</label>
            <input type="text" class="form-control" value="" readonly>
        </div>

        <!-- ALAMAT -->
        <div class="form-group">
            <label for="nip">ALAMAT</label>
            <textarea class="form-control" cols="30" rows="3" readonly></textarea>
        </div>

        <!-- KELURAHAN, KECAMATAN, KOTA, PROVINSI -->
        <div class="row">
            <div class="col-md-3">
                <!-- KELURAHAN -->
                <div class="form-group">
                    <label for="nip">KELURAHAN</label>
                    <input type="text" class="form-control" value="" readonly>
                </div>
            </div>
            <div class="col-md-3">
                <!-- KECAMATAN -->
                <div class="form-group">
                    <label for="nip">KECAMATAN</label>
                    <input type="text" class="form-control" value="" readonly>
                </div>
            </div>
            <div class="col-md-3">
                <!-- KOTA -->
                <div class="form-group">
                    <label for="nip">KOTA</label>
                    <input type="text" class="form-control" value="" readonly>
                </div>
            </div>
            <div class="col-md-3">
                <!-- PROVINSI -->
                <div class="form-group">
                    <label for="nip">PROVINSI</label>
                    <input type="text" class="form-control" value="" readonly>
                </div>
            </div>
        </div>

        <!-- WEBSITE, EMAIL -->
        <div class="row">
            <div class="col-md-6">
                <!-- WEBSITE -->
                <div class="form-group">
                    <label for="nip">WEBSITE</label>
                    <input type="text" class="form-control" value="" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <!-- EMAIL -->
                <div class="form-group">
                    <label for="nip">EMAIL</label>
                    <input type="text" class="form-control" value="" readonly>
                </div>
            </div>
        </div>
        <a href="" class="btn btn-primary float-right">EDIT DATA SEKOLAH</a>
    </div>
</div>
<?= $this->endSection(''); ?>