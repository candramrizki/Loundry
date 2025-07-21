<?= view('includes/header'); ?> 
<?= view('includes/sidebar'); ?> 

<div id="main"> 
<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none"> 
        <i class="bi bi-justify fs-3"></i> </a> 
</header> 
    <div class="page-heading"> 
        <h3>Tambah Paket</h3> 
    </div> 
    <div class="page-content"> 
        <div class="card"> 
            <div class="card-header"> 
                <h4 class="card-title">Form Tambah Paket</h4> 
            </div> 
            <div class="card-body"> 
                <form action="<?= base_url('admin/simpan-paket') ?>" method="post" class="form form-horizontal"> 
    <div class="form-body">
                <div class="row mb-3">
          <label for="kode-paket-horizontal-icon" class="col-md-4 col-form-label">Kode Paket</label>
          <div class="col-md-8">
            <div class="form-group has-icon-left">
              <div class="position-relative">
                <input type="text" class="form-control" id="kode-paket-horizontal-icon" name="kode_paket" placeholder="Kode Paket">
                <div class="form-control-icon">
                  <i class="bi bi-qr-code"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row mb-3">
          <label for="nama-paket-horizontal-icon" class="col-md-4 col-form-label">Nama Paket</label>
          <div class="col-md-8">
            <div class="form-group has-icon-left">
              <div class="position-relative">
                <input type="text" class="form-control" id="nama-paket-horizontal-icon" name="nama_paket" placeholder="Nama Paket">
                <div class="form-control-icon">
                  <i class="bi bi-box"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row mb-3">
          <label for="harga-horizontal-icon" class="col-md-4 col-form-label">Harga</label>
          <div class="col-md-8">
            <div class="form-group has-icon-left">
              <div class="position-relative">
                <input type="number" class="form-control" id="harga-horizontal-icon" name="harga" placeholder="Harga">
                <div class="form-control-icon">
                  <i class="bi bi-cash-stack"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn btn-primary me-1">Simpan</button>
            <a href="<?= base_url('admin/paket'); ?>" class="btn btn-light">Kembali</a>
          </div>
        </div>

      </div>
    </form>
  </div>
</div>
</div> 
</div> 
<?= view('includes/footer'); ?>