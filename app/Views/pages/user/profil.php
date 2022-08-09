<?= $this->extend('layout/template_table'); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <h5 class="text-primary font-weight-bold text-center m-0">Data Siswa</h5>
    </div>
    <div class="card-body">
        <!-- QUERY TAMPIL DATA -->
        <?php
        $dataSiswa = $dataSiswa->where('nisn', $nisn)->first();
        ?>

        <!-- FOTO DAN NAMA -->
        <div class="form-group text-center">
            <img src="<?= base_url('img/default.jpg') ?>" alt="" class="img-thumbnail rounded-circle">
            <h5 class="font-weight-bold mt-2"><?= $dataSiswa['nama'] ?></h5>
        </div>
        <div class="form-group">
            <h6 class="text-dark font-weight-bold">Data Siswa</h6>
        </div>

        <!-- NISN dan NIS -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>NISN</label>
                    <input type="text" class="form-control" value="<?= $dataSiswa['nisn'] ?>" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>NIS</label>
                    <input type="text" class="form-control" value="<?= $dataSiswa['nis'] ?>" readonly>
                </div>
            </div>
        </div>

        <!-- NAMA -->
        <div class="form-group">
            <label for="NIS">NAMA</label>
            <input type="text" class="form-control" value="<?= $dataSiswa['nama'] ?>" readonly>
        </div>

        <!-- TEMPAT DAN TANGGAL LAHIR -->
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>TEMPAT LAHIR</label>
                    <input type="text" class="form-control" value="<?= $dataSiswa['tempat_lahir'] ?>" readonly>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label>TANGGAL LAHIR</label>
                    <input type="text" class="form-control" value="<?= $dataSiswa['tanggal_lahir'] ?>" readonly>
                </div>
            </div>
        </div>

        <!-- JENIS KELAMIN -->
        <div class="form-group">
            <label>JENIS KELAMIN</label>
            <input type="text" class="form-control" value="<?= $dataSiswa['jenis_kelamin'] ?>" readonly>
        </div>

        <!-- AGAMA DAN PENDIDIKAN SEBELUMNYA -->
        <div class="row">
            <div class="col-md-9">
                <div class="form-group">
                    <label>AGAMA</label>
                    <input type="text" class="form-control" value="<?= $dataSiswa['agama'] ?>" readonly>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>PENDIDIKAN SEBELUMNYA</label>
                    <input type="text" class="form-control" value="<?= $dataSiswa['pendidikan_sebelum'] ?>" readonly>
                </div>
            </div>
        </div>

        <!-- ALAMAT -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>NAMA AYAH</label>
                    <input type="text" class="form-control" value="<?= $dataSiswa['nama_ayah'] ?>" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form--group">
                    <label>PEKERJAAN AYAH</label>
                    <input type="text" class="form-control" value="<?= $dataSiswa['pekerjaan_ayah'] ?>" readonly>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>NAMA IBU</label>
                    <input type="text" class="form-control" value="<?= $dataSiswa['nama_ibu'] ?>" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form--group">
                    <label>PEKERJAAN IBU</label>
                    <input type="text" class="form-control" value="<?= $dataSiswa['pekerjaan_ibu'] ?>" readonly>
                </div>
            </div>
        </div>

        <div class="form--group">
            <label>ALAMAT ORANG TUA</label>
            <textarea class="form-control" cols="30" rows="3" readonly><?= $dataSiswa['alamat_orang_tua'] ?></textarea>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form--group">
                    <label>TAHUN MENDAFTAR</label>
                    <input type="text" class="form-control" value="<?= $dataSiswa['tahun_mendaftar'] ?>" readonly>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form--group">
                    <label>STATUS SISWA</label>
                    <input type="text" class="form-control" value="<?= $dataSiswa['status_siswa'] ?>" readonly>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(''); ?>