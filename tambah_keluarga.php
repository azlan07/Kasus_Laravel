<?php
//variabel yang berfungsi menyimpan detail dari sub judul website
$nama = 'Input Keluarga';
//variabel yang berfungsi mengatifkan sidebar
$riwayat = 'riwayat';
//variabel yang berfungsi mengatifkan sidebar
$keluarga = 'keluarga';
// menambahkan style khusus untuk halaman ini saja
$addstyles = '_assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css';
// menghubungkan file header dengan file keluarga
require_once "_template/_header.php";
?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('view_keluarga') ?>">Data Keluarga</a></li>
        <li class="breadcrumb-item active" aria-current="page">Input Keluarga</li>
    </ol>
</nav>

<div class="card mb-4">
    <div class="card-body">
        <form method="POST" action="<?= base_url('_config/proses_keluarga') ?>?add">
            <div class="form-group row">
                <label for="nip" class="col-sm-3 col-form-label">Pilih Pegawai</label>
                <div class="col-sm-9">
                    <select class="form-control" name="nip" id="nip" required autocomplete="off" autofocus>
                        <?php
                        $data_pegawai = query("SELECT * FROM pegawai GROUP BY nama_pegawai asc");
                        foreach ($data_pegawai as $pegawai) : ?>
                            <option value="<?= $pegawai['nip'] ?>"><?= $pegawai['nama_pegawai'] . ' - ' . $pegawai['nip'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="nik" class="col-sm-3 col-form-label">NIK</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nik" id="nik" placeholder="NIK" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="nama_lengkap" class="col-sm-3 col-form-label">Nama Ayah</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" placeholder="Nama Ayah" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="pekerjaan" class="col-sm-3 col-form-label">Pekerjaan Ayah</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="pekerjaan_ayah" id="pekerjaan_ayah" placeholder="Pekerjaan Ayah" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="pekerjaan" class="col-sm-3 col-form-label">Alamat Ayah</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="alamat_ayah" id="alamat_ayah" placeholder="Alamat Ayah" required autocomplete="off">
                </div>
            </div>

            <div class="form-group row">
                <label for="nama_lengkap" class="col-sm-3 col-form-label">Nama Ibu</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" placeholder="Nama Ibu" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="pekerjaan" class="col-sm-3 col-form-label">Pekerjaan Ibu</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="pekerjaan_ibu" id="pekerjaan_ibu" placeholder="Pekerjaan Ibu" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="pekerjaan" class="col-sm-3 col-form-label">Alamat Ibu</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="alamat_ibu" id="alamat_ibu" placeholder="Alamat Ibu" required autocomplete="off">
                </div>
            </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-success float-right"><i class="fas fa-fw fa-save"></i> Simpan</button>
        <a href="view_keluarga.php" class="btn btn-success float-right mr-1"><i class="fas fa-fw fa-eye"></i>Lihat Data</a>
    </div>
    </form>
</div>


<?php
// menambahkan script khusus untuk halaman ini saja
$addscript = '
        <script src="' . asset('_assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') . '"></script>
        <script>
            $(".datepicker").datepicker()
        </script>
    ';

// menghubungkan file footer dengan file keluarga
require_once "_template/_footer.php";
?>