<?php 
    require_once "_config/config.php";
    $hapus=mysqli_query($koneksi,"delete from keluarga where nik='$_GET[kode]'");
    if($hapus){
        header('location:view_keluarga.php');

        // apabila terjadi eror dapat menggunakan scropt di bawah ini
        // echo "<script>window.location=''</script>";
    }
?>