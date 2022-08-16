<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pegawai</title>
</head>

<!-- Bootstrap CSS -->
<link href="../_assets/css/bootstrap.min.css" rel="stylesheet">

<body>
    <div class="container">
        <div class="table-responsive">
        <h1 style="text-align: center;">Laporan Pegawai Per-Bagian/Unit</h1>  
        <br><br>
            <table class="table table-striped">
                <?php
                require_once "../_config/config.php";

                $ambil = mysqli_query($koneksi, "SELECT * FROM pegawai
                LEFT JOIN bagian ON pegawai.id_bagian = bagian.id_bagian");

                while ($data = mysqli_fetch_array($ambil)) {
                ?>
                    <tr>
                        <td></td>
                        <td>||</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Nama Bagian/Unit</td>
                        <td>:</td>
                        <td><?php echo $data['nama_bagian'] ?></td>
                    </tr>
                    <tr>
                        <td>Nama Pegawai</td>
                        <td>:</td>
                        <td><?php echo $data['nama_pegawai'] ?></td>
                    </tr>
                    <tr>
                        <td>NIP</td>
                        <td>:</td>
                        <td><?php echo $data['nip'] ?></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td><?php echo $data['jenis_kelamin'] ?></td>
                    </tr>
                    <tr>
                        <td>No Hp</td>
                        <td>:</td>
                        <td><?php echo $data['no_hp'] ?></td>
                    </tr>
                    <tr>
                        <td>EMail</td>
                        <td>:</td>
                        <td><?php echo $data['email'] ?></td>
                    </tr>
                    <tr>
                        <td>Status Kepegawaian</td>
                        <td>:</td>
                        <td><?php echo $data['status_kepegawaian'] ?></td>
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