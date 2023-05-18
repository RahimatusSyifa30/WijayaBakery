<header>
  <?php
  date_default_timezone_set('Asia/Jakarta'); 

?>
      <div
        class="nav justify-content-between border-2 border-bottom border-warning p-lg-4 p-sm-3 p-2" 
        id="header"
      >
        <div id="nav-logo" class="align-self-center">
          <a href="<?= base_url('/')?>" title="Logo WijayaBakery." class="text-dark text-decoration-none stroke"
            ><h1 id="bakery">Wijaya<span class="text-warning">Bakery.</span></h1></a
          >
        </div>
        
        <div class="nav-item align-self-center">
        
          <a href="<?= base_url('admin')?>" class="btn fs-5 btnhover" id="" title="Pesanan">Pesanan</a>
          <a href="<?= base_url('admin/produk')?>" class="btn fs-5 btnhover" id="" title="Produk">Produk</a>
          <a href="<?= base_url('admin/riwayat')?>" class="btn fs-5 btnhover" id="" title="Riwayat Transaksi">Riwayat Transaksi</a>
          <a href="<?= base_url('admin/laporan')?>" class="btn fs-5 btnhover" id="" title="Laporan Keuangan">Laporan Keuangan</a>
          <a href="<?= base_url('')?>" class="btn fs-5 btn-danger btnhover" id="" title="Keluar">Keluar</a>             
      </div>
      <div class="navbar-extra align-self-center">
      <a href="<?= base_url('admin/keranjang')?>" class="btn fs-5  position-relative" title="Keranjang">
          <i data-feather="shopping-cart" class="featherr"></i>
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
    <?=$jumlah_item?>
          </span>
        </a>   
        <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
      </div>
      
</header>