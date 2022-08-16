<?php
    //variabel yang berfungsi menyimpan detail dari sub judul website
    $nama = 'Edit Bagian'; 
    //variabel yang berfungsi mengatifkan sidebar
    $bagian = 'bagian';

    // menambahkan style khusus untuk halaman ini saja
    $addstyles = '_assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css';

    // menghubungkan file header dengan file jabatan
    require_once "_template/_header.php";

    //update data
    $ambil = mysqli_query($koneksi, "select*from bagian where id_bagian='$_GET[kode]'");
    $data = mysqli_fetch_array($ambil);
?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('view_bagian') ?>">Data Bagian</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Bagian</li>
    </ol>
</nav>

<div class="card mb-4">
    <div class="card-body">
        <form method="POST" action="">
            <div class="form-group row">
                <label for="id_bagian" class="col-sm-3 col-form-label">ID Bagian</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="id_bagian" id="id_bagian" value="<?= $data['id_bagian'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="nama_bagian" class="col-sm-3 col-form-label">Nama Bagian</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_bagian" id="nama_bagian" value="<?= $data['1'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="ketua_bagian" class="col-sm-3 col-form-label">Ketua Bagian</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="ketua_bagian" id="ketua_bagian" value="<?= $data['2'] ?>">
                </div>
            </div>
    </div>
    <div class="card-footer">
        <button name="simpan" class="btn btn-success float-right"><i class="fas fa-fw fa-save"></i> Simpan Perubahan</button>
    </div>
    </form>
</div>


<?php
if (isset($_POST['simpan'])) {
    $q = mysqli_query($koneksi, "UPDATE bagian SET 
    id_bagian          ='$_POST[id_bagian]',
    nama_bagian        ='$_POST[nama_bagian]', 
    ketua_bagian       ='$_POST[ketua_bagian]'
    WHERE id_bagian    ='$_GET[kode]'");

    if ($q) {
        echo "<script> location='view_bagian.php'</script>";
    }
}

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
