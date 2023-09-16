<header class="sticky-top">
  <?php
  date_default_timezone_set('Asia/Jakarta');

  ?>
  <nav class="navbar navbar-expand-lg bg-body-tertiary border-2 border-bottom border-warning sticky-top" id="header">
    <div class="container-fluid">
      <a href="<?= base_url('/') ?>" title="Logo WijayaBakery." class="navbar-brand stroke">
        <h1 class="bakery">Wijaya<span class="text-warning">Bakery.</span></h1>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <a href="<?= base_url('keranjang'); ?>" class="btn fs-5 featherr position-relative" title="Keranjang">
            <i data-feather="shopping-cart"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
              <?= $jumlah_item ?>
            </span>

          </a>
          <h3 class="offcanvas-title stroke coklat" id="offcanvasNavbarLabel">Menu Wijaya<span class="text-warning">Bakery.</span></h3>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a href="<?= base_url('/') ?>" class="nav-link btn btnhover fs-5" title="Beranda">Beranda</a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('produk') ?>" class="nav-link btn btnhover fs-5" title="Produk">Produk</a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('tentang_kami') ?>" class="nav-link btn btnhover fs-5" title="Tentang Kami">Tentang Kami</a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('kontak_kami') ?>" class="nav-link btn btnhover fs-5" title="Kontak Kami">Kontak Kami</a>
            </li>
            <!-- <li class="nav-item">
              <a href="<?= base_url('admin/login') ?>" target="_blank" class="nav-link btn btnhover fs-5" title="Login Admin">Login Admin</a>
            </li> -->

            <li class="nav-item mt-lg-2 mt-sm-5">
              <a href="<?= base_url('keranjang'); ?>" class="btn btnhover fs-5 featherr position-relative" title="Keranjang " id="keranjang">
                <i data-feather="shopping-cart"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                  <?= $jumlah_item ?>
                </span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</header>