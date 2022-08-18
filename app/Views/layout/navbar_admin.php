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
        RUANG ADMIN
    </div>

    <li class="nav-item <?= ($title == 'Kelola Akun Guru' || $title == 'Kelola Akun Siswa') ? 'active' : ''; ?>">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#akun" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Akun</span>
        </a>
        <div id="akun" class="collapse <?= ($title == 'Kelola Akun Guru' || $title == 'Kelola Akun Siswa') ? 'show' : ''; ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?= ($title == 'Kelola Akun Guru') ? 'active' : ''; ?>" href="<?= base_url('/admin/akun_guru') ?>">Kelola Akun Guru</a>
                <a class="collapse-item <?= ($title == 'Kelola Akun Siswa') ? 'active' : ''; ?>" href="<?= base_url('/admin/akun_siswa') ?>">Kelola Akun Siswa</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        RUANG OPERATOR
    </div>

    <li class="nav-item <?= ($title == 'Data Sekolah' || $title == 'Data Guru' || $title == 'Data Siswa' || $title == 'Data Mata Pelajaran' || $title == 'Data Kelas' || $title == 'Data Ekstrakulikuler') ? 'active' : ''; ?>">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#data" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Data</span>
        </a>
        <div id="data" class="collapse <?= ($title == 'Data Sekolah' || $title == 'Data Guru' || $title == 'Data Siswa' || $title == 'Data Mata Pelajaran' || $title == 'Data Kelas' || $title == 'Data Ekstrakulikuler') ? 'show' : ''; ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?= ($title == 'Data Sekolah') ? 'active' : ''; ?>" href="<?= base_url('/admin/data_sekolah') ?>">Data Sekolah</a>
                <a class="collapse-item <?= ($title == 'Data Guru') ? 'active' : ''; ?>" href="<?= base_url('/admin/data_guru') ?>">Data Guru</a>
                <a class="collapse-item <?= ($title == 'Data Siswa') ? 'active' : ''; ?>" href="<?= base_url('/admin/data_siswa') ?>">Data Siswa</a>
                <a class="collapse-item <?= ($title == 'Data Mata Pelajaran') ? 'active' : ''; ?>" href="<?= base_url('/admin/data_mapel') ?>">Data Mata Pelajaran</a>
                <a class="collapse-item <?= ($title == 'Data Kelas') ? 'active' : ''; ?>" href="<?= base_url('/admin/data_kelas') ?>">Data Kelas</a>
                <a class="collapse-item <?= ($title == 'Data Ekstrakulikuler') ? 'active' : ''; ?>" href="<?= base_url('/admin/data_eskul') ?>">Data Ekstrakulikuler</a>
            </div>
        </div>
    </li>

    <li class="nav-item <?= ($title == 'Data Tahun Ajaran' || $title == 'Data Siswa Perkelas' || $title == 'Data Siswa Pereskul') ? 'active' : ''; ?>">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#aktifitas_sekolah" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Aktifitas Sekolah</span>
        </a>
        <div id="aktifitas_sekolah" class="collapse <?= ($title == 'Data Tahun Ajaran' || $title == 'Data Siswa Perkelas' || $title == 'Data Siswa Pereskul') ? 'show' : ''; ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?= ($title == 'Data Tahun Ajaran') ? 'active' : ''; ?>" href="<?= base_url('/admin/data_ta') ?>">Data Tahun Ajaran</a>
                <a class="collapse-item <?= ($title == 'Data Siswa Perkelas') ? 'active' : ''; ?>" href="<?= base_url('/admin/data_siswakelas') ?>">Data Siswa Perkelas</a>
                <a class="collapse-item <?= ($title == 'Data Siswa Pereskul') ? 'active' : ''; ?>" href="<?= base_url('/admin/data_siswaeskul') ?>">Data Siswa Per Eskul</a>
            </div>
        </div>
    </li>

    <!-- Sidebar pembagi -->
    <hr class="sidebar-divider">

    <!-- Heading Akun -->
    <div class="sidebar-heading">
        RUANG GURU
    </div>

    <li class="nav-item <?= ($title == 'Nilai Siswa') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('/admin/input_nilai_siswa') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Nilai Siswa</span></a>
    </li>

    <li class="nav-item <?= ($title == 'Absensi Siswa') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('/admin/input_absensi_siswa') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Absensi Siswa</span></a>
    </li>

    <li class="nav-item <?= ($title == 'Nilai Eskul Siswa') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('/admin/input_nilai_eskul') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Nilai Eskul Siswa</span></a>
    </li>
    <!-- Data -->


    <!-- Perkecil dan perluas sidebar -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- Akhir Sidebar -->