<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Produk</title>
  <link rel="shortcut icon" href="<?= base_url('image/logo/logo.png') ?>" />
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  <link rel="stylesheet" href="<?= base_url('css/basic.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('css/index.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('css/produk.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('css/card-produk.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/izi/css/iziToast.min.css') ?>" />
</head>

<body>
  <!-- Header Start -->
  <?php
  $rootPath = ROOTPATH;
  $filePath = $rootPath . 'app\Views';
  include($filePath . '\layout\header.php') ?>
  <!-- Header End -->
  <img class="bg-slide m-0" src="image/bg/body-head.png" alt="">
  <!--  -->
  <main>
    <?php include($filePath . '\layout\alert.php') ?>
    <div class="mtt">
      <div class="p-4">
        <h1 class="font-lg text-center bakery stroke">Produk Wijaya<span class="text-warning">Bakery.</span></h1>
        <hr class="hr-title">

      </div>
    </div>

    <!-- Jenis Produk  Start  -->
    <section>
      <div class="container jenis-pro">
        <div class="row">
          <div class="col-xs-12 col-md-2 align-self-center text-center p-2">
            <h1 class="stroke">Jenis Produk</h1>
            <hr>
            <br>
            <div>
              <button class="btn mt-2 bg-btnhover-reverse  filter-btn  mb-3 border-0" id="basic-addon2" data-kategori="all" onclick="iziinfo('Menampilkan Semua Jenis Produk'); ">Reset Filter</button>
            </div>
          </div>
          <div class="col-xs-10 col-md-10">
            <div class="swiper mySwiper p-4 justify-content-center">
              <div class="swiper-wrapper">
                <?php foreach ($kel_produk as $jen_pro) : ?>
                  <div class="swiper-slide">
                    <div class="card card-jenis-pro border-warning">
                      <button class="filter-btn btn" data-kategori="<?= str_replace(" ", "", $jen_pro['id_kel']) ?>" onclick="iziinfo('Menampilkan filter Produk  <?= $jen_pro['nama_kel'] ?> ')" style="z-index: 50;">

                        <img src="<?= base_url('image/bg/jenis_produk/') ?><?= $jen_pro["gambar_kel"] ?>" class="card-img-top" alt="..." />

                      </button>
                      <div class="card-body text-center">
                        <h2 class="card-title"><?= $jen_pro["nama_kel"] ?></h2>

                      </div>
                      <button class="bg-btnhover-reverse btn round filter-btn" data-kategori="<?= str_replace(" ", "", $jen_pro['id_kel']) ?>" onclick="iziinfo('Menampilkan filter Produk  <?= $jen_pro['nama_kel'] ?> ')">
                        Lihat Produk
                      </button>
                    </div>
                  </div>
                <?php endforeach ?>
              </div>
              <br>
              <br>
              <div class="swiper-pagination"></div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Jenis Produk  End  -->
    <!-- Seluruh Produk  Start  -->
    <section>
      <div class="container jenis-pro p-4">
        <div class="d-flex justify-content-between">
          <p></p>
          <h1 id="bakery" class="text-center stroke p-3">Cari Produk Wijaya<span class="text-warning">Bakery.</span></h1>
          <p> </p>
        </div>
        <div class="text-center">
          <hr>
          <br>
          <form action="" method="post">
            <div class=" input-group mt-2 mb-3">
              <input type="text" name="cari" id="carites" class="form-control mb-3 bg-white " placeholder="Cari produk...">
              <div class="input-group-append">
                <button type="submit" class="btn bg-btnhover" id="button-addon2">Cari</button>
              </div>
              <div class="input-group-append-2 ms-2">
                <a href="<?= base_url('admin/produk') ?>" class="btn bg-btnhover">Reset</a>
              </div>
            </div>
          </form>
        </div>

        <!--  BUAT SELURUH PRODUK-->
        <div class="mt-4 d-flex flex-fill flex-wrap justify-content-center rounded-2" id="SelProduk">
          <?php $a = 0;
          foreach ($produk as $pro) : ?>
            <!-- <button> -->
            <div class="produk p-3" data-kategori="<?= str_replace(" ", "", $pro['jenis_produk']) ?>" data-stok=<?= $pro['stok_produk'] ?>>
              <?php
              echo form_open('tambah_keranjang');
              echo form_hidden('id', $pro['id_produk']);
              echo form_hidden('price', $pro['harga_produk']);
              echo form_hidden('modal', $pro['modal_produk']);
              echo form_hidden('name', $pro['nama_produk']);
              echo form_hidden('stok', $pro['stok_produk']);
              echo form_hidden('gambar', $pro['gambar_produk']);
              ?>
              <div class="card card-pro border-warning">
                <a href="<?= base_url('detail_produk/' . str_replace(" ", "-", $pro['nama_produk'])) ?>">
                  <img src="<?= base_url('image/roti/') ?><?= $pro["gambar_produk"] ?>" class="card-img-top" alt="..." />
                </a>
                <div class="card-body text-center">
                  <h2 class="card-title title-height align-self-center"><?= $pro["nama_produk"] ?></h2>
                  <div class="body-card  d-flex justify-content-evenly justify-content-center align-items-center" style="opacity: 0.8;">
                    <h4 class="">Stok <?= $pro["stok_produk"] ?></h4>
                    <h4>|</h4>
                    <h4 class="">Rp. <?= $pro["harga_produk"] ?></h4>
                  </div>

                </div>
                <!-- card footer -->
                <button id="add<?= $a ?>" class="btn bg-btnhover-reverse round position-relative" type="submit">
                  <i data-feather="shopping-cart" class="small-w"></i> Tambah ke Keranjang
                </button>
                <!-- -->
              </div>
            </div>
          <?php echo form_close();
            $a++;
          endforeach ?>
          <!-- </button> -->
        </div>
        <div class="pagination justify-content-end mt-md-5 mt-sm-2">
          <?= $pager->links('produk', 'pagination') ?>
        </div>
      </div>
    </section>

    <!-- Seluruh Produk  Start  -->
  </main>
  <!-- Footer Start -->
  <?php include($filePath . '\layout\footer.php') ?>
  <!-- Footer End -->
  <!-- Script Swiper -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
  <script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 3,
      spaceBetween: 20,
      freeMode: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      breakpoints: {
        360: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        450: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
      },
    });
  </script>
  <!-- Script feather-icons -->
  <script src="https://unpkg.com/feather-icons"></script>
  <script>
    feather.replace();
  </script>
  <!-- Script Manual -->
  <script src="<?= base_url('assets/js/produk.js') ?>" type="text/javascript"></script>
  <script src="<?= base_url('assets/js/onkeyup.js') ?>"></script>
  <script src="<?= base_url('assets/js/script.js') ?>" type="text/javascript"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
  <!-- <script src="<?= base_url('assets/izi/js/iziToast.js') ?>" type="text/javascript"></script> -->
  <script src="<?= base_url('assets/izi/js/iziToast.min.js') ?>" type="text/javascript"></script>

</body>

</html>