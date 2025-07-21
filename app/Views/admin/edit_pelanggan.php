<?= view('includes/header'); ?>
<?= view('includes/sidebar'); ?>

<div id="main">
    <div class="page-heading">
        <h3>Edit Data Pelanggan</h3>
    </div>
    <div class="page-content">
        <div class="card">
            <div class="card-header">
                <h4>Form Edit Pelanggan</h4>
            </div>
            <div class="card-body">
                <form action="<?= base_url('admin/updatePelanggan') ?>" method="POST">
                    <input type="hidden" name="id_plg" value="<?= $pelanggan['id_plg'] ?>">

                    <div class="form-group">
                        <label for="nama_plg">Nama Pelanggan</label>
                        <input type="text" class="form-control" id="nama_plg" name="nama_plg"
                               value="<?= $pelanggan['nama_plg'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="kontak">Kontak</label>
                        <input type="text" class="form-control" id="kontak" name="kontak"
                               value="<?= $pelanggan['kontak'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?= $pelanggan['alamat'] ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-success mt-3">Update</button>
                    <a href="<?= base_url('admin/pelanggan') ?>" class="btn btn-secondary mt-3">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?= view('includes/footer'); ?>
