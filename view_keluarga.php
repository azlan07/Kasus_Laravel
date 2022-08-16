<?php
    //variabel yang berfungsi menyimpan detail dari sub judul website
    $nama = 'View Keluarga';
    //variabel yang berfungsi mengatifkan sidebar
    $riwayat = 'riwayat';
    //variabel yang berfungsi mengatifkan sidebar
    $keluarga = 'keluarga';
    // menambahkan style khusus untuk halaman ini saja
    $addstyles = '_assets/vendor/datatables/dataTables.bootstrap4.min.css';
    // menghubungkan file header dengan file Pegawai
    require_once "_template/_header.php";
?>

<nav aria-label="breadcrumb">
<ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Data Keluarga</li>
    </ol>
</nav>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="<?= base_url('tambah_keluarga') ?>" class="btn btn-primary btn-sm float-right"><i class="fas fa-user-plus"></i> Tambah Data</a>
        <!-- <a href="<?= base_url('_report/all_pegawai') ?>" target="_blank" class="btn btn-info btn-sm float-right mr-3"><i class="fas fa-print"></i> Print Pegawai</a> -->
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                <thead>
                    <tr>
                        <td>No.</td>
                        <td>Nama Pegawai</td>
                        <td>NIP</td>
                        <td>NIK</td>
                        <td>Nama Ayah</td>
                        <td>Pekerjaan Ayah</td>
                        <td>Alamat Ayah</td>
                        <td>Nama Ibu</td>
                        <td>Pekerjaan Ibu</td>
                        <td>Alamat Ibu</td>
                        <td>Opsi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $ambil = mysqli_query($koneksi, "select*from keluarga inner join pegawai on keluarga.nip=pegawai.nip");
                    $no = 1;

                    while ($data = mysqli_fetch_array($ambil)) {
                    ?>
                        <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $data['nama_pegawai'] ?></td>
                            <td><?php echo $data['nip'] ?></td>
                            <td><?php echo $data['nik'] ?></td>
                            <td><?php echo $data['nama_ayah'] ?></td>
                            <td><?php echo $data['pekerjaan_ayah'] ?></td>
                            <td><?php echo $data['alamat_ayah'] ?></td>
                            <td><?php echo $data['nama_ibu'] ?></td>
                            <td><?php echo $data['pekerjaan_ibu'] ?></td>
                            <td><?php echo $data['alamat_ibu'] ?></td>
                            <td class="btn-group" width="100%">
                                <a href="edit_keluarga.php?kode=<?php echo $data['nik'] ?>" class="btn btn-warning btn-default btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                <a href="hapus_keluarga.php?kode=<?php echo $data['nik'] ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" name="Hapus" class="btn btn-danger btn-default btn-sm"><i class="fas fa-trash"></i> Hapus</a>
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