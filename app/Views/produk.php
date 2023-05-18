<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Wijaya Bakery - Menu</title>
    <link rel="shortcut icon" href="image/logo/logo.png" />
    <!-- Bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
      crossorigin="anonymous"
    ></script>
    <!-- Link Swiper's CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="css/basic.css" />
    <link rel="stylesheet" href="css/index.css" />
  </head>
  <body>
    <!-- Header Start -->
    <?php include("layout/header.php") ?>
    <!-- Header End -->
      <content>
        <!-- Jenis Produk  Start  -->
        <section>
          <div class="container-fluid p-5">
         <h1 id="bakery" class="text-center stroke">Produk Wijaya<span class="text-warning">Bakery.</span></h1>
            <div class="row border border-warning">
              <div class="col-xs-12 col-md-2 align-self-center text-center p-2">
                <h1>Jenis Produk</h1>
              </div>

                <div class="col-xs-12 col-md-10">
                  <div class="swiper mySwiper p-4">
                    <div class="swiper-wrapper">
                    <?php foreach ($jenis_produk as $jen_pro) : ?>
                      <div class="swiper-slide ">
                        <div class="card border-warning" >
                          <img
                            src="/image/bg/jenis_produk/<?= $jen_pro["gambar_kel"]?>"
                            class="card-img-top"
                            alt="..."
                            
                          />
                          <div class="card-body">
                            <h2 class="card-title"><?= $jen_pro["nama_kel"]?></h2>
                            <div class="buttonCon">
                                  <button href="#SelProduk" class="filter-btn btn btn-primary" data-kategori="<?= str_replace(" ","", $jen_pro['nama_kel'])?>" onclick="alert('Jenis Produk Terpilih')">Lihat Produk</button>
                            </div>
                          </div>
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
          <div class="container-fluid p-5 m-2 border border-warning">
            <div class="col-12">
              <h1 id="bakery" class="text-center stroke">Cari Produk Wijaya<span class="text-warning">Bakery.</span></h1>
              <input type="text" name="cari_produk" id="cari" onkeyup="myFunction()" class="form-control mb-3 bg-secondary bg-opacity-10" placeholder="Cari produk...">            
              <button class="form-control btn btn-primary filter-btn active" data-kategori="all" onclick="alert('Menampilkan Semua Jenis Produk'); ">Reset</button>
            </div>
            <!--  BUAT SELURUH PRODUK-->
            <div class="d-flex flex-wrap justify-content-center" id="SelProduk">
            <?php foreach ($produk as $pro) :?>
              <div class="produk" data-kategori="<?= str_replace(" ","", $pro['jenis_produk'])?>">

              <div class="card border-warning m-2" style="width: 320px;">
                <img
                src="image/roti/<?= $pro["gambar_produk"]?>"
                class="card-img-top"
                alt="..."              
                />
                <div class="card-body text-center">
                  <h2 class=""><?= $pro["jenis_produk"]?></h2>
                  <h2 class="card-title"><?= $pro["nama_produk"]?></h2>
                  <p><?= $pro["informasi_produk"]?></p>
                  <h3>Rp. <?= $pro["harga_produk"]?></h3>
                  <a href="#" class="btn btn-primary">Lihat Produk</a>
                </div>
              </div>
              </div>
            <?php endforeach ?>
            </div>
          </div>
        </section>
        <!-- Seluruh Produk  Start  -->          
      </content>
      <!-- Footer Start -->
      <?php include("layout/footer.php") ?>
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
          slidesPerView: 1,
          spaceBetween: 20,
        },
        450: {
          slidesPerView: 1,
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
      <script src="assets/js/script.js" type="text/javascript"></script>
      
  </body>
</html>
