<?= view('includes/header'); ?>
<?= view('includes/sidebar'); ?>

<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h3>Manajemen Pesanan</h3>
    </div>

    <div class="page-content">
        <div class="card">
            <div class="card-header">
                <h4>Daftar Pesanan</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle text-center">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Nama Pemesan</th>
                                <th>Layanan</th>
                                <th>Berat (kg)</th>
                                <th>Total Harga</th>
                                <th>Metode Pembayaran</th>
                                <th>Tanggal</th>
                                <th>Waktu Diantar</th>
                                <th>Status</th>
                                <th>Catatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $layanan_map = [];
                            if (isset($semua_layanan)) {
                                foreach ($semua_layanan as $l) {
                                    $layanan_map[$l['id']] = $l['nama_layanan'];
                                }
                            }
                            ?>
                            <?php if (!empty($pesanan)): ?>
                                <?php foreach ($pesanan as $row): ?>
                                    <tr>
                                        <td><?= esc($row['id']) ?></td>
                                        <td><?= esc($row['nama'] ?? '-') ?></td>
                                        <td><?= esc($layanan_map[$row['layanan']] ?? '-') ?></td>
                                        <td><?= esc($row['berat'] ?? '-') ?></td>
                                        <td>Rp<?= number_format($row['total_harga'] ?? 0, 0, ',', '.') ?></td>
                                        <td><?= esc($row['metode_bayar'] ?? '-') ?></td>
                                        <td><?= esc(date('Y-m-d', strtotime($row['waktu']))) ?></td>
                                        <td><?= $row['waktu_diantar'] ? esc(date('Y-m-d H:i', strtotime($row['waktu_diantar']))) : '-' ?></td>
                                        <td>
                                            <div class="fw-bold mb-1"><?= esc($row['status']) ?></div>
                                            <?php if ($row['status'] == 'diantar' && $row['waktu_diantar']): ?>
                                                <?php
                                                    $elapsed = time() - strtotime($row['waktu_diantar']);
                                                    if ($elapsed < 600) {
                                                        $tracking = "📦 Baru diantar";
                                                    } elseif ($elapsed < 1200) {
                                                        $tracking = "🚚 Di perjalanan";
                                                    } elseif ($elapsed < 1800) {
                                                        $tracking = "🛬 Hampir sampai";
                                                    } else {
                                                        $tracking = "✅ Harusnya sudah sampai";
                                                    }
                                                ?>
                                                <small class="text-muted"><?= $tracking ?></small>
                                            <?php endif; ?>
                                            <form action="<?= base_url('admin/update_status') ?>" method="post" class="mt-2">
                                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                <select name="status" onchange="this.form.submit()" class="form-select form-select-sm">
                                                    <option value="Menunggu" <?= $row['status']=='Menunggu'?'selected':'' ?>>Menunggu</option>
                                                    <option value="Diproses" <?= $row['status']=='Diproses'?'selected':'' ?>>Diproses</option>
                                                    <option value="Selesai" <?= $row['status']=='Selesai'?'selected':'' ?>>Selesai</option>
                                                    <option value="Diambil" <?= $row['status']=='Diambil'?'selected':'' ?>>Diambil</option>
                                                     <option value="diantar" <?= $row['status'] == 'diantar' ? 'selected' : '' ?>>Diantar</option>
                                                </select>
                                            </form>
                                        </td>
                                        
                                                     <td>
                                                     <?php if (!empty($row['catatan'])): ?>
                                                     <div class="border rounded p-1 small bg-white shadow-sm">
                                                     <?= esc($row['catatan']) ?>
                                                     </div>
                                                    <?php else: ?>
                                                    <span class="text-muted">-</span>
                                                   <?php endif; ?>
                                                   </td>
                                        <td>
                                            
                                            <a href="<?= base_url('admin/cetak_nota/'.$row['id']) ?>" class="btn btn-sm btn-primary" target="_blank">
                                                Cetak Nota
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="9" class="text-center">Belum ada pesanan.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?= view('includes/footer'); ?>
