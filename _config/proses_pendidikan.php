<?php

    require_once "config.php";

    if (isset($_GET['add']) ) {
        $nip = mysqli_real_escape_string($koneksi, $_POST['nip']);
        $tingkat = strip_tags($_POST['tingkat']);
        $sekolah = strip_tags($_POST['sekolah']);
        $lokasi = strip_tags($_POST['lokasi']);
        $jurusan = strip_tags($_POST['jurusan']);
        $tgl_ijazah = strip_tags($_POST['tgl_ijazah']);
        $no_ijazah = strip_tags($_POST['no_ijazah']);

        $create = create("INSERT INTO pendidikan VALUES ('','$nip','$tingkat','$sekolah','$lokasi','$jurusan','$tgl_ijazah','$no_ijazah')");
        if(mysqli_affected_rows($koneksi) > 0) { 
            echo '<script>
            alert("Data Berhasil Ditambah")
            window.location = "'.base_url('view_pendidikan').'";
            </script>';                     
        }
        else{
            echo '<script>
            alert("Data Gagal Ditambah")
            window.location = "'.base_url('tambah_pendidikan').'";
            </script>';  
        }
    }