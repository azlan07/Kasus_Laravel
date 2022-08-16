<?php
//variabel yang berfungsi menyimpan detail dari sub judul website
$nama = 'Edit Keluarga';
//variabel yang berfungsi mengatifkan sidebar
$riwayat = 'riwayat';
//variabel yang berfungsi mengatifkan sidebar
$keluarga = 'keluarga';
// menambahkan style khusus untuk halaman ini saja
$addstyles = '_assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css';
// menghubungkan file header dengan file keluarga
require_once "_template/_header.php";

//update data
$ambil = mysqli_query($koneksi, "select*from keluarga inner join pegawai on keluarga.nip=pegawai.nip where nik='$_GET[kode]'");
$data = mysqli_fetch_array($ambil);
?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('view_keluarga') ?>">Data Keluarga</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Keluarga</li>
    </ol>
</nav>

<div class="card mb-4">
    <div class="card-body">
        <form method="POST" action="">
            <div class="form-group row">
                <label for="nik" class="col-sm-3 col-form-label">Nama Pegawai</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_pegawai" id="nama_pegawai" value="<?= $data['nama_pegawai'] ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="nik" class="col-sm-3 col-form-label">NIP</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nip" id="nip" value="<?= $data['nip'] ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="nip" class="col-sm-3 col-form-label">NIK</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nik" id="nik" value="<?= $data['nik'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="nama_lengkap" class="col-sm-3 col-form-label">Nama Ayah</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" value="<?= $data['nama_ayah'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="pekerjaan" class="col-sm-3 col-form-label">Pekerjaan Ayah</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="pekerjaan_ayah" id="pekerjaan_ayah" value="<?= $data['pekerjaan_ayah'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="pekerjaan" class="col-sm-3 col-form-label">Alamat Ayah</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="alamat_ayah" id="alamat_ayah" value="<?= $data['alamat_ayah'] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="nama_lengkap" class="col-sm-3 col-form-label">Nama Ibu</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" value="<?= $data['nama_ibu'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="pekerjaan" class="col-sm-3 col-form-label">Pekerjaan Ibu</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="pekerjaan_ibu" id="pekerjaan_ibu" value="<?= $data['pekerjaan_ibu'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="pekerjaan" class="col-sm-3 col-form-label">Alamat Ibu</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="alamat_ibu" id="alamat_ibu" value="<?= $data['alamat_ibu'] ?>">
                </div>
            </div>

            <!-- <div class="form-group row">
                <label for="hubungan" class="col-sm-3 col-form-label">Hubungan</label>
                <div class="col-sm-9">
                    <select class="form-control" name="hubungan" id="hubungan" required autocomplete="off">
                        <option value="suami">Suami</option>
                        <option value="istri">Istri</option>
                        <option value="ayah">Ayah</option>
                        <option value="ibu">Ibu</option>
                        <option value="anak">Anak</option>
                    </select>
                </div>
            </div> -->

            <!-- disini tanda tempat form -->
    </div>
    <div class="card-footer">
        <button name="Simpan" class="btn btn-success float-right"><i class="fas fa-fw fa-save"></i> Simpan Perubahan</button>
    </div>
    </form>
</div>


<?php
// prosess
if (isset($_POST['Simpan'])) {
    $nik            = $_POST["nik"];
    $nip            = $_POST["nip"];
    $nama_ayah      = $_POST["nama_ayah"];
    $pekerjaan_ayah = $_POST["pekerjaan_ayah"];
    $alamat_ayah    = $_POST["alamat_ayah"];
    $nama_ibu       = $_POST["nama_ibu"];
    $pekerjaan_ibu  = $_POST["pekerjaan_ibu"];
    $alamat_ibu     = $_POST["alamat_ibu"];

    $sql_update="UPDATE keluarga set 
                    nik='$nik', 
                    nip='$nip', 
                    nama_ayah='$nama_ayah', 
                    pekerjaan_ayah='$pekerjaan_ayah',
                    alamat_ayah='$alamat_ayah',
                    nama_ibu='$nama_ibu', 
                    pekerjaan_ibu='$pekerjaan_ibu',
                    alamat_ibu='$alamat_ibu'
                WHERE nik = '$_GET[kode]'";
    
    if(mysqli_query($koneksi,$sql_update)){
        echo "<script> 
                alert('Data berhasil diubah') 
                window.location ='view_keluarga.php';
            </script>";
    }else{
        die('error');
        print_r("Error message: %s\n", mysqli_error($koneksi));
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
