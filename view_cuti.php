<?php
    //variabel yang berfungsi menyimpan detail dari sub judul website
    $nama = 'Form Cuti'; 
    //variabel yang berfungsi mengatifkan sidebar
    $riwayat = 'riwayat';
    //variabel yang berfungsi mengatifkan sidebar
    $cuti = 'cuti';

    // menambahkan style khusus untuk halaman ini saja
    $addstyles = '_assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css';

    // menghubungkan file header dengan file jabatan
    require_once "_template/_header.php";
?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Data Permohonan Cuti</li>
    </ol>
</nav>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="<?= base_url('tambah_cuti') ?>" class="btn btn-primary btn-sm float-right"><i class="fas fa-user-plus"></i> Tambah Pegawai</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Nama Pangkat</th>
                        <th>Alasan</th>
                        <th>Mulai Tanggal</th>
                        <th>Sampai Tanggal</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $ambil = mysqli_query($koneksi, "select*from cuti inner join pegawai on cuti.nip=pegawai.nip");
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
                            <td class="btn-group" width="100%">
                                <a href="edit_cuti.php?kode=<?php echo $data['id_cuti'] ?>" class="btn btn-warning btn-default btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                <a href="hapus_cuti.php?kode=<?php echo $data['id_cuti'] ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="btn btn-danger btn-default btn-sm"><i class="fas fa-trash"></i> Hapus</a>
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