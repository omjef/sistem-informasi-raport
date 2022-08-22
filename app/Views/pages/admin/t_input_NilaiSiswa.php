<?= $this->extend('layout/template_table'); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <h6 class="text-primary m-0 font-weight-bold">Input Nilai Siswa</h6>
    </div>
    <div class="card-body">
        <?php
        $id_kelas = $_GET['id_kelas'];
        $id_mapel = $_GET['id_mapel'];
        $id_tahun_ajaran = $_GET['id_tahun_ajaran'];

        //NILAI SISWA
        $Nilai = $Nilai->where(['id_kelas' => $id_kelas, 'id_mapel' => $id_mapel, 'id_tahun_ajaran' => $id_tahun_ajaran])->first();
        ?>

        <?php if ($id_kelas == 'K11' or $id_kelas == 'K21' or $id_kelas == 'K31' or $id_kelas == 'P11' or $id_kelas == 'P21' or $id_kelas == 'P31') : ?>
            <form action="<?= base_url('admin/val_input_nilai') ?>" method="post">
                <div class="form-group">
                    <label>NISN SISWA</label>
                    <input type="text" class="form-control" name="nisn" id="nisn" value="<?= $Nilai['nisn'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label>ID MAPEL</label>
                    <input type="text" class="form-control" name="id_mapel" id="id_mapel" value="<?= $Nilai['id_mapel'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label>ID KELAS</label>
                    <input type="text" class="form-control" name="id_kelas" id="id_kelas" value="<?= $Nilai['id_kelas'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label>ID TAHUN AJARAN</label>
                    <input type="text" class="form-control" name="id_tahun_ajaran" id="id_tahun_ajaran" value="<?= $Nilai['id_tahun_ajaran'] ?>" readonly>
                </div>
                <h6 class="font-weight-bold">TEMA 1</h6>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 1</label>
                            <input type="text" class="form-control" name="nilai_1" id="nilai_1" value="<?= $Nilai['nilai_1'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 2</label>
                            <input type="text" class="form-control" name="nilai_2" id="nilai_2" value="<?= $Nilai['nilai_2'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 3</label>
                            <input type="text" class="form-control" name="nilai_3" id="nilai_3" value="<?= $Nilai['nilai_3'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 4</label>
                            <input type="text" class="form-control" name="nilai_4" id="nilai_4" value="<?= $Nilai['nilai_4'] ?>">
                        </div>
                    </div>
                </div>
                <hr>
                <h6 class="font-weight-bold">TEMA 2</h6>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 1</label>
                            <input type="text" class="form-control" name="nilai_5" id="nilai_5" value="<?= $Nilai['nilai_5'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 2</label>
                            <input type="text" class="form-control" name="nilai_6" id="nilai_6" value="<?= $Nilai['nilai_6'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 3</label>
                            <input type="text" class="form-control" name="nilai_7" id="nilai_7" value="<?= $Nilai['nilai_7'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 4</label>
                            <input type="text" class="form-control" name="nilai_8" id="nilai_8" value="<?= $Nilai['nilai_8'] ?>">
                        </div>
                    </div>
                </div>
                <hr>
                <h6 class="font-weight-bold">TEMA 3</h6>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 1</label>
                            <input type="text" class="form-control" name="nilai_9" id="nilai_9" value="<?= $Nilai['nilai_9'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 2</label>
                            <input type="text" class="form-control" name="nilai_10" id="nilai_10" value="<?= $Nilai['nilai_10'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 3</label>
                            <input type="text" class="form-control" name="nilai_11" id="nilai_11" value="<?= $Nilai['nilai_11'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 4</label>
                            <input type="text" class="form-control" name="nilai_12" id="nilai_12" value="<?= $Nilai['nilai_12'] ?>">
                        </div>
                    </div>
                </div>
                <hr>
                <h6 class="font-weight-bold">TEMA 4</h6>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 1</label>
                            <input type="text" class="form-control" name="nilai_13" id="nilai_13" value="<?= $Nilai['nilai_13'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 2</label>
                            <input type="text" class="form-control" name="nilai_14" id="nilai_14" value="<?= $Nilai['nilai_14'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 3</label>
                            <input type="text" class="form-control" name="nilai_15" id="nilai_15" value="<?= $Nilai['nilai_15'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 4</label>
                            <input type="text" class="form-control" name="nilai_16" id="nilai_16" value="<?= $Nilai['nilai_16'] ?>">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label>PTS</label>
                    <input type="text" class="form-control" name="pts" id="pts" value="<?= $Nilai['pts'] ?>">
                </div>
                <div class="form-group">
                    <label>PAS</label>
                    <input type="text" class="form-control" name="pas" id="pas" value="<?= $Nilai['pas'] ?>">
                </div>

                <input type="submit" class="btn btn-primary" value="SIMPAN">
                <a href="<?= base_url('/admin/input_nilai_siswa') ?>" class="btn btn-danger">KEMBALI</a>
            </form>
        <?php elseif ($id_kelas == 'K12' or $id_kelas == 'K22' or $id_kelas == 'K32' or $id_kelas == 'P12' or $id_kelas == 'P22' or $id_kelas == 'P32') : ?>
            <form action="<?= base_url('admin/val_input_nilai') ?>" method="post">
                <div class="form-group">
                    <label>NISN SISWA</label>
                    <input type="text" class="form-control" name="nisn" id="nisn" value="<?= $Nilai['nisn'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label>ID MAPEL</label>
                    <input type="text" class="form-control" name="id_mapel" id="id_mapel" value="<?= $Nilai['id_mapel'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label>ID KELAS</label>
                    <input type="text" class="form-control" name="id_kelas" id="id_kelas" value="<?= $Nilai['id_kelas'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label>ID TAHUN AJARAN</label>
                    <input type="text" class="form-control" name="id_tahun_ajaran" id="id_tahun_ajaran" value="<?= $Nilai['id_tahun_ajaran'] ?>" readonly>
                </div>
                <h6 class="font-weight-bold">TEMA 5</h6>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 1</label>
                            <input type="text" class="form-control" name="nilai_1" id="nilai_1" value="<?= $Nilai['nilai_1'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 2</label>
                            <input type="text" class="form-control" name="nilai_2" id="nilai_2" value="<?= $Nilai['nilai_2'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 3</label>
                            <input type="text" class="form-control" name="nilai_3" id="nilai_3" value="<?= $Nilai['nilai_3'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 4</label>
                            <input type="text" class="form-control" name="nilai_4" id="nilai_4" value="<?= $Nilai['nilai_4'] ?>">
                        </div>
                    </div>
                </div>
                <hr>
                <h6 class="font-weight-bold">TEMA 6</h6>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 1</label>
                            <input type="text" class="form-control" name="nilai_5" id="nilai_5" value="<?= $Nilai['nilai_5'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 2</label>
                            <input type="text" class="form-control" name="nilai_6" id="nilai_6" value="<?= $Nilai['nilai_6'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 3</label>
                            <input type="text" class="form-control" name="nilai_7" id="nilai_7" value="<?= $Nilai['nilai_7'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 4</label>
                            <input type="text" class="form-control" name="nilai_8" id="nilai_8" value="<?= $Nilai['nilai_8'] ?>">
                        </div>
                    </div>
                </div>
                <hr>
                <h6 class="font-weight-bold">TEMA 7</h6>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 1</label>
                            <input type="text" class="form-control" name="nilai_9" id="nilai_9" value="<?= $Nilai['nilai_9'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 2</label>
                            <input type="text" class="form-control" name="nilai_10" id="nilai_10" value="<?= $Nilai['nilai_10'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 3</label>
                            <input type="text" class="form-control" name="nilai_11" id="nilai_11" value="<?= $Nilai['nilai_11'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 4</label>
                            <input type="text" class="form-control" name="nilai_12" id="nilai_12" value="<?= $Nilai['nilai_12'] ?>">
                        </div>
                    </div>
                </div>
                <hr>
                <h6 class="font-weight-bold">TEMA 8</h6>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 1</label>
                            <input type="text" class="form-control" name="nilai_13" id="nilai_13" value="<?= $Nilai['nilai_13'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 2</label>
                            <input type="text" class="form-control" name="nilai_14" id="nilai_14" value="<?= $Nilai['nilai_14'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 3</label>
                            <input type="text" class="form-control" name="nilai_15" id="nilai_15" value="<?= $Nilai['nilai_15'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 4</label>
                            <input type="text" class="form-control" name="nilai_16" id="nilai_16" value="<?= $Nilai['nilai_16'] ?>">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label>PTS</label>
                    <input type="text" class="form-control" name="pts" id="pts" value="<?= $Nilai['pts'] ?>">
                </div>
                <div class="form-group">
                    <label>PAS</label>
                    <input type="text" class="form-control" name="pas" id="pas" value="<?= $Nilai['pas'] ?>">
                </div>

                <input type="submit" class="btn btn-primary" value="SIMPAN">
                <a href="<?= base_url('/admin/input_nilai_siswa') ?>" class="btn btn-danger">KEMBALI</a>
            </form>
        <?php elseif ($id_kelas == 'K41' or $id_kelas == 'K51' or $id_kelas == 'K61' or $id_kelas == 'P41' or $id_kelas == 'P51' or $id_kelas == 'P61') : ?>
            <form action="<?= base_url('admin/val_input_nilai') ?>" method="post">
                <div class="form-group">
                    <label>NISN SISWA</label>
                    <input type="text" class="form-control" name="nisn" id="nisn" value="<?= $Nilai['nisn'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label>ID MAPEL</label>
                    <input type="text" class="form-control" name="id_mapel" id="id_mapel" value="<?= $Nilai['id_mapel'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label>ID KELAS</label>
                    <input type="text" class="form-control" name="id_kelas" id="id_kelas" value="<?= $Nilai['id_kelas'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label>ID TAHUN AJARAN</label>
                    <input type="text" class="form-control" name="id_tahun_ajaran" id="id_tahun_ajaran" value="<?= $Nilai['id_tahun_ajaran'] ?>" readonly>
                </div>
                <h6 class="font-weight-bold">TEMA 1</h6>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 1</label>
                            <input type="text" class="form-control" name="nilai_1" id="nilai_1" value="<?= $Nilai['nilai_1'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 2</label>
                            <input type="text" class="form-control" name="nilai_2" id="nilai_2" value="<?= $Nilai['nilai_2'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 3</label>
                            <input type="text" class="form-control" name="nilai_3" id="nilai_3" value="<?= $Nilai['nilai_3'] ?>">
                        </div>
                    </div>
                </div>
                <hr>
                <h6 class="font-weight-bold">TEMA 2</h6>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 1</label>
                            <input type="text" class="form-control" name="nilai_5" id="nilai_5" value="<?= $Nilai['nilai_4'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 2</label>
                            <input type="text" class="form-control" name="nilai_6" id="nilai_6" value="<?= $Nilai['nilai_5'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 3</label>
                            <input type="text" class="form-control" name="nilai_7" id="nilai_7" value="<?= $Nilai['nilai_6'] ?>">
                        </div>
                    </div>
                </div>
                <hr>
                <h6 class="font-weight-bold">TEMA 3</h6>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 1</label>
                            <input type="text" class="form-control" name="nilai_9" id="nilai_9" value="<?= $Nilai['nilai_7'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 2</label>
                            <input type="text" class="form-control" name="nilai_10" id="nilai_10" value="<?= $Nilai['nilai_8'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 3</label>
                            <input type="text" class="form-control" name="nilai_11" id="nilai_11" value="<?= $Nilai['nilai_9'] ?>">
                        </div>
                    </div>
                </div>
                <hr>
                <h6 class="font-weight-bold">TEMA 4</h6>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 1</label>
                            <input type="text" class="form-control" name="nilai_13" id="nilai_13" value="<?= $Nilai['nilai_10'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 2</label>
                            <input type="text" class="form-control" name="nilai_14" id="nilai_14" value="<?= $Nilai['nilai_11'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 3</label>
                            <input type="text" class="form-control" name="nilai_15" id="nilai_15" value="<?= $Nilai['nilai_12'] ?>">
                        </div>
                    </div>
                </div>
                <hr>
                <h6 class="font-weight-bold">TEMA 5</h6>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 1</label>
                            <input type="text" class="form-control" name="nilai_13" id="nilai_13" value="<?= $Nilai['nilai_13'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 2</label>
                            <input type="text" class="form-control" name="nilai_14" id="nilai_14" value="<?= $Nilai['nilai_14'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 3</label>
                            <input type="text" class="form-control" name="nilai_15" id="nilai_15" value="<?= $Nilai['nilai_15'] ?>">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label>PTS</label>
                    <input type="text" class="form-control" name="pts" id="pts" value="<?= $Nilai['pts'] ?>">
                </div>
                <div class="form-group">
                    <label>PAS</label>
                    <input type="text" class="form-control" name="pas" id="pas" value="<?= $Nilai['pas'] ?>">
                </div>

                <input type="submit" class="btn btn-primary" value="SIMPAN">
                <a href="<?= base_url('/admin/input_nilai_siswa') ?>" class="btn btn-danger">KEMBALI</a>
            </form>
        <?php elseif ($id_kelas == 'K42' or $id_kelas == 'K52' or $id_kelas == 'K62' or $id_kelas == 'P42' or $id_kelas == 'P52' or $id_kelas == 'P62') : ?>
            <form action="<?= base_url('admin/val_input_nilai') ?>" method="post">
                <div class="form-group">
                    <label>NISN SISWA</label>
                    <input type="text" class="form-control" name="nisn" id="nisn" value="<?= $Nilai['nisn'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label>ID MAPEL</label>
                    <input type="text" class="form-control" name="id_mapel" id="id_mapel" value="<?= $Nilai['id_mapel'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label>ID KELAS</label>
                    <input type="text" class="form-control" name="id_kelas" id="id_kelas" value="<?= $Nilai['id_kelas'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label>ID TAHUN AJARAN</label>
                    <input type="text" class="form-control" name="id_tahun_ajaran" id="id_tahun_ajaran" value="<?= $Nilai['id_tahun_ajaran'] ?>" readonly>
                </div>
                <h6 class="font-weight-bold">TEMA 6</h6>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 1</label>
                            <input type="text" class="form-control" name="nilai_1" id="nilai_1" value="<?= $Nilai['nilai_1'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 2</label>
                            <input type="text" class="form-control" name="nilai_2" id="nilai_2" value="<?= $Nilai['nilai_2'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 3</label>
                            <input type="text" class="form-control" name="nilai_3" id="nilai_3" value="<?= $Nilai['nilai_3'] ?>">
                        </div>
                    </div>
                </div>
                <hr>
                <h6 class="font-weight-bold">TEMA 7</h6>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 1</label>
                            <input type="text" class="form-control" name="nilai_5" id="nilai_5" value="<?= $Nilai['nilai_4'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 2</label>
                            <input type="text" class="form-control" name="nilai_6" id="nilai_6" value="<?= $Nilai['nilai_5'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 3</label>
                            <input type="text" class="form-control" name="nilai_7" id="nilai_7" value="<?= $Nilai['nilai_6'] ?>">
                        </div>
                    </div>
                </div>
                <hr>
                <h6 class="font-weight-bold">TEMA 8</h6>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 1</label>
                            <input type="text" class="form-control" name="nilai_9" id="nilai_9" value="<?= $Nilai['nilai_7'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 2</label>
                            <input type="text" class="form-control" name="nilai_10" id="nilai_10" value="<?= $Nilai['nilai_8'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 3</label>
                            <input type="text" class="form-control" name="nilai_11" id="nilai_11" value="<?= $Nilai['nilai_9'] ?>">
                        </div>
                    </div>
                </div>
                <hr>
                <h6 class="font-weight-bold">TEMA 9</h6>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 1</label>
                            <input type="text" class="form-control" name="nilai_13" id="nilai_13" value="<?= $Nilai['nilai_10'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 2</label>
                            <input type="text" class="form-control" name="nilai_14" id="nilai_14" value="<?= $Nilai['nilai_11'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SUB TEMA 3</label>
                            <input type="text" class="form-control" name="nilai_15" id="nilai_15" value="<?= $Nilai['nilai_12'] ?>">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label>PTS</label>
                    <input type="text" class="form-control" name="pts" id="pts" value="<?= $Nilai['pts'] ?>">
                </div>
                <div class="form-group">
                    <label>PAS</label>
                    <input type="text" class="form-control" name="pas" id="pas" value="<?= $Nilai['pas'] ?>">
                </div>

                <input type="submit" class="btn btn-primary" value="SIMPAN">
                <a href="<?= base_url('/admin/input_nilai_siswa') ?>" class="btn btn-danger">KEMBALI</a>
            </form>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection(''); ?>