<!-- Awal Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Icon sidebar -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('/admin') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SDN 2 Kersanagara</div>
    </a>

    <!-- Sidebar pembagi -->
    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item <?php if ($title == 'Dashboard') echo 'active'; ?>">
        <a class="nav-link" href="<?= base_url('/admin') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Sidebar pembagi -->
    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        FITUR ADMINISTRATOR
    </div>

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#akun" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Akun</span>
        </a>
        <div id="akun" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('/admin/akun_guru') ?>">Akun Guru</a>
                <a class="collapse-item" href="<?= base_url('/admin/akun_siswa') ?>">Akun Siswa</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#data" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Data</span>
        </a>
        <div id="data" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('') ?>">Sekolah</a>
                <a class="collapse-item" href="<?= base_url('') ?>">Guru</a>
                <a class="collapse-item" href="<?= base_url('') ?>">Siswa</a>
                <a class="collapse-item" href="<?= base_url('') ?>">Mata Pelajaran</a>
                <a class="collapse-item" href="<?= base_url('') ?>">Kelas</a>
                <a class="collapse-item" href="<?= base_url('') ?>">Ekstrakulikuler</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#aktifitas_sekolah" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Aktifitas Sekolah</span>
        </a>
        <div id="aktifitas_sekolah" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('') ?>">Tahun Ajaran</a>
                <a class="collapse-item" href="<?= base_url('') ?>">Siswa Kelas Dan Absensi</a>
                <a class="collapse-item" href="<?= base_url('') ?>">Siswa Eskul</a>
            </div>
        </div>
    </li>

    <!-- Sidebar pembagi -->
    <hr class="sidebar-divider">

    <!-- Heading Akun -->
    <div class="sidebar-heading">
        FITUR GURU
    </div>

    <!-- Data -->


    <!-- Perkecil dan perluas sidebar -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- Akhir Sidebar -->