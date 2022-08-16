<?php
    //variabel yang berfungsi menyimpan detail dari sub judul website
    $nama = 'Edit Form Pengajuan';
    //variabel yang berfungsi mengatifkan sidebar
    $riwayat = 'riwayat';
    //variabel yang berfungsi mengatifkan sidebar
    $pangkat = 'pangkat';
    // menambahkan style khusus untuk halaman ini saja
    $addstyles = '_assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css';
    // menghubungkan file header dengan file pangkat
    require_once "_template/_header.php";

    //update data
    $ambil = mysqli_query($koneksi, "select*from pangkat inner join pegawai on pangkat.nip=pegawai.nip where id_pangkat='$_GET[kode]'");
    $data = mysqli_fetch_array($ambil);
?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('view_pendidikan') ?>">Data Kenaikan Pangkat</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Form Pengajuan</li>
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
                    <input type="text" class="form-control" name="nip" id="nip" value="<?= $data['1'] ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="tingkat" class="col-sm-3 col-form-label">Nama Pangkat</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_pangkat" id="nama_pangkat" value="<?= $data['2'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="sekolah" class="col-sm-3 col-form-label">Jenis Pangkat</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="jenis_pangkat" id="jenis_pangkat" value="<?= $data['3'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="lokasi" class="col-sm-3 col-form-label">Tanggal Diajukan</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" name="tmt_pangkat" value="<?= $data['4'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jurusan" class="col-sm-3 col-form-label">Tanggal Pengesahan SK</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" name="sah_sk" value="<?= $data['5'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="tgl" class="col-sm-3 col-form-label">Pengesah SK</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_pengesah_sk" value="<?= $data['6'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="no_ijazah" class="col-sm-3 col-form-label">Nomor SK</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="no_sk" id="no_sk" value="<?= $data['7'] ?>">
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
    $q = mysqli_query($koneksi, "UPDATE pangkat SET 
    nip                 ='$_POST[nip]',
    nama_pangkat        ='$_POST[nama_pangkat]', 
    jenis_pangkat       ='$_POST[jenis_pangkat]',
    tmt_pangkat         ='$_POST[tmt_pangkat]',  
    sah_sk              ='$_POST[sah_sk]', 
    nama_pengesah_sk    ='$_POST[nama_pengesah_sk]', 
    no_sk               ='$_POST[no_sk]'
    WHERE id_pangkat    ='$_GET[kode]'");

    if ($q) {
        echo "<script> location='view_pangkat.php'</script>";
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