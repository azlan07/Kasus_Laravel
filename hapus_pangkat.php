<?php 
    require_once "_config/config.php";
    $hapus=mysqli_query($koneksi,"delete from pangkat where id_pangkat='$_GET[kode]'");
    if($hapus){
        header('location:view_pangkat.php');

        // apabila terjadi eror dapat menggunakan scropt di bawah ini
        // echo "<script>window.location=''</script>";
    }
?>