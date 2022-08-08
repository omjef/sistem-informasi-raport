<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>

    <!-- CSS Font -->
    <link href="<?= basename(''); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- CSS Template -->
    <link href="<?= basename(''); ?>/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- CSS Data Tables -->
    <link href="<?= basename(''); ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Pembungkus -->
    <div id="wrapper">
        <!-- Tampil Sidebar -->
        <?php if (session()->get('logged_in') == 'user') : ?>
            <?= $this->include('layout/navbar_user'); ?>
        <?php elseif (session()->get('logged_in') == 'admin') : ?>
            <?= $this->include('layout/navbar_admin'); ?>
        <?php endif ?>
        <!-- Akhir Sidebar -->

        <!-- Konten Pembungkus -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Konten -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <ul class="navbar-nav ml-auto">
                        <?php if (session()->get('logged_in') == 'user') : ?>
                            <?php $profil = base_url('/user/profil'); ?>
                        <?php elseif (session()->get('logged_in') == 'admin') : ?>
                            <?php $profil = base_url('/admin/profil'); ?>
                        <?php endif ?>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $nama; ?></span>
                                <img class="img-profile rounded-circle" src="<?= base_url('/img/default.jpg'); ?>">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= $profil; ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>

                            <!-- Alert Logout -->
                            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin mau keluar?</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">Pilih "Keluar" di bawah jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                            <a class="btn btn-primary" href="<?= base_url('/auth/logout'); ?>">Keluar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Akhir Alert Logout -->
                        </li>
                    </ul>
                </nav>
                <!-- Akhir Topbar -->

                <!-- Tampil Konten -->
                <div class="container-fluid">
                    <?= $this->renderSection('content'); ?>
                </div>
                <!-- Akhir Tampil Konten -->

            </div>
            <!-- Akhir Konten -->
        </div>
        <!-- AKhir Konten Pembungkus -->
    </div>
    <!-- Akhir Page Pembungkus -->

    <!-- Bootstrap core JavaScript-->
    <script src="<?= basename(''); ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= basename(''); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= basename(''); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= basename(''); ?>/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= basename(''); ?>/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= basename(''); ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= basename(''); ?>/js/demo/datatables-demo.js"></script>

</body>

</html>