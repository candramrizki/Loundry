<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <img src="<?= base_url("./assets/compiled/jpg/loundry.jpg") ?>" alt="Logo" srcset="">
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                <li class="sidebar-item <?= service('uri')->getSegment(2) == 'dashboard' ? 'active' : '' ?>">
                    <a href="<?= base_url('pelanggan/dashboard') ?>" class="sidebar-link">
                        <i class="bi bi-house-door-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="<?= base_url('pelanggan/pesanan') ?>" class="sidebar-link">
                        <i class="bi bi-cart-fill"></i>
                        <span>Pesan Laundry</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="<?= base_url('logout') ?>" class="sidebar-link">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Keluar</span>
                    </a>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
