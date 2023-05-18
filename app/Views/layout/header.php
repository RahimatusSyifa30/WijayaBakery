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
          <a href="<?= base_url('/')?>" class="btn fs-5 btnhover" id="" title="Beranda">Beranda</a>
          <a href="<?= base_url('produk')?>" class="btn fs-5 btnhover" id="" title="Produk">Produk</a>
          <a href="<?= base_url('tentang_kami')?>" class="btn fs-5 btnhover" id="" title="Tentang Kami">Tentang Kami</a>
          <a href="<?= base_url('kontak_kami')?>" target="_blank" class="btn fs-5 btnhover" id="" title="Kontak Kami">Kontak Kami</a>    
           
          <a href="<?= base_url('admin')?>" target="_blank" class="btn fs-5 btnhover" id="" title="Login Admin">Login Admin</a>        
      </div>
      <div class="navbar-extra align-self-center">
        
          
        <a href="<?= base_url('keranjang');?>" class="btn fs-5 btnhover position-relative" title="Keranjang">
          <i data-feather="shopping-cart"></i>
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
          <?= $jumlah_item?>
          </span>
        </a>   
        <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
      </div>
      
</header>