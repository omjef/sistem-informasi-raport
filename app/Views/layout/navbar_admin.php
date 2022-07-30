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

    <!-- Heading Akun -->
    <div class="sidebar-heading">
        Guru Dan Siswa
    </div>

    <!-- Data -->
    <li class="nav-item <?php if ($title == 'Tambah Akun Guru' || $title == 'Lihat Akun Guru') echo 'active'; ?>">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#akun_guru" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Guru</span>
        </a>
        <div id="akun_guru" class="collapse <?php if ($title == 'Lihat Data Guru' || $title == 'Lihat Akun Guru') echo 'show'; ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?php if ($title == 'Lihat Akun Guru') echo 'active'; ?>" href="<?= base_url('/admin/lihat_akun_guru') ?>">Lihat Akun Guru</a>
                <a class="collapse-item <?php if ($title == 'Lihat Data Guru') echo 'active'; ?>" href="<?= base_url('/admin/lihat_data_guru') ?>">Lihat Data Guru</a>
            </div>
        </div>
    </li>

    <li class="nav-item <?php if ($title == 'Tambah Akun Siswa' || $title == 'Lihat Akun Siswa') echo 'active'; ?>">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#akun_siswa" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Siswa</span>
        </a>
        <div id="akun_siswa" class="collapse <?php if ($title == 'Tambah Akun Siswa' || $title == 'Lihat Akun Siswa') echo 'show'; ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?php if ($title == 'Tambah Akun Siswa') echo 'active'; ?>" href="<?= base_url('/admin/tambah_akun_siswa') ?>">Tambah Akun Siswa</a>
                <a class="collapse-item <?php if ($title == 'Lihat Akun Siswa') echo 'active'; ?>" href="<?= base_url('/admin/lihat_akun_siswa') ?>">Lihat Akun Siswa</a>
            </div>
        </div>
    </li>

    <!-- Sidebar pembagi -->
    <hr class="sidebar-divider">

    <!-- Heading Akun -->
    <div class="sidebar-heading">
        Data Guru Dan Siswa
    </div>

    <!-- Data -->


    <!-- Perkecil dan perluas sidebar -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- Akhir Sidebar -->