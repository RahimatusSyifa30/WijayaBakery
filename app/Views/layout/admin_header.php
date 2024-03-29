<header class="sticky-top">
  <?php
  date_default_timezone_set('Asia/Jakarta');

  ?>
  <nav class="navbar navbar-expand-lg bg-body-tertiary border-2 border-bottom border-warning " id="header">
    <div class="container-fluid">

      <a href="<?= base_url('/') ?>" title="Logo WijayaBakery." class="navbar-brand stroke">
        <h1 class="bakery">Wijaya<span class="text-warning">Bakery.</span></h1>
      </a>
      <button class="navbar-toggler " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <div class="d-flex">
            <a href="<?= base_url('admin/keranjang'); ?>" class="btn fs-5 position-relative" title="Keranjang">
              <i class="" data-feather="shopping-cart"></i>
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                <?= $jumlah_item ?>
              </span>
            </a>
            <button class="ms-3 nav-link btn btnhover fs-5" id="showw" onclick="profil()" title="Akun"><i data-feather="user"></i></button>
          </div>
          <h3 class="offcanvas-title stroke coklat" id="offcanvasNavbarLabel">Menu Wijaya<span class="text-warning">Bakery.</span></h3>
          <button type="button" class="btn-close p-4" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <hr class="m-0 border-2 border-warning tes">
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a href="<?= base_url('admin') ?>" class="nav-link btn btnhover fs-5" title="Pesanan" aria-current="page">Pesanan</a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/produk') ?>" class="nav-link btn btnhover fs-5" title="Produk">Produk</a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/riwayat') ?>" class="nav-link btn btnhover fs-5" title="Riwayat Transaksi">Riwayat Transaksi</a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/laporan') ?>" class="nav-link btn btnhover fs-5" title="Laporan Keuangan">Laporan Keuangan</a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/view_verif') ?>" class="nav-link btn btnhover fs-5" title="Daftar User">Daftar User</a>
            </li>


            <li class="nav-item mt-lg-2 mt-sm-5">
              <a href="<?= base_url('admin/keranjang'); ?>" class="btn btnhover fs-5 featherr position-relative dis-none" title="Keranjang " id="keranjang">
                <i class="" data-feather="shopping-cart"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                  <?= $jumlah_item ?>
                </span>
              </a>
            </li>
            <li class="nav-item ms-2">
              <button class="nav-link btn btnhover fs-5 dis-none" id="showw" onclick="profil()" title="Akun"><i data-feather="user"></i></button>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</header>
<?php include('profil_akun.php') ?>