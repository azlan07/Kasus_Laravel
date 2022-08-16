<?php
    require_once "_config/config.php";
    $nip = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM pegawai WHERE nip='$nip'");
    
    if($query){
        echo "<script>alert('Data Berhasil Di Hapus')</script>";
        echo "<script>location = 'pegawai.php'</script>";
    }else{
        echo "<script>alert('Data Gagal Di Hapus')</script>";
    }

?>