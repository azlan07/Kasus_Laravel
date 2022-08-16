<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pensiun</title>
</head>

<!-- Bootstrap CSS -->
<link href="../_assets/css/bootstrap.min.css" rel="stylesheet">

<body>
    <div class="container">
        <div class="table-responsive">
        <h1 style="text-align: center;">Laporan Pegawai Pensiun</h1>    
        <br><br>
            <table class="table table-striped">
                <?php
                require_once "../_config/config.php";

                $ambil = mysqli_query($koneksi, "select*from pensiun inner join pegawai on pensiun.nip=pegawai.nip");

                while ($data = mysqli_fetch_array($ambil)) {
                ?>
                    <tr>
                        <td></td>
                        <td>||</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Nama Pegawai</td>
                        <td>:</td>
                        <td><?php echo $data['nama_pegawai'] ?></td>
                    </tr>
                    <tr>
                        <td>NIP</td>
                        <td>:</td>
                        <td><?php echo $data['1'] ?></td>
                    </tr>
                    <tr>
                        <td>jabatan_terakhir</td>
                        <td>:</td>
                        <td><?php echo $data['2'] ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Pensiun</td>
                        <td>:</td>
                        <td><?php echo $data['3'] ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>

    <!-- DataTables -->
    <script type="text/javascript">
        window.print();

        function PreviewImage() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("uploadPreview").src = oFREvent.target.result;
            };
        };
    </script>
</body>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="../_assets/js/bootstrap.bundle.min.js"></script>

</html>