<?php
//variabel yang berfungsi menyimpan detail dari sub judul website
$nama = 'Bagian';
//variabel yang berfungsi mengatifkan sidebar
$bagian = 'bagian';

// menambahkan style khusus untuk halaman ini saja
$addstyles = '_assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css';

// menghubungkan file header dengan file jabatan
require_once "_template/_header.php";
?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('view_bagian') ?>">Data Bagian</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Data Bagian </li>
    </ol>
</nav>

<div class="card mb-4">
    <div class="card-body">
        <form method="POST" action="<?= base_url('_config/proses_bagian') ?>?add">
            <div class="form-group row">
                <label for="id_bagian" class="col-sm-3 col-form-label">Nama Bagian</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="id_bagian" id="id_bagian" placeholder="id bagian" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="nama_bagian" class="col-sm-3 col-form-label">Nama Bagian</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_bagian" id="nama_bagian" placeholder="nama bagian" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="ketua_bagian" class="col-sm-3 col-form-label">Ketua Bagian</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="ketua_bagian" id="ketua_bagian" placeholder="nama ketua bagian" required autocomplete="off">
                </div>
            </div>

    </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success float-right"><i class="fas fa-fw fa-save"></i> Simpan</button>
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
// menghubungkan file footer dengan file jabatan
require_once "_template/_footer.php";
?>