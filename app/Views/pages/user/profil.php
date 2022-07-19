<?= $this->extend('layout/template_table'); ?>

<?= $this->section('content'); ?>

<?php

$data = $siswa->where('nisn', $nisn)->first();
?>
<div class="card mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Profil Siswa</h6>
    </div>
    <div class="card-body">
        <div class="card border-left-primary shadow h-100 py-2 pl-2 mb-2">
            <h1 class="h4">Catatan :</h1>
            Jika ada kesalahan data bisa hubungi guru kelas.
        </div>
        <div class="text-center">
            <div class="row">
                <div class="col-md-10 ml-5">
                    <img src="<?= base_url('/img') . "/" . $data['foto_siswa']; ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                    <h5 class="my-3"><?= $data['nama']; ?></h5>
                </div>
            </div>
        </div>

        <!-- Data Diri -->
        <h4 class="mb-2"><u>Data Diri</u></h4>
        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0">Nomor Induk Siswa Nasional</p>
            </div>
            <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $data['nisn']; ?></p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0">Nomor Induk Siswa</p>
            </div>
            <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $data['nis']; ?></p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0">Nama Lengkap</p>
            </div>
            <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $data['nama']; ?></p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0">Tempat Tanggal Lahir</p>
            </div>
            <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $data['tempat_lahir'] . ", " . date("d-m-Y", strtotime($data['tanggal_lahir'])); ?></p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0">Jenis Kelamin</p>
            </div>
            <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $data['jenis_kelamin']; ?></p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0">Agama</p>
            </div>
            <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $data['agama']; ?></p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0">Alamat Siswa</p>
            </div>
            <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $data['alamat_siswa']; ?></p>
            </div>
        </div>
        <hr>

        <!-- Data Orang Tua -->
        <h4 class="mt-4 mb-2"><u>Data Orang Tua</u></h4>
        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0">Nama Ayah</p>
            </div>
            <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $data['nama_ayah']; ?></p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0">Nama Ibu</p>
            </div>
            <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $data['nama_ibu']; ?></p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0">Nama Orang Tua Wali</p>
            </div>
            <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $data['nama_orang_tua_wali']; ?></p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0">Pekerjaan Ayah</p>
            </div>
            <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $data['Pekerjaan_ayah']; ?></p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0">Pekerjaan Ibu</p>
            </div>
            <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $data['pekerjaan_ibu']; ?></p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0">Alamat</p>
            </div>
            <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $data['alamat_orang_tua']; ?></p>
            </div>
        </div>
        <hr>
    </div>
</div>
<?= $this->endSection(''); ?>