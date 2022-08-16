<?php
//variabel yang berfungsi menyimpan detail dari sub judul website
$nama = 'View Pangkat';
//variabel yang berfungsi mengatifkan sidebar
$riwayat = 'riwayat';
//variabel yang berfungsi mengatifkan sidebar
$pangkat = 'pangkat';
// menambahkan style khusus untuk halaman ini saja
$addstyles = '_assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css';

// menghubungkan file header dengan file pangkat
require_once "_template/_header.php";
?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Data Kenaikan Pangkat</li>
    </ol>
</nav>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="<?= base_url('tambah_pangkat') ?>" class="btn btn-primary btn-sm float-right"><i class="fas fa-user-plus"></i> Tambah Pegawai</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Pegawai</th>
                        <th>NIP</th>
                        <th>Nama Pangkat</th>
                        <th>Jenis Pangkat</th>
                        <th>Tanggal Diajukan</th>
                        <th>Tanggal Sah SK</th>
                        <th>Pengesah SK</th>
                        <th>No SK</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $ambil = mysqli_query($koneksi, "select*from pangkat inner join pegawai on pangkat.nip=pegawai.nip");
                    $no = 1;

                    while ($data = mysqli_fetch_array($ambil)) {
                    ?>
                        <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $data['nama_pegawai'] ?></td>
                            <td><?php echo $data['1'] ?></td>
                            <td><?php echo $data['2'] ?></td>
                            <td><?php echo $data['3'] ?></td>
                            <td><?php echo $data['4'] ?></td>
                            <td><?php echo $data['5'] ?></td>
                            <td><?php echo $data['6'] ?></td>
                            <td><?php echo $data['7'] ?></td>
                            <td class="btn-group" width="100%">
                                <a href="edit_pangkat.php?kode=<?php echo $data['id_pangkat'] ?>" class="btn btn-warning btn-default btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                <a href="hapus_pangkat.php?kode=<?php echo $data['id_pangkat'] ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="btn btn-danger btn-default btn-sm"><i class="fas fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                    <?php
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php

// menambahkan script khusus untuk halaman ini saja
// $addscript = '
//         <script src="' . asset('_assets/vendor/datatables/jquery.dataTables.min.js') . '"></script>
//         <script src="' . asset('_assets/vendor/datatables/dataTables.bootstrap4.min.js') . '"></script>
    
//         <script src="' . asset('_assets/js/demo/datatables-demo.js') . '"></script>
//     ';

// menghubungkan file footer dengan file detail Pegawai
require_once "_template/_footer.php";
?>