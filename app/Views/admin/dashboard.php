<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 <!-- CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/compiled/css/app.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/compiled/css/app-dark.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/compiled/css/iconly.css'); ?>">
   
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets/compiled/jpg/loundry.jpg'); ?>" type="image/x-icon">

    <title>Dashboard - Mazer Admin Dashboard</title>
</head>

<body>
    <!-- Inisialisasi tema -->
    <script src="<?= base_url("./assets/compiled/jpg/loundry.jpg"); ?>"></script>
    <div id="app">
        <div id="sidebar">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="index.html"><img src="/assets/compiled/jpg/loundry.jpg" alt="Logo" srcset=""></a>

                        </div>
                        <div class="theme-toggle d-flex gap-2 align-items-center mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                                role="img" class="iconify iconify--system-uicons" width="20" height="20"
                                preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                                <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path
                                        d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                                        opacity=".3"></path>
                                    <g transform="translate(-210 -1)">
                                        <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                        <circle cx="220.5" cy="11.5" r="4"></circle>
                                        <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path>
                                    </g>
                                </g>
                            </svg>
                            <div class="form-check form-switch fs-6">
                                <input class="form-check-input me-0" type="checkbox" id="toggle-dark" style="cursor: pointer">
                                <label class="form-check-label"></label>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                                role="img" class="iconify iconify--mdi" width="20" height="20" preserveAspectRatio="xMidYMid meet"
                                viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                                </path>
                            </svg>
                        </div>
                        <div class="sidebar-toggler x">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>
                        <li class="sidebar-item active">
                           
                  <a href="<?= base_url('admin/dashboard') ?>" class='sidebar-link'>
                  <i class="bi bi-grid-fill"></i>
                  <span>Dashboard</span>
                  </a>
                        </li>
                       
                        <li class="sidebar-item">
                            <a href="pelanggan" class='sidebar-link'>
                                <i class="bi bi-people-fill"></i> <!-- Ganti dari bi-stack -->
                                <span>Data Pelanggan</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="pesanan" class='sidebar-link'>
                                <i class="bi bi-receipt-cutoff"></i> <!-- Ikon untuk Pesanan -->
                                <span>Pesanan</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="lp_keuangan" class='sidebar-link'>
                                <i class="bi bi-cash-coin"></i>
                                <span>Laporan Keuangan</span>
                            </a>
                        </li>
                         <!-- Menu Logout di bawah -->
            <ul class="menu mb-3">
                <li class="sidebar-item">
                    <a href="<?= base_url('logout') ?>" class="sidebar-link text-danger">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
                        
                </div>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
                
            </header>

            <div class="page-heading">
                <h3>Profile Statistics</h3>
            </div>
            <div class="page-content">
                <section class="row">
                   
                        <div class="row">
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                                <div class="stats-icon purple mb-2">
                                                    <i class="iconly-boldBag"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">Total Pesanan</h6>
                                                <h6 class="font-extrabold mb-0">112.000</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                                <div class="stats-icon blue mb-2">
                                                    <i class="iconly-boldSend"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">Pelanggan</h6>
                                                <h6 class="font-extrabold mb-0">183.000</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                                <div class="stats-icon green mb-2">
                                                    <i class="iconly-boldAdd-User"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">Status Pesanan</h6>
                                                <h6 class="font-extrabold mb-0">80.000</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                                <div class="stats-icon red mb-2">
                                                    <i class="iconly-boldBookmark"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">Total Pendapatan</h6>
                                                <h6 class="font-extrabold mb-0">1.152.000</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                

                        <!-- Tambahkan di bagian sebelum penutup </div> terakhir -->
                        <div class="row mt-4">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Grafik Statistik</h5>
                                </div>
                                <div class="card-body">
                                    <canvas id="statistikChart" height="100"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>


                         <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Profile Visit</h4>
                        </div>
                        <div class="card-body">
                            <div id="chart-profile-visit"></div>
                        </div>
                    </div>
                </div>
            </div>

            
<!-- Chart.js (untuk grafik) -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            // Ambil data dari HTML
            const totalPesanan = parseInt(document.querySelectorAll('.card-body h6.font-extrabold.mb-0')[0].innerText.replace(/\D/g, '')) || 0;
            const pelanggan = parseInt(document.querySelectorAll('.card-body h6.font-extrabold.mb-0')[1].innerText.replace(/\D/g, '')) || 0;
            const statusPesanan = parseInt(document.querySelectorAll('.card-body h6.font-extrabold.mb-0')[2].innerText.replace(/\D/g, '')) || 0;
            const totalPendapatan = parseInt(document.querySelectorAll('.card-body h6.font-extrabold.mb-0')[3].innerText.replace(/\D/g, '')) || 0;

            const ctx = document.getElementById('statistikChart').getContext('2d');
            const statistikChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Total Pesanan', 'Pelanggan', 'Status Pesanan', 'Pendapatan'],
                    datasets: [{
                        label: 'Statistik Laundry',
                        data: [totalPesanan, pelanggan, statusPesanan, totalPendapatan],
                        backgroundColor: [
                            'rgba(153, 102, 255, 0.6)',
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(75, 192, 192, 0.6)',
                            'rgba(255, 99, 132, 0.6)'
                        ],
                        borderColor: [
                            'rgba(153, 102, 255, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(255, 99, 132, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    animation: {
                        duration: 1000,
                        easing: 'easeOutBounce'
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>

        <!-- Script tambahan -->
        <script src="<?= base_url('assets/static/js/components/dark.js'); ?>"></script>
        <script src="<?= base_url('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js'); ?>"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url('assets/compiled/js/app.js'); ?>"></script>
        <script src="<?= base_url('assets/extensions/apexcharts/apexcharts.min.js'); ?>"></script>
        <script src="<?= base_url('assets/static/js/pages/dashboard.js'); ?>"></script>
    </div>
</body>

</html>

