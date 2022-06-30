<?= $this->extend('layout/template_table'); ?>

<?= $this->section('content'); ?>

<div class="card">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold">Tambah Siswa Baru</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <form action="" method="post">
                    <div class="form-gourp mb-2">
                        <label for="nisn" class="form-label">Nisn Siswa</label>
                        <input type="text" class="form-control" name="nisn" id="nisn" placeholder="Masukan nisn siswa...">
                    </div>
                    <div class="form-gourp mb-2">
                        <label for="nis" class="form-label">Nis Siswa</label>
                        <input type="text" class="form-control" name="nis" id="nis" placeholder="Masukan nis siswa...">
                    </div>
                    <div class="form-gourp mb-2">
                        <label for="nama" class="form-label">Nama Siswa</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan nama siswa...">
                    </div>
                    <div class="form-gourp mb-2">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Masukan tempat lahir siswa...">
                    </div>
                    <div class="form-gourp mb-2">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir">
                    </div>
                    <div class="form-gourp mb-2">
                        <label for="agama" class="form-label">Agama</label>
                        <input class="form-control" list="datalistOptions" name="agama" id="agama" placeholder="Masukan agama siswa...">
                        <datalist id="datalistOptions">
                            <option value="Islam">
                            <option value="New York">
                            <option value="Seattle">
                            <option value="Los Angeles">
                            <option value="Chicago">
                        </datalist>
                    </div>
                    <div class="form-gourp mb-2">
                        <label for="pendidikan_sebelumnya" class="form-label">Pendidikan Sebelumnya</label>
                        <input type="text" class="form-control" name="pendidikan_sebelumnya" id="pendidikan_sebelumnya" placeholder="Masukan nisn...">
                    </div>
                    <div class="form-gourp mb-2">
                        <label for="alamat_siswa" class="form-label">Alamat Siswa</label>
                        <textarea class="form-control" name="alamat_siswa" id="alamat_siswa" rows="3"></textarea>
                    </div>
            </div>
            <div class="col-md-6">
                <div class="form-gourp mb-2">
                    <label for="nama_ayah" class="form-label">Nama Ayah</label>
                    <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" placeholder="Masukan nama ayah...">
                </div>
                <div class="form-gourp mb-2">
                    <label for="nama_ibu" class="form-label">Nama Ibu</label>
                    <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" placeholder="Masukan nama ibu...">
                </div>
                <div class="form-gourp mb-2">
                    <label for="nama_orang_tua_wali" class="form-label">Nama Orang Tua Wali</label>
                    <input type="text" class="form-control" name="nama_orang_tua_wali" id="nama_orang_tua_wali" placeholder="Masukan orang tua wali...">
                </div>
                <div class="form-gourp mb-2">
                    <label for="pekerjaan_ayah" class="form-label">Pekerjaan Ayah</label>
                    <input type="text" class="form-control" name="pekerjaan_ayah" id="pekerjaan_ayah" placeholder="Masukan pekerjaan ayah...">
                </div>
                <div class="form-gourp mb-2">
                    <label for="pekerjaan_ibu" class="form-label">Pekerjaan Ibu</label>
                    <input type="text" class="form-control" name="pekerjaan_ibu" id="pekerjaan_ibu" placeholder="Masukan pekerjaan ibu...">
                </div>
                <div class="form-gourp mb-2">
                    <label for="alamat_orang_tua" class="form-label">Alamat Orang Tua / Orang Tua Wali</label>
                    <textarea class="form-control" name="alamat_orang_tua" id="alamat_orang_tua" rows="3"></textarea>
                </div>
                <div class="form-gourp mb-2">
                    <label for="foto_siswa" class="form-label">Foto Siswa</label>
                    <input class="form-control" type="file" name="foto_siswa" id="foto_siswa">
                </div>
            </div>
            <input type="submit" class="btn btn-primary btn-user btn-block mt-2" value="Login">
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(''); ?>