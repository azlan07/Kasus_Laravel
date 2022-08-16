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
        <li class="breadcrumb-item"><a href="<?= base_url('view_cuti') ?>">Data Permohonan Cuti</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Permohonan Cuti</li>
    </ol>
</nav>

<div class="card mb-4">
    <div class="card-body">
        <form method="POST" action="<?= base_url('_config/proses_cuti') ?>?add">
            <div class="form-group row">
                <label for="nip" class="col-sm-3 col-form-label">Pilih Pegawai</label>
                <div class="col-sm-9">
                    <select class="form-control" name="nip" id="nip" required autocomplete="off" autofocus>
                        <?php
                            $data_pegawai=query("SELECT * FROM pegawai GROUP BY nama_pegawai asc");
                            foreach ($data_pegawai as $pegawai) : ?>
                                <option value="<?= $pegawai['nip'] ?>"><?= $pegawai['nama_pegawai'].' - '.$pegawai['nip'] ?></option>
                            <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama_pangkat" class="col-sm-3 col-form-label">Nama Pangkat</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_pangkat" id="nama_pangkat" placeholder="Pangkat" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="alasan" class="col-sm-3 col-form-label">Alasan</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="alasan" id="alasan" placeholder="Alasan Cuti" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="mulai_tgl" class="col-sm-3 col-form-label">Mulai Tanggal</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" value="<?= date('Y-m-d'); ?>" name="mulai_tgl" placeholder="Tanggal Mulai" required>
                </div>
            </div>   
            <div class="form-group row">
                <label for="sampai_tgl" class="col-sm-3 col-form-label">Sampai Tanggal</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" value="<?= date('Y-m-d'); ?>" name="sampai_tgl" placeholder="Tanggal Selesai" required>
                </div>
            </div>   

        <!-- disini tanda tempat form -->
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-success float-right"><i class="fas fa-fw fa-save"></i> Simpan</button>
    </div>
    </form>
</div>


<?php
    // menambahkan script khusus untuk halaman ini saja
    $addscript = '
        <script src="'.asset('_assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js').'"></script>
        <script>
            $(".datepicker").datepicker()
        </script>
    ';
    // menghubungkan file footer dengan file jabatan
    require_once "_template/_footer.php";
?>