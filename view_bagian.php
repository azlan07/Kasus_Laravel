<?php
    //variabel yang berfungsi menyimpan detail dari sub judul website
    $nama = 'View Bagian'; 
    //variabel yang berfungsi mengatifkan sidebar
    $bagian = 'bagian';

    // menambahkan style khusus untuk halaman ini saja
    $addstyles = '_assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css';

    // menghubungkan file header dengan file jabatan
    require_once "_template/_header.php";
?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Data Bagian</li>
    </ol>
</nav>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="<?= base_url('tambah_bagian') ?>" class="btn btn-primary btn-sm float-right"><i class="fas fa-user-plus"></i> Tambah Data</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID Bagian</th>
                        <th>Nama Bagina</th>
                        <th>Ketua Bagian</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $ambil = mysqli_query($koneksi, "select*from bagian");
                    $no = 1;

                    while ($data = mysqli_fetch_array($ambil)) {
                    ?>
                        <tr>
                            <td><?php echo $data['0'] ?></td>
                            <td><?php echo $data['1'] ?></td>
                            <td><?php echo $data['2'] ?></td>
                            <td class="btn-group" width="100%">
                                <a href="edit_bagian.php?kode=<?php echo $data['id_bagian'] ?>" class="btn btn-warning btn-default btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                <a href="hapus_bagian.php?kode=<?php echo $data['id_bagian'] ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="btn btn-danger btn-default btn-sm"><i class="fas fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
require_once "_template/_footer.php";
?>