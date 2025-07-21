<?php echo $this->include('includes/header'); ?>
<?php echo $this->include('includes/sidebar'); ?>

<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h3>Laporan Keuangan</h3>
    </div>

    <div class="page-content">
        <section class="row justify-content-center">
            <div class="col-12 col-md-10">
                <div class="row g-4 mb-4">
                    <div class="col-12 col-md-4">
                        <div class="card text-white bg-success mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title">Pendapatan Harian</h5>
                                <p class="card-text fs-4">
                                    Rp<?= number_format($total_harian ?? 0, 0, ',', '.') ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="card text-white bg-warning mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title">Pendapatan Mingguan</h5>
                                <p class="card-text fs-4">
                                    Rp<?= number_format($total_mingguan ?? 0, 0, ',', '.') ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="card text-white bg-primary mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title">Pendapatan Bulanan</h5>
                                <p class="card-text fs-4">
                                    Rp<?= number_format($total_bulanan ?? 0, 0, ',', '.') ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<?php echo $this->include('includes/footer'); ?>