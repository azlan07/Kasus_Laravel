<?php

    require_once "config.php";

    if (isset($_GET['add']) ) {
        $nip = mysqli_real_escape_string($koneksi, $_POST['nip']);
        $pangkat = strip_tags($_POST['pangkat']);
        $jenis_pangkat = strip_tags($_POST['jenis_pangkat']);
        $tmt = strip_tags($_POST['tmt']);
        $tgl_sah = strip_tags($_POST['tgl_sah']);
        $sah_sk = strip_tags($_POST['sah_sk']);
        $no_sk = strip_tags($_POST['no_sk']);

        $create = create("INSERT INTO pangkat VALUES ('','$nip','$pangkat','$jenis_pangkat','$tmt','$tgl_sah','$sah_sk','$no_sk')");
        if(mysqli_affected_rows($koneksi) > 0) { 
            echo '<script>
            alert("Data Berhasil Ditambah")
            window.location = "'.base_url('view_pangkat').'";
            </script>';                     
        }
        else{
            echo '<script>
            alert("Data Gagal Ditambah")
            window.location = "'.base_url('tambah_pangkat').'";
            </script>';  
        }
    }