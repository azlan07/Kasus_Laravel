<?php
//variabel yang berfungsi menyimpan detail dari sub judul website
$nama = 'Edit Pendidikan';
//variabel yang berfungsi mengatifkan sidebar
$riwayat = 'riwayat';
//variabel yang berfungsi mengatifkan sidebar
$pendidikan = 'pendidikan';
// menambahkan style khusus untuk halaman ini saja
$addstyles = '_assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css';
// menghubungkan file header dengan file pendidikan
require_once "_template/_header.php";

//update data
$ambil = mysqli_query($koneksi, "select*from pendidikan inner join pegawai on pendidikan.nip=pegawai.nip where id_pendidikan='$_GET[kode]'");
$data = mysqli_fetch_array($ambil);
?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('view_pendidikan') ?>">Data Riwayat Pendidikan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Pendidikan</li>
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
                <label for="tingkat" class="col-sm-3 col-form-label">Tingkat</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="tingkat" id="tingkat" value="<?= $data['tingkat'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="sekolah" class="col-sm-3 col-form-label">Nama Sekolah/Universitas</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_sekolah" id="sekolah" value="<?= $data['nama_sekolah'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="lokasi" class="col-sm-3 col-form-label">Lokasi</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="lokasi" id="lokasi" value="<?= $data['lokasi'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jurusan" class="col-sm-3 col-form-label">Jurusan</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="jurusan" id="jurusan" value="<?= $data['jurusan'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="tgl" class="col-sm-3 col-form-label">Tanggal Ijazah</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" name="tgl_ijazah" value="<?= $data['tgl_ijazah'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="no_ijazah" class="col-sm-3 col-form-label">No. Ijazah</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="no_ijazah" id="no_ijazah" value="<?= $data['no_ijazah'] ?>">
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
        <button name="simpan" class="btn btn-success float-right"><i class="fas fa-fw fa-save"></i> Simpan Perubahan</button>
    </div>
    </form>
</div>


<?php
// prosess
// if (isset($_POST['simpan'])) {
//     $nip            = $_POST['nip'];
//     $tingkat        = $_POST['tingkat'];
//     $sekolah        = $_POST['nama_sekolah'];
//     $lokasi         = $_POST['lokasi'];
//     $jurusan        = $_POST['jurusan'];
//     $tgl_ijazah     = $_POST['tgl_ijazah'];
//     $no_ijazah      = $_POST['no_ijazah'];

//     $sql_update= mysqli_query($koneksi,"update pendidikan set nip='$nip',tingkat='$tingkat',nama_sekolah='$sekolah',lokasi='$lokasi',jurusan='$jurusan',tgl_ijazah='$tgl_ijazah',no_ijazah='$no_ijazah' where id_pendidikan = '".$_GET['id_pendidikan']."'  ");

//     if($sql_update){
//         echo "<script> 
//                 alert('Data berhasil diubah') 
//                 window.location ='view_pendidikan.php';
//             </script>";
//     }else{
//         die('error');
//         print_r("Error message: %s\n", mysqli_error($koneksi));
//     }
// }

if (isset($_POST['simpan'])) {
    $q = mysqli_query($koneksi, "UPDATE pendidikan SET 
    nip             ='$_POST[nip]',
    tingkat         ='$_POST[tingkat]', 
    nama_sekolah    ='$_POST[nama_sekolah]',
    lokasi          ='$_POST[lokasi]',  
    jurusan         ='$_POST[jurusan]', 
    tgl_ijazah      ='$_POST[tgl_ijazah]', 
    no_ijazah       ='$_POST[no_ijazah]'
    WHERE id_pendidikan='$_GET[kode]'");

    if ($q) {
        echo "<script> location='view_pendidikan.php'</script>";
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