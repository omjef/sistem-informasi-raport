<?= $this->extend('layout/template_table') ?>

<?= $this->Section('content') ?>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h5 class="text-primary font-weight-bold m-0 mt-2">Data Guru</h5>
            </div>
            <div class="col-md-6">
                <a href="/admin/tambah_dataguru" class="btn btn-primary float-right"><i class="fa fa-plus"></i></a>
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
                        <th>IJAZAH</th>
                        <th>TAHUN IJAZAH</th>
                        <th>JENIS GURU</th>
                        <th>TANGGAL DANGKAT</th>
                        <th>TANGGAL BEKERJA DISINI</th>
                        <th>TANGGAL PENSIUN</th>
                        <th>KELAS DIAMPU</th>
                        <th>JAM MENGAJAR</th>
                        <th>FOTO GURU</th>
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
                        <th>IJAZAH</th>
                        <th>TAHUN IJAZAH</th>
                        <th>JENIS GURU</th>
                        <th>TANGGAL DANGKAT</th>
                        <th>TANGGAL BEKERJA DISINI</th>
                        <th>TANGGAL PENSIUN</th>
                        <th>KELAS DIAMPU</th>
                        <th>JAM MENGAJAR</th>
                        <th>FOTO GURU</th>
                        <th>#</th>
                    </tr>
                </tfoot>

                <body>
                    <?php foreach ($dataGuru->find() as $data) : ?>
                        <tr>
                            <td><?= $data['nip'] ?></td>
                            <td><?= $data['nuptk'] ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['tempat_lahir'] . ', ' . date("d-m-Y", strtotime($data['tanggal_lahir'])) ?></td>
                            <td><?= $data['jenis_kelamin'] ?></td>
                            <td><?= $data['agama'] ?></td>
                            <td><?= $data['ijazah'] ?></td>
                            <td><?= $data['tahun_ijazah'] ?></td>
                            <td><?= $data['jenis_guru'] ?></td>
                            <td><?= $data['tanggal_diangkat'] ?></td>
                            <td><?= $data['tanggal_bekerja'] ?></td>
                            <td><?= $data['tanggal_pensiun'] ?></td>
                            <td><?= $data['kelas_diampu'] ?></td>
                            <td><?= $data['jam_mengajar'] ?></td>
                            <td><img src="/img/<?= $data['foto_guru'] ?>" alt="" class="rounded img-thumbnail"></td>
                            <td><a href="<?= base_url('admin/edit_data_guru') . "?nip=$data[nip]" ?>" class="fa fa-edit"></a></td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                </body>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>