<?php 
    require_once "_config/config.php";
    $hapus=mysqli_query($koneksi,"delete from pendidikan where id_pendidikan='$_GET[kode]'");
    if($hapus){
        header('location:view_pendidikan.php');

        // apabila terjadi eror dapat menggunakan scropt di bawah ini
        // echo "<script>window.location=''</script>";
    }
?>