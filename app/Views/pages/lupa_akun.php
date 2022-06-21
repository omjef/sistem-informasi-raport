<?= $this->extend('layout/template_auth'); ?>

<?= $this->section('content'); ?>
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-6 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-2">Lupa Password?</h1>
                                    <p class="mb-4">Hubungi operator sekolah untuk mengganti password!!</p>
                                    <a href="">Hubungi</a>
                                </div>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url(); ?>">Sudah memiliki akun? Login!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
<?= $this->endSection(''); ?>