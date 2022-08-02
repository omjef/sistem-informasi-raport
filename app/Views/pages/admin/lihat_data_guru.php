<?= $this->extend('layout/template_table'); ?>

<?= $this->section('content'); ?>
<!-- Card -->
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6 mt-2">
                <h6 class="text-primary font-weight-bold m-0">Data Guru</h6>
            </div>
            <div class="col-md-6">
                <a href="#" data-toggle="modal" class="btn btn-primary float-right" data-target="#akunGuru">
                    <i class="fa fa-plus"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
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
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="text-center">
                    <tr>
                        <th>NIP</th>
                        <th>NUPTK</th>
                        <th>NAMA</th>
                        <th>TEMPAT TANGGAL LAHIR</th>
                        <th>JENIS KELAMIN</th>
                        <th>AGAMA</th>
                        <th>IJAZAH DAN TAHUN IJAZAH</th>
                        <th>JENIS GURU</th>
                        <th>TANGGAL DI ANGKAT</th>
                        <th>MULAI BEKERJA DISEKOLAH INI</th>
                        <th>PENSIUN</th>
                        <th>MENGAJAR DIKELAS</th>
                        <th>JUMLAH JAM MENGAJAR</th>
                        <th>FOTO</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tfoot class="text-center">
                    <tr>
                        <th>NIP</th>
                        <th>NUPTK</th>
                        <th>NAMA</th>
                        <th>TEMPAT TANGGAL LAHIR</th>
                        <th>JENIS KELAMIN</th>
                        <th>AGAMA</th>
                        <th>IJAZAH DAN TAHUN IJAZAH</th>
                        <th>JENIS GURU</th>
                        <th>TANGGAL DI ANGKAT</th>
                        <th>MULAI BEKERJA DISEKOLAH INI</th>
                        <th>PENSIUN</th>
                        <th>MENGAJAR DIKELAS</th>
                        <th>JUMLAH JAM MENGAJAR</th>
                        <th>FOTO</th>
                        <th>#</th>
                    </tr>
                </tfoot>

                <body>
                    <?php
                    $data = $akun->find();
                    foreach ($data as $data) :
                    ?>
                        <tr>
                            <td><?= $data['nip'] ?></td>
                            <td><?= $data['nuptk'] ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['tempat_lahir'] . " / " . date("d-m-Y", strtotime($data['tanggal_lahir'])); ?></td>
                            <td><?= $data['jenis_kelamin'] ?></td>
                            <td><?= $data['agama'] ?></td>
                            <td><?= $data['ijazah'] . " / " . $data['tahun_ijazah'] ?></td>
                            <td><?= $data['jenis_guru'] ?></td>
                            <td><?= date("d-m-Y", strtotime($data['tanggal_angkatan'])) ?></td>
                            <td><?= date("d-m-Y", strtotime($data['mulai_bekerja_disekolah'])) ?></td>
                            <td><?= date("d-m-Y", strtotime($data['tmt_masa_pensiun'])) ?></td>
                            <td><?= $data['mengajar_dikelas'] ?></td>
                            <td><?= $data['jumlah_jam_mengajar'] ?></td>
                            <td class="text-center"><img style="width: 55px; height: 60px;" src="<?= base_url('/img') . "/" . $data['foto_guru'] ?>" alt=""></td>
                            <td class="text-center">
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="<?= base_url('admin/edit_akun_guru?') . "nip=$data[nip]" ?>" class="fa fa-edit"></a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="" class="fa fa-trash"></a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                </body>
            </table>
        </div>
    </div>
</div>
<!-- Akhir card -->

<!-- Tambah akun guru -->
<div class="modal fade" id="akunGuru" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Guru</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('/admin/validasi_tambah_akun_guru') ?>" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- NIP -->
                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="text" class="form-control" name="nip" id="nip" placeholder="Masukan nip">
                            </div>

                            <!-- NUPTK -->
                            <div class="form-group">
                                <label for="nuptk">NUPTK</label>
                                <input type="text" class="form-control" name="nuptk" id="nuptk" placeholder="Masukan nuptk">
                            </div>

                            <!-- NAMA -->
                            <div class="form-group">
                                <label for="nama">NAMA</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan nama guru">
                            </div>

                            <!-- TEMPAT LAHIR -->
                            <div class="form-group">
                                <label for="tempat_lahir">TEMPAT LAHIR</label>
                                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Masukan tempat lahir">
                            </div>

                            <!-- TANGGAL LAHIR -->
                            <div class="form-group">
                                <label for="tanggal_lahir">TANGGAL LAHIR</label>
                                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir">
                            </div>

                            <!-- JENIS KELAMIN -->
                            <div class="form-group">
                                <label for="jenis_kelamin">JENIS KELAMIN</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="Laki-laki">
                                    <label class="form-check-label" for="laki-laki">
                                        Laki-laki
                                    </label>
                                    <input class="form-check-input ml-4" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan">
                                    <label class="form-check-label ml-5" for="perempuan">
                                        Perempuan
                                    </label>
                                </div>
                            </div>

                            <!-- AGAMA -->
                            <div class="form-group">
                                <label for="agama">AGAMA</label>
                                <input type="text" class="form-control" name="agama" id="agama" placeholder="Masukan agama">
                            </div>

                            <!-- IJAZAH -->
                            <div class="form-group">
                                <label for="ijazah">IJAZAH</label>
                                <input type="text" class="form-control" name="ijazah" id="ijazah" placeholder="Masukan ijazah">
                            </div>

                            <!-- TAHUN IJAZAH -->
                            <div class="form-group">
                                <label for="tahun_ijazah">TAHUN IJAZAH</label>
                                <input type="date" class="form-control" name="tahun_ijazah" id="tahun_ijazah">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- JENIS GURU -->
                            <div class="form-group">
                                <label for="jenis_guru">JENIS GURU</label>
                                <select class="form-control" aria-label="Default select example" name="jenis_guru" id="jenis_guru">
                                    <option selected>-- Masukan jenis guru --</option>
                                    <option value="Kepala Sekolah">Kepala Sekolah</option>
                                    <option value="Guru Kelas">Guru Kelas</option>
                                    <option value="Guru PAI">Guru PAI</option>
                                    <option value="Guru PJOK">Guru PJOK</option>
                                </select>
                            </div>

                            <!-- TANGGAL DIANGKAT -->
                            <div class="form-group">
                                <label for="tanggal_angkatan">TANGGAL DIANGKAT</label>
                                <input type="date" class="form-control" name="tanggal_angkatan" id="tanggal_angkatan">
                            </div>

                            <!-- TANGGAL MULAI MENGAJAR DISEKOLAH INI -->
                            <div class="form-group">
                                <label for="mulai_bekerja_disekolah">TANGGAL MULAI MENGAJAR DISEKOLAH INI</label>
                                <input type="date" class="form-control" name="mulai_bekerja_disekolah" id="mulai_bekerja_disekolah">
                            </div>

                            <!-- TANGGAL PENSIUN -->
                            <div class="form-group">
                                <label for="tmt_masa_pensiun">TANGGAL PENSIUN</label>
                                <input type="date" class="form-control" name="tmt_masa_pensiun" id="tmt_masa_pensiun" placeholder="Masukan nama guru">
                            </div>

                            <!-- MENGAJAR DIKELAS -->
                            <div class="form-group">
                                <label for="mengajar_dikelas">MENGAJAR DIKELAS</label>
                                <select class="form-control" name="mengajar_dikelas" id="mengajar_dikelas">
                                    <option selected>-- Masukan Kelas Yang Diampu --</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="Semua Kelas">Semua Kelas</option>
                                </select>
                            </div>

                            <!-- JUMLAH JAM MENGAJAR -->
                            <div class="form-group">
                                <label for="nama">JUMLAH JAM MENGAJAR</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan nama guru">
                            </div>

                            <!-- FOTO -->
                            <div class="form-group">
                                <label for="foto_guru">FOTO GURU</label>
                                <input type="file" class="form-control" name="foto_guru" id="foto_guru">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Simpan Data">
                <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Akhir tambah akun guru -->
<?= $this->endSection(''); ?>