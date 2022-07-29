<?= $this->extend('layout/template_table'); ?>

<?= $this->section('content'); ?>
<!-- Card -->
<div class="card">
    <div class="card-header">
        <h6 class=" text-primary font-weight-bold m-0">Tambah Akun Guru</h6>
    </div>
    <div class="card-body">
        <form action="<?= base_url('/admin/validasi_tambah_akun_guru') ?>" method="post">
            <!-- Nip -->
            <div class="form-group">
                <label for="nip">Nip</label>
                <input type="text" class="form-control" name="nip" id="nip" aria-describedby="emailHelp" placeholder="Masukan nip">
            </div>

            <!-- Username -->
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp" placeholder="Masukan username">
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" aria-describedby="emailHelp" placeholder="Masukan password">
            </div>

            <input type="submit" class="btn btn-primary btn-block mt-4" value="Simpan Data">
        </form>
    </div>
</div>
<!-- Akhir card -->
<?= $this->endSection(''); ?>