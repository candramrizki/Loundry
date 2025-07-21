<?php


$promo = $promo ?? 'Tidak ada promo';
$ringkasan_pesanan = $ringkasan_pesanan ?? 0;
$total_tagihan = $total_tagihan ?? 0;
$status = $status ?? '-';
$jadwal = $jadwal ?? [];
$user = $user ?? ['nama'=>'-', 'email'=>'-', 'no_hp'=>'-', 'foto'=>'default.jpg'];
$layanan = $layanan ?? [];
$nama = session()->get('username');
?>

<?= $this->include('includes/header'); ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<style>
     body {
    min-height: 50vh;
    background: url('<?= base_url('assets/compiled/jpg/baner2.jpg') ?>') no-repeat center center fixed;
    background-size: cover;
    background-attachment: fixed;
}
html {
    height: 100%;
}

    .dashboard-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
        flex-wrap: wrap;
        gap: 1rem;
    }
    .dashboard-header .greeting {
        font-size: 1.2rem;
        font-weight: 500;
    }
    .dashboard-header .logout-btn {
        background: #ff4d4f;
        color: #fff;
        border: none;
        padding: 0.5rem 1.2rem;
        border-radius: 20px;
        font-weight: 500;
        transition: background 0.2s;
    }
    .dashboard-header .logout-btn:hover {
        background: #d9363e;
        color: #fff;
    }
    .card-summary {
        transition: box-shadow 0.2s;
        border: none;
        border-radius: 1rem;
        height: 100%;
        background: linear-gradient(135deg, #f8fafc 60%, #e0e7ff 100%);
    }
    .card-summary:hover {
        box-shadow: 0 0 16px #e0e0e0;
        background: linear-gradient(135deg, #e0e7ff 60%, #f8fafc 100%);
    }
    .icon-summary {
        font-size: 2.3rem;
        margin-bottom: 0.5rem;
        color: #0d6efd;
        display: inline-block;
    }
    /* Animasi icon */
    @keyframes pulse {
        0% { transform: scale(1);}
        50% { transform: scale(1.18);}
        100% { transform: scale(1);}
    }
    @keyframes rotate {
        0% { transform: rotate(0deg);}
        100% { transform: rotate(360deg);}
    }
    @keyframes shake {
        0%,100% { transform: translateX(0);}
        20%,60% { transform: translateX(-4px);}
        40%,80% { transform: translateX(4px);}
    }
    .icon-pulse { animation: pulse 1.2s infinite; }
    .icon-rotate { animation: rotate 1.5s linear infinite; }
    .icon-shake  { animation: shake 0.7s infinite; }
    .badge-status {
        font-size: 0.9rem;
        padding: 0.4em 1em;
        border-radius: 1em;
    }
    .badge-status.Menunggu { background: #ffe58f; color: #ad6800; }
    .badge-status.Diproses { background: #bae7ff; color: #0050b3; }
    .badge-status.Selesai { background: #b7eb8f; color: #237804; }
    .badge-status.Dibatalkan { background: #ffa39e; color: #a8071a; }
    .pay-logo {
        height: 24px;
        margin: 0 4px 4px 0;
        vertical-align: middle;
        background: #fff;
        border-radius: 6px;
        box-shadow: 0 1px 4px #eee;
        padding: 2px 6px;
    }
    .form-select.metodeBayar {
        height: 32px !important;
        font-size: 0.95rem;
        padding-top: 2px;
        padding-bottom: 2px;
    }
    @media (max-width: 576px) {
        .dashboard-header {
            flex-direction: column;
            align-items: flex-start;
        }
        .select2-container--open .select2-dropdown {
            left: 0 !important;
            width: 100vw !important;
            min-width: 0 !important;
            max-width: 100vw !important;
        }
    }
    .select2-container .select2-selection--single {
        height: 32px !important;
        font-size: 0.95rem;
        padding-top: 2px;
        padding-bottom: 2px;
        z-index: 9999 !important;
    }
    .select2-results__options {
        max-height: 300px !important;
        overflow-y: auto !important;
    }
</style>
<?php if (session()->getFlashdata('pesan_sukses')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill"></i>
        <?= session()->getFlashdata('pesan_sukses') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<div class="container py-4">
    <!-- Header & Logout -->
    <div class="dashboard-header">
        <div class="greeting">
            <p class="mb-0">👋 Selamat datang, <span class="text-primary"><?= esc($nama) ?></span>!</p>
        </div>
       <!-- Lonceng Notifikasi Pesanan -->

<div class="d-flex justify-content-end align-items-center gap-3 mb-3">
    <!-- Lonceng Notifikasi -->
<!-- Lonceng Notifikasi dengan Dropdown -->
<div class="dropdown d-inline-block">
    <span class="position-relative" data-bs-toggle="dropdown" style="cursor:pointer;">
        <i class="bi bi-bell fs-4"></i>
        <?php
        $notifs = [];
        foreach($jadwal as $j) {
            $statusPesanan = strtolower($j['status'] ?? '');
            if ($statusPesanan === 'menunggu' || $statusPesanan === 'diproses') $notifs[] = $j;
        }
        $jumlahNotif = count($notifs);
        ?>
        <?php if ($jumlahNotif > 0): ?>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                <?= $jumlahNotif ?>
            </span>
        <?php endif; ?>
    </span>
    <ul class="dropdown-menu dropdown-menu-end mt-2">
        <?php if ($jumlahNotif > 0): ?>
            <?php foreach($notifs as $n): ?>
                <li class="dropdown-item">
                    Pesanan #<?= $n['id'] ?? '-' ?>: <b><?= ucfirst($n['status']) ?></b>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li class="dropdown-item text-muted">Tidak ada notifikasi</li>
        <?php endif; ?>       
         <style>
        /* Modern Card */
        .card-modern {
            border-radius: 18px;
            box-shadow: 0 2px 16px #0001;
            transition: transform .2s;
            background: linear-gradient(135deg, #f3f6fd 60%, #e0e7ff 100%);
        }
        .card-modern:hover {
            transform: translateY(-4px) scale(1.03);
        }
        .card-modern .card-body {
            padding: 1.5rem 1rem;
        }
        .card-modern h2 {
            font-weight: bold;
            font-size: 2.2rem;
            margin: 0;
        }
        .card-modern h5 {
            font-weight: 600;
            color: #555;
        }
        @media (max-width: 768px) {
            .row.flex-wrap {
                flex-direction: column !important;
            }
            .card-modern {
                margin-bottom: 1rem;
            }
        }
        
        /* Modern Table */
        .table-modern {
            border-radius: 12px;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 2px 12px #0001;
        }
        .table-modern th {
            background: #f3f6fd;
            font-weight: 600;
            color: #333;
        }
        .table-modern td, .table-modern th {
            vertical-align: middle;
        }
        .badge-status {
            padding: 0.4em 1em;
            border-radius: 1em;
            font-size: 0.95em;
        }
        .badge-status.Menunggu { background: #ffe066; color: #856404; }
        .badge-status.Diproses { background: #6ec1e4; color: #155a8a; }
        .badge-status.Selesai  { background: #51cf66; color: #155724; }
        .badge-status.Diambil  { background: #adb5bd; color: #343a40; }
        </style>
    </ul>
</div>
    <!-- Tombol Logout -->
    <a href="<?= base_url('logout') ?>" class="btn btn-danger">Logout</a>
</div>
</div>  

    <!-- Banner Promo -->
  

    <!-- Ringkasan Pesanan -->
    <div class="row text-center mb-4 g-3">
        <div class="col-12 col-md-4">
            <div class="card card-summary shadow-sm h-100">
                <div class="card-body p-2">
                    <div class="icon-summary icon-rotate"><i class="bi bi-basket"></i></div>
                    <div class="fw-bold small">Pesanan</div>
                    <div class="fs-4"><?= esc($ringkasan_pesanan) ?></div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card card-summary shadow-sm h-100">
                <div class="card-body p-2">
                    <div class="icon-summary icon-pulse"><i class="bi bi-cash-coin"></i></div>
                    <div class="fw-bold small">Tagihan</div>
                    <div class="fs-4 text-success">Rp<?= number_format($total_tagihan,0,',','.') ?>-Lunas</div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card card-summary shadow-sm h-100">
                <div class="card-body p-2">
                    <div class="icon-summary icon-shake"><i class="bi bi-info-circle"></i></div>
                    <div class="fw-bold small">Status</div>
                    <div class="fs-6"><?= esc($status) ?></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Order Cepat -->
    <div class="card mb-4 shadow rounded-4">
        <div class="card-body">
            <h5 class="mb-3"><i class="bi bi-plus-circle"></i> Buat Pesanan Baru</h5>
            <form action="<?= base_url('pesanan/buat') ?>" method="post">
                <?= csrf_field() ?>
                <div class="mb-2">
                    <input type="text" class="form-control form-control-sm rounded-3" name="nama_lengkap" placeholder="Nama Lengkap" required>
                </div>
                <div class="mb-2">
                    <input type="text" class="form-control form-control-sm rounded-3" name="alamat" placeholder="Alamat Lengkap" required>
                </div>
                <div class="mb-2">
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">+62</span>
                        <input type="text" class="form-control" name="kontak" placeholder="Nomor Kontak" pattern="[0-9]{9,15}" required>
                    </div>
                </div>
                <div class="mb-2">
                    <select class="form-control form-control-sm" name="layanan" required>
                        <option value="">Pilih Layanan</option>
                        <?php if (!empty($layanan)): ?>
                            <?php foreach($layanan as $l): ?>
                                <option value="<?= esc($l['id']) ?>">
                                    <?= esc($l['nama_layanan']) ?> (Rp<?= number_format($l['harga_per_kg'],0,',','.') ?>/kg)
                                </option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="">Layanan belum tersedia</option>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="mb-2">
                    <input type="number" class="form-control form-control-sm" name="berat" min="1" placeholder="Estimasi Berat (kg)" required>
                </div>
                <div class="mb-2">
                    <input type="datetime-local" class="form-control form-control-sm" name="waktu" required>
                </div>
                <div class="mb-2">
                    <label for="metodeBayar" class="form-label fw-bold d-block">Metode Pembayaran</label>
                  <select class="form-select form-select-sm metodeBayar w-100" name="metode_pembayaran" id="metodeBayar" required>
                        <option value="">Pilih Metode Pembayaran</option>
                        <optgroup label="Kartu Debit/Kredit">
                            <option value="VISA">VISA</option>
                            <option value="MASTERCARD">MasterCard</option>
                        </optgroup>
                        <optgroup label="ATM / Bank Transfer">
                            <option value="BCA">BCA</option>
                            <option value="BNI">BNI</option>
                            <option value="BRI">BRI</option>
                            <option value="MANDIRI">Mandiri</option>
                        </optgroup>
                        <optgroup label="E-Money">
                            <option value="OVO">OVO</option>
                            <option value="GOPAY">GoPay</option>
                            <option value="DANA">DANA</option>
                            <option value="SHOPEEPAY">ShopeePay</option>
                        </optgroup>
                        <optgroup label="Direct Debit">
                            <option value="BCA_KlikPay">BCA KlikPay</option>
                            <option value="CIMB_Clicks">CIMB Clicks</option>
                        </optgroup>
                        <optgroup label="Over the Counter">
                            <option value="ALFAMART">Alfamart</option>
                            <option value="INDOMARET">Indomaret</option>
                        </optgroup>
                        <optgroup label="Cicilan tanpa Kartu">
                            <option value="AKULAKU">Akulaku</option>
                        </optgroup>
                        <optgroup label="QRIS">
                            <option value="QRIS">QRIS</option>
                        </optgroup>
                        <option value="Cash">Cash</option>
                    </select>
                </div>
                <div class="mb-2" id="logoBayar" style="min-height:28px;"></div>
                <div class="mb-2">
                    <input type="text" class="form-control form-control-sm" name="catatan" placeholder="Catatan">
                </div>
                <button class="btn btn-primary w-100 rounded-3 mt-2"><i class="bi bi-send"></i> Pesan</button>
            </form>
        </div>
    </div>
    <script>
    // Aktifkan Select2 untuk metode pembayaran
    $(document).ready(function() {
        $('#metodeBayar').select2({
            width: '100%',
            dropdownAutoWidth: true,
            dropdownCssClass: "select2-sm",
            minimumResultsForSearch: 10,
            dropdownParent: $('#metodeBayar').parent()
        });
    });

    // Map logo file (letakkan file logo di public/assets/payment/)
    const logoMap = {
        VISA:      'visa.png',
        MASTERCARD:'mastercard.png',
        BCA:       'bca.png',
        BNI:       'bni.png',
        BRI:       'bri.png',
        MANDIRI:   'mandiri.png',
        OVO:       'ovo.png',
        GOPAY:     'gopay.png',
        DANA:      'dana.png',
        SHOPEEPAY: 'shopeepay.png',
        BCA_KlikPay:'bca_klikpay.png',
        CIMB_Clicks:'cimb_clicks.png',
        ALFAMART:  'alfamart.png',
        INDOMARET: 'indomaret.png',
        AKULAKU:   'akulaku.png',
        QRIS:      'qris.png',
        Cash:      'cash.png'
    };
    document.addEventListener('DOMContentLoaded', function() {
        const metodeBayar = document.getElementById('metodeBayar');
        const logoBayar = document.getElementById('logoBayar');
        metodeBayar.addEventListener('change', function() {
            const val = this.value;
            if (logoMap[val]) {
                logoBayar.innerHTML = `<img src="<?= base_url('assets/payment/') ?>${logoMap[val]}" alt="${val}" class="pay-logo">`;
            } else {
                logoBayar.innerHTML = '';
            }
        });
    });
    </script>

    <!-- Status Pesanan Terakhir -->
    <div class="card mb-4 shadow rounded-4">
        <div class="card-body">
            <h6><i class="bi bi-clock-history"></i> Status Pesanan Terakhir</h6>
            <ul class="list-group list-group-flush">
                <?php foreach($jadwal as $j): ?>
<li class="list-group-item d-flex justify-content-between align-items-center">
    <span>
        <?= esc($j['waktu'] ?? '-') ?> -
        <?= esc($j['jenis'] ?? '-') ?> 
        <?= esc($j['berat'] ?? '-') ?> kg, 
        Rp<?= number_format($j['total_harga'] ?? 0,0,',','.') ?>
    </span>
    <span class="text-end">
        <div class="badge badge-status <?= esc($j['status'] ?? 'Menunggu') ?>">
            <?= esc($j['status'] ?? '-') ?>
        </div>
        <?php if (strtolower($j['status']) == 'diantar' && !empty($j['waktu_diantar'])): ?>
            <?php
                $elapsed = time() - strtotime($j['waktu_diantar']);
                $menit = floor($elapsed / 60);
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
            <br><small class="text-muted"><?= $tracking ?> (<?= $menit ?> menit)</small>
        <?php endif; ?>
    </span>
</li>
<?php endforeach ?>
            </ul>
        </div>
    </div>
</div>

<?= $this->include('includes/footer'); ?>