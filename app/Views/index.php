<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Wijaya Bakery - Beranda</title>
  <link rel="shortcut icon" href="<?= base_url('image/logo/logo.png') ?>" />
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  <link rel="stylesheet" href="<?= base_url('css/basic.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('css/index1.css') ?>" />

</head>

<body>
  <!-- Header Start -->
  <?php include "layout/header.php" ?>
  <div>

    <img class="bg-slide" src="image/bg/body-head.png" alt="">
  </div>
  <!-- Header End -->
  <content>
    <!-- <section class="beranda" id="beranda"> -->
    <div id="carouselExampleIndicators" class="carousel slide mtt mb-5" data-bs-ride="carousel">
      <!-- <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div> -->
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="row justify-content-center">
            <div class="col-md-5 col-xs-12 ">
              <div class="bggg">
                <h1 class="text-beranda stroke">Selamat Datang <br>di Wijaya<span class="text-warning">Bakery.</span></h1>
                <p class="text-p">Tambahkan lebih banyak momen manis dengan produk kami.</p>
              </div>
            </div>
            <div class="col-md-5 col-xs-12 p-4 ">
              <div class="w-75 card cardd">
                <img src="image/roti/bee_roll.jpeg" class=" image card-img-bottom" alt="..." />
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="row justify-content-center">
            <div class="col-md-5 col-xs-12 p-4 ">
              <div class="w-75 card cardd">
                <img src="image/roti/pisang_coklat.jpeg" class="d-block image card-img-top" alt="..." />
              </div>
            </div>
            <div class="col-md-5 col-xs-12 ms-md-5 ms-sm-0">
              <div class="bggg">
                <h1 class="text-beranda stroke">Kami menyediakan Produk yang <span class="text-warning">Murah</span> dan<span class="text-warning"> Berkualitas.</span></h1>
                <p class="text-p">Banyak jenis produk yang kami sediakan.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="row justify-content-center">
            <div class="col-md-5 col-xs-12 ">
              <div class="bggg">
                <h1 class="text-beranda stroke">Daftar akun di Wijaya<span class="text-warning">Bakery.</span></h1>
                <p class="text-p">Menerima pemesanan roti sampai 1500 pcs.</p>
              </div>
            </div>
            <div class="col-md-5 col-xs-12 p-4  ">
              <div class="w-75 card cardd">
                <img src="image/roti/palm_roll.jpeg" class="d-block image card-img-top" alt="..." />
              </div>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev border-dark" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden border-dark">Previous</span>
        </button>
        <button class="carousel-control-next border-dark" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden border-dark">Next</span>
        </button>
      </div>
    </div>
    <!-- </section> -->
    <br><br><br>
    <div class="text-center mtt  bg-warning bg-opacity-10 rounded-5 p-4">
      <h1 class="text-beranda stroke"><i class="text-warning bi-star-fill"></i> Best Seller Wijaya<span class="text-warning">Bakery.</span></h1>

      <div class="swiper mySwiper p-4 mtt justify-content-center">
        <div class="swiper-wrapper">
          <?php foreach ($produk as $jen_pro) : ?>
            <a href="<?= base_url('detail_produk/' . $jen_pro['nama_produk']) ?>" class="text-decoration-none">
              <div class="swiper-slide">
                <div class="card card-jenis-pro border-warning">
                  <img src="<?= base_url('image/roti/') ?><?= $jen_pro["gambar_produk"] ?>" class="card-img-top" alt="..." />
                  </button>
                  <div class="card-body text-center">
                    <h2 class="card-title bakery"><?= $jen_pro["nama_produk"] ?></h2>
                  </div>
                  <a class="bg-btnhover-reverse btn round filter-btn" href="<?= base_url('detail_produk/' . $jen_pro['nama_produk']) ?>">
                    Lihat Produk
                  </a>
                </div>
              </div>
            </a>
          <?php endforeach ?>
        </div>
        <br>
        <br>
        <div class="swiper-pagination"></div>
      </div>
    </div>
    <br><br><br>
    <div class="row justify-content-center">
      <div class="col-md-5 col-xs-12 ">
        <div class="bggg">
          <h1 class="text-beranda stroke">Tentang kami Wijaya<span class="text-warning">Bakery.</span></h1>
          <p class="text-p">Wijaya Bakery menjual berbagai macam produk,
            <a href="<?= base_url('tentang_kami') ?>" class="text-decoration-none btnhover font-sm">Baca Selengkapnya...</a>
          </p>
        </div>
      </div>
      <div class="col-md-5 col-xs-12 p-4 ">
        <div class="w-75 card cardd">
          <img src="image/roti/roti_sosis.jpeg" class=" image card-img-bottom" alt="..." />
        </div>
      </div>
    </div>
    <br><br><br>
    <div class="row justify-content-center bg-warning bg-opacity-10">
      <div class="col-md-5 col-xs-12 p-4 ">
        <div class="w-75 card cardd">
          <img src="image/roti/roti_pandan.jpeg" class=" image card-img-bottom" alt="..." />
        </div>
      </div>
      <div class="col-md-5 col-xs-12">
        <div class="bggg ms-5 text-center ">
          <h1 class="text-beranda stroke">Hubungi kami Wijaya<span class="text-warning">Bakery.</span></h1>
          <a href="<?= base_url('kontak_kami') ?>" class=" text-end btn bg-btnhover">
            <h3>Klik Disini</h3>
          </a>
        </div>
      </div>
    </div>
  </content>

  <?php include "layout/footer.php" ?>

  <!-- Script feather-icons -->
  <script src="https://unpkg.com/feather-icons"></script>
  <script>
    feather.replace();
  </script>
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
  <!-- Script Manual -->
  <script src="<?= base_url("assets/js/script.js") ?>" type="text/javascript"></script>

</body>

</html>