<?= view('includes/header'); ?>
<?= view('includes/sidebar'); ?>

<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-heading">
        <h3>Tambah Data Pelanggan</h3>
    </div>
    <div class="page-content">
        <div class="card"> 
            <div class="card-header">
                    <h4>Form Tambah Pelanggan</h4>
                </div>
                <div class="card-body">
                   <form action="<?= base_url('admin/simpanPelanggan') ?>" method="POST">

    <div class="form-group">
        <label for="id_plg">ID Pelanggan</label>
        <input type="number" class="form-control" id="id_plg" name="id_plg" required>
    </div>
    <div class="form-group">
        <label for="nama_plg">Nama Pelanggan</label>
        <input type="text" class="form-control" id="nama_plg" name="nama_plg" required>
    </div>
    <div class="form-group">
        <label for="kontak">Kontak</label>
        <input type="text" class="form-control" id="kontak" name="kontak">
    </div>
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    <a href="pelanggan.php" class="btn btn-secondary mt-3">Batal</a>
</form>

                </div>
            </div>
        </div>
    </section>
</div>
           
<?= view('includes/footer'); ?>
