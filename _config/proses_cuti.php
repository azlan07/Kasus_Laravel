<?php
require_once "config.php";

if (isset($_GET['add'])) {
    $nip = mysqli_real_escape_string($koneksi, $_POST['nip']);
    $nama_pangkat = strip_tags($_POST['nama_pangkat']);
    $alasan = strip_tags($_POST['alasan']);
    $mulai_tgl = strip_tags($_POST['mulai_tgl']);
    $sampai_tgl = strip_tags($_POST['sampai_tgl']);

    $create = create("INSERT INTO cuti VALUES ('','$nip','$nama_pangkat','$alasan','$mulai_tgl','$sampai_tgl')");
    if (mysqli_affected_rows($koneksi) > 0) {
        echo '<script>
            alert("Data Berhasil Ditambah")
            window.location = "' . base_url('view_cuti') . '";
            </script>';
    } else {
        echo '<script>
            alert("Data Gagal Ditambah")
            window.location = "' . base_url('view_cuti') . '";
            </script>';
    }
}
