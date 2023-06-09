<header>
  <?php
  date_default_timezone_set('Asia/Jakarta'); 
  
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary border-2 border-bottom border-warning" id="header">
  <div class="container-fluid">
  
    <a href="<?= base_url('/')?>" title="Logo WijayaBakery." class="navbar-brand stroke">
      <h1 class="bakery">Wijaya<span class="text-warning">Bakery.</span></h1>
    </a>    
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
          <a href="<?= base_url('admin/keranjang');?>" class="btn fs-5 featherr position-relative" title="Keranjang">
            <i data-feather="shopping-cart"></i> 
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
              <?= $jumlah_item?>
              </span>
              
            </a>
        <h3 class="offcanvas-title stroke coklat" id="offcanvasNavbarLabel">Menu Wijaya<span class="text-warning">Bakery.</span></h3>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a href="<?= base_url('admin')?>" class="nav-link btn btnhover fs-5" title="Pesanan" aria-current="page">Pesanan</a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/produk')?>" class="nav-link btn btnhover fs-5" title="Produk">Produk</a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/riwayat')?>" class="nav-link btn btnhover fs-5" title="Riwayat Transaksi">Riwayat Transaksi</a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/laporan')?>" class="nav-link btn btnhover fs-5" title="Laporan Keuangan">Laporan Keuangan</a>
          </li>
          <li class="nav-item">
            <form action="<?= base_url('admin/logout') ?>" method="get">
            <button type="submit" class="btn btn-danger btn-lg">Log Out</button>
            <!-- <a href="<?= base_url('')?>" class="nav-link bg-danger btn btnhover fs-5" title="Keluar">Keluar</a> -->
            </form>             
          </li>
          
          <li class="nav-item mt-lg-2 mt-sm-5" >
            <a href="<?= base_url('admin/keranjang');?>" class="btn btnhover fs-5 featherr position-relative" title="Keranjang " id="keranjang">
            <i data-feather="shopping-cart"></i> 
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
              <?= $jumlah_item?>
              </span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
</header>