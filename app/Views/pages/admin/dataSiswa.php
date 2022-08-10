<?= $this->extend('layout/template_table') ?>

<?= $this->Section('content') ?>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h5 class="text-primary font-weight-bold m-0 mt-2">Data Siswa</h5>
            </div>
            <div class="col-md-6">
                <a href="/admin/tambah_datasiswa" class="btn btn-primary float-right"><i class="fa fa-plus"></i></a>
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
                        <th>NISN</th>
                        <th>NIS</th>
                        <th>NAMA</th>
                        <th>TEMPAT TANGGAL LAHIR</th>
                        <th>JENIS KELAMIN</th>
                        <th>AGAMA</th>
                        <th>PENDIDIKAN SEBELUMNYA</th>
                        <th>ALAMAT</th>
                        <th>NAMA AYAH</th>
                        <th>NAMA IBU</th>
                        <th>PEKERJAAN AYAH</th>
                        <th>PEKERJAAN IBU</th>
                        <th>ALAMAT ORANG TUA</th>
                        <th>TAHUN MENDAFTAR</th>
                        <th>STATUS SISWA</th>
                        <th>FOTO SISWA</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tfoot class="text-center">
                    <tr>
                        <th>NISN</th>
                        <th>NIS</th>
                        <th>NAMA</th>
                        <th>TEMPAT TANGGAL LAHIR</th>
                        <th>JENIS KELAMIN</th>
                        <th>AGAMA</th>
                        <th>PENDIDIKAN SEBELUMNYA</th>
                        <th>ALAMAT</th>
                        <th>NAMA AYAH</th>
                        <th>NAMA IBU</th>
                        <th>PEKERJAAN AYAH</th>
                        <th>PEKERJAAN IBU</th>
                        <th>ALAMAT ORANG TUA</th>
                        <th>TAHUN MENDAFTAR</th>
                        <th>STATUS SISWA</th>
                        <th>FOTO SISWA</th>
                        <th>#</th>
                    </tr>
                </tfoot>

                <body>
                    <?php foreach ($dataSiswa->find() as $data) : ?>
                        <tr>
                            <td><?= $data['nisn'] ?></td>
                            <td><?= $data['nis'] ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['tempat_lahir'] . ', ' . date("d-m-Y", strtotime($data['tanggal_lahir'])) ?></td>
                            <td><?= $data['jenis_kelamin'] ?></td>
                            <td><?= $data['agama'] ?></td>
                            <td><?= $data['pendidikan_sebelum'] ?></td>
                            <td><?= $data['alamat'] ?></td>
                            <td><?= $data['nama_ayah'] ?></td>
                            <td><?= $data['nama_ibu'] ?></td>
                            <td><?= $data['pekerjaan_ayah'] ?></td>
                            <td><?= $data['pekerjaan_ibu'] ?></td>
                            <td><?= $data['alamat_orang_tua'] ?></td>
                            <td><?= $data['tahun_mendaftar'] ?></td>
                            <td><?= $data['status_siswa'] ?></td>
                            <td><img src="/img/<?= $data['foto_siswa'] ?>" alt="" class="rounded img-thumbnail"></td>
                            <td><a href="<?= base_url('admin/edit_datasiswa') . "?nisn=$data[nisn]" ?>" class="fa fa-edit"></a></td>
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