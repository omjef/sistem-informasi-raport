<?= $this->extend('layout/template_table'); ?>

<?= $this->section('content'); ?>
<!-- Card -->
<div class="card">
    <div class="card-header">
        <h6 class=" text-primary font-weight-bold m-0">Data Akun Guru</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nip</th>
                        <th>Username</th>
                        <th>Status Akun</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nip</th>
                        <th>Username</th>
                        <th>Status Akun</th>
                        <th>#</th>
                    </tr>
                </tfoot>

                <body>
                    <?php
                    $data = $akun->find();
                    foreach ($data as $data) :
                    ?>
                        <tr>
                            <td><?= $data['id'] ?></td>
                            <td><?= $data['nip'] ?></td>
                            <td><?= $data['username'] ?></td>
                            <td><?php
                                if ($data['is_aktif'] == 1) {
                                    echo "Aktif";
                                } else {
                                    echo "Tidak Aktif";
                                }
                                ?></td>
                            <td><a href="<?= base_url('admin/edit_akun_guru?') . "id=$data[id]&nip=$data[nip]" ?>" class="fa fa-edit mr-3"></a> <a href="" class="fa fa-trash"></a></td>
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
<?= $this->endSection(''); ?>