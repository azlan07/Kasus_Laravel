<?php 
    require_once "_config/config.php";
    $hapus=mysqli_query($koneksi,"delete from bagian where id_bagian='$_GET[kode]'");
    if($hapus){
        header('location:view_bagian.php');

        // apabila terjadi eror dapat menggunakan scropt di bawah ini
        // echo "<script>window.location=''</script>";
    }
?>