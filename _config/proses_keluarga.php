<?php
require_once "config.php";
// include "config.php";

if (isset($_GET['add'])) {
    $nip = mysqli_real_escape_string($koneksi, $_POST['nip']);
    $nik = mysqli_real_escape_string($koneksi, $_POST['nik']);
    $nama_ayah = strip_tags($_POST['nama_ayah']);
    $pekerjaan_ayah = strip_tags($_POST['pekerjaan_ayah']);
    $alamat_ayah = strip_tags($_POST['alamat_ayah']);
    $nama_ibu = strip_tags($_POST['nama_ibu']);
    $pekerjaan_ibu = strip_tags($_POST['pekerjaan_ibu']);
    $alamat_ibu = strip_tags($_POST['alamat_ibu']);

    $create = create("INSERT INTO keluarga VALUES ('$nik','$nip','$nama_ayah','$pekerjaan_ayah','$alamat_ayah','$nama_ibu','$pekerjaan_ibu','$alamat_ibu')");
    if (mysqli_affected_rows($koneksi) > 0) {
        echo '<script>
            alert("Data Berhasil Ditambah :)")
            window.location = "' . base_url('view_keluarga') . '";
            </script>';
    } else {
        echo '<script>
            alert("Data Gagal Ditambah :(")
            window.location = "' . base_url('tambah_keluarga') . '";
            </script>';
    }
}
