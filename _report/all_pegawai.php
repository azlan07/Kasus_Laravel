<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan All Pegawai</title>
</head>

<!-- Bootstrap CSS -->
<link href="../_assets/css/bootstrap.min.css" rel="stylesheet">

<body>
    <div class="row mt-3 ms-3 me-3">
        <!-- <h1 style="text-align: center;">Laporan Data Semua Pegawai</h1> -->
        <table class="table table-primary table-striped">
            <tr>
                <th>No</th>
                <th>Nip</th>
                <th>Nama</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>No HP</th>
                <th>Agama</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Gol Darah</th>
                <th>Status Pernikahan</th>
                <th>Status Kepegawaian</th>
                <th>Status User</th>

                <?php
                require_once "../_config/config.php";
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM pegawai");
                while ($data = mysqli_fetch_array($query)) { ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $data['0'] ?></td>
                <td><?php echo $data['1'] ?></td>
                <td><?php echo $data['3'] ?></td>
                <td><?php echo $data['4'] ?></td>
                <td><?php echo $data['5'] ?></td>
                <td><?php echo $data['6'] ?></td>
                <td><?php echo $data['7'] ?></td>
                <td><?php echo $data['8'] ?></td>
                <td><?php echo $data['9'] ?></td>
                <td><?php echo $data['10'] ?></td>
                <td><?php echo $data['11'] ?></td>
                <td><?php echo $data['12'] ?></td>
                <td><?php echo $data['13'] ?></td>
            </tr>
        <?php } ?>
        </tr>
        </table>
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
