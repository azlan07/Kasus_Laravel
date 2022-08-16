<?php
    //variabel yang berfungsi menyimpan detail dari sub judul website
    $nama = 'View Pendidikan'; 
    //variabel yang berfungsi mengatifkan sidebar
    $riwayat = 'riwayat';
    //variabel yang berfungsi mengatifkan sidebar
    $pendidikan = 'pendidikan';
    // menambahkan style khusus untuk halaman ini saja
    $addstyles = '_assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css';
    // menghubungkan file header dengan file pendidikan
    require_once "_template/_header.php";
?>

<nav aria-label="breadcrumb">
<ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Data Riwayat Pendidikan</li>
    </ol>
</nav>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="<?= base_url('tambah_pendidikan') ?>" class="btn btn-primary btn-sm float-right"><i class="fas fa-user-plus"></i> Tambah Data</a>
        <a href="<?= base_url('_report/lap_pendidikan') ?>" target="_blank" class="btn btn-info btn-sm float-right mr-3"><i class="fas fa-print"></i> Print Data</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                <thead>
                    <tr>
                        <td>No.</td>
                        <td>Nama Pegawai</td>
                        <td>NIP</td>
                        <td>Tingkat</td>
                        <td>Nama Sekolah/Universitas</td>
                        <td>Lokasi</td>
                        <td>Jurusan</td>
                        <td>Tanggal Ijazah</td>
                        <td>No Ijazah</td>
                        <td>Opsi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // require_once "_config/config.php";
                    require_once "_template/_header.php";

                    $ambil = mysqli_query($koneksi, "select*from pendidikan inner join pegawai on pendidikan.nip=pegawai.nip");
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
                                <a href="edit_pendidikan.php?kode=<?php echo $data['id_pendidikan'] ?>" class="btn btn-warning btn-default btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                <a href="hapus_pendidikan.php?kode=<?php echo $data['id_pendidikan'] ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="btn btn-danger btn-default btn-sm"><i class="fas fa-trash"></i> Hapus</a>
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