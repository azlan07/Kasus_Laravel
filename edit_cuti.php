<?php
    //variabel yang berfungsi menyimpan detail dari sub judul website
    $nama = 'Form Cuti'; 
    //variabel yang berfungsi mengatifkan sidebar
    $riwayat = 'riwayat';
    //variabel yang berfungsi mengatifkan sidebar
    $cuti = 'cuti';

    // menambahkan style khusus untuk halaman ini saja
    $addstyles = '_assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css';

    // menghubungkan file header dengan file jabatan
    require_once "_template/_header.php";

    //update data
    $ambil = mysqli_query($koneksi, "select*from cuti inner join pegawai on cuti.nip=pegawai.nip where id_cuti='$_GET[kode]'");
    $data = mysqli_fetch_array($ambil);
?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('view_cuti') ?>">Data Permohonan Cuti</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Permohonan Cuti</li>
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
                <label for="sekolah" class="col-sm-3 col-form-label">Alasan Cuti</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="alasan" id="jenis_pangkat" value="<?= $data['3'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="lokasi" class="col-sm-3 col-form-label">Mulai Tanggal</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" name="mulai_tgl" value="<?= $data['4'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jurusan" class="col-sm-3 col-form-label">Sampai Tanggal</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" name="sampai_tgl" value="<?= $data['5'] ?>">
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
    $q = mysqli_query($koneksi, "UPDATE cuti SET 
    nip                 ='$_POST[nip]',
    nama_pangkat        ='$_POST[nama_pangkat]', 
    alasan              ='$_POST[alasan]',
    mulai_tgl           ='$_POST[mulai_tgl]',  
    sampai_tgl          ='$_POST[sampai_tgl]'
    WHERE id_cuti       ='$_GET[kode]'");

    if ($q) {
        echo "<script> location='view_cuti.php'</script>";
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
