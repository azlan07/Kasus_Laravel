<?php 
    require_once "_config/config.php";
    $hapus=mysqli_query($koneksi,"delete from cuti where id_cuti='$_GET[kode]'");
    if($hapus){
        header('location:view_cuti.php');

        // apabila terjadi eror dapat menggunakan scropt di bawah ini
        // echo "<script>window.location=''</script>";
    }
?>