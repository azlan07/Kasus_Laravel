<?php
require_once "config.php";

if (isset($_GET['add'])) {
    $id = strip_tags($_POST['id_bagian']);
    $nama = strip_tags($_POST['nama_bagian']);
    $ketua = strip_tags($_POST['ketua_bagian']);

    $create = create("INSERT INTO bagian VALUES ('$id','$nama','$ketua')");
    if (mysqli_affected_rows($koneksi) > 0) {
        echo '<script>
            alert("Data Berhasil Ditambah")
            window.location = "' . base_url('view_bagian') . '";
            </script>';
    } else {
        echo '<script>
            alert("Data Gagal Ditambah")
            window.location = "' . base_url('tambah_bagian') . '";
            </script>';
    }
}
