<?= view('includes/header'); ?>
<?= view('includes/sidebar'); ?>

<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h3>Manajemen Pelanggan</h3>
    </div>
    <div class="page-content">
        <div class="card">
            
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Data Pelanggan</h4>
                <a href="tambah_plg" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus-lg"></i> Tambah Pelanggan
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>ID </th>
                                <th>Nama Akun</th>
                                <th>Kontak</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Contoh dalam loop data pelanggan -->
<?php foreach ($pelanggan as $row): ?>
<tr>
    <td><?= $row['id_plg']; ?></td>
    <td><?= $row['nama_plg']; ?></td>
    <td><?= $row['alamat']; ?></td>
    <td><?= $row['kontak']; ?></td>
    <td>
        <a href="<?= base_url('admin/editPelanggan/' . $row['id_plg']) ?>" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square"></i></a>

        <a href="<?= base_url('admin/hapusPelanggan/' . $row['id_plg']) ?>" 
           onclick="return confirm('Yakin ingin menghapus pelanggan ini?')" 
           class="btn btn-danger btn-sm">
           Hapus
        </a>
    </td>
</tr>
<?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
</div>

<?= view('includes/footer'); ?>
