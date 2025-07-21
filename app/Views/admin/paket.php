<?= view('includes/header'); ?>
<?= view('includes/sidebar'); ?>

<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h3>Paket</h3>
    </div>
    <div class="page-content">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Data Paket</h4>
                <a href="<?= base_url('admin/tbh_paket'); ?>" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus-lg"></i> Tambah Paket
                </a>

                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                     
                   
                        </div>
                        <!-- table striped -->
                       <?php if (session()->getFlashdata('success')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle-fill"></i> <?= session()->getFlashdata('success') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <?php if (session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="bi bi-exclamation-triangle-fill"></i> <?= session()->getFlashdata('error') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>


                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Paket</th>
                                        <th>Nama Paket</th>
                                        <th>Harga/kg</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($paket as $p): ?>
                            <tr>
                                <td><?= esc($p['id']); ?></td>
                                <td><?= esc($p['kode_paket']); ?></td>
                                <td><?= esc($p['nama_paket']); ?></td>
                                <td><?= number_format($p['harga']); ?></td>
                                <td> <a href="<?= base_url('admin/edit_paket/' . $p['id']); ?>" class="btn btn-sm btn-warning"> 
                                    <i class="bi bi-pencil-square"></i> </a> 
                                    <a href="<?= base_url('admin/hapus_paket/' . $p['id']); ?>" class="btn btn-sm btn-danger" 
                                    onclick="return confirm('Yakin ingin menghapus paket ini?')"> 
                                    <i class="bi bi-trash"></i> </a> </td>
                            </tr>
                        <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<?= view('includes/footer'); ?>
