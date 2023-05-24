<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Wijaya Bakery - Beranda</title>
    <link rel="shortcut icon" href="<?= base_url('image/logo/logo.png')?>" />
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
    <link rel="stylesheet" href="<?= base_url('css/basic.css')?>" />
    <link rel="stylesheet" href="<?= base_url('css/index.css')?>" />
    
  </head>
  <body>
    <!-- Header Start -->
    <?php include("layout/header.php") ?>
    <!-- Header End -->
    <content>
        
      <!-- Slide Profil Wijaya Bakery Start -->
      <img class="bg-slide" src="image/bg/body-head.png" alt="">

      <section id="slidetoko" class="p-lg-5 p-0" >
        <div id="carousel" class="carousel slide carousel-fade m-auto clearfix" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button
              type="button"
              data-bs-target="#carousel"
              data-bs-slide-to="0"
              class="active"
              aria-current="true"
              aria-label="Slide 1"
            ></button>
            <button
              type="button"
              data-bs-target="#carousel"
              data-bs-slide-to="1"
              aria-label="Slide 2"
            ></button>
            <button
              type="button"
              data-bs-target="#carousel"
              data-bs-slide-to="2"
              aria-label="Slide 3"
            ></button>
          </div>
          <div class="carousel-inner rounded-5 ">
            <div class="carousel-item active ">
              <img
                src="image/bg/carousel/fix3.jpg"
                class="d-block w-100"

                alt="..."
              />
              <!-- <div class="carousel-caption d-none d-md-block bg-white bg-opacity-75 text-dark ">
                <h1 id="bakery" class="">Wijaya<span class="text-warning ">Bakery.</span></h1>
                <h3>
                  Menyediakan berbagai macam roti yang berkualitas, enak, dan gurih.
                </h3>
              </div> -->
            </div>
            <div class="carousel-item">
              <img
                src="image/bg/carousel/fix2.jpg"
                class="d-block w-100"

                alt="..."
              />
            </div>
            <div class="carousel-item">
              <img
                src="image/bg/carousel/fix1.jpg"
                class="d-block w-100"

                alt="..."
              />
            </div>
          </div>
          <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#carousel"
            data-bs-slide="prev"
          >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#carousel"
            data-bs-slide="next"
          >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </section>
      <!-- Slide Profil Wijaya Bakery End -->
      <!-- Pemisah start -->
      <div class="d-flex mt-lg-5 mt-md-4 mt-sm-2" >
        <img src="image/bg/line.png" alt="" style="width: 25%;">
        <img src="image/bg/line.png" alt="" style="width: 25%;">
        <img src="image/bg/line.png" alt="" style="width: 25%;">
        <img src="image/bg/line.png" alt="" style="width: 25%;">
      </div>
      <!-- Pemisah End -->
      <!-- Best Seller Wijaya Bakery Start -->
      <center>  
        <section id="best_seller" class="p-lg-5 p-sm-3">
          
          <!-- <img class="bg-best" src="image/bg/bg-tes.png" alt=""> -->
          <div class="container">
            <div class="justify-content-center m-5 stroke" id="text">
              <h1>
                Best Seller <span id="bakery">Wijaya</span><span class="text-warning">Bakery.
              </h1>
            </div>
            <div class="swiper mySwiper p-md-4">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <div class="card border-warning" >
                    <img
                      src="image/roti/pizza_mini.jpeg"
                      class="card-img-top"
                      alt="..."
                      
                    />
                    <div class="card-body">
                      <h2 class="card-title">Pizza Mini</h2>
                      <hr>
                      <p class="fs-4">
                        Some quick example text to build on the card title and
                        make up the bulk of the card's content.
                      </p>
                      <a href="#" class="btn btn-warning">Go somewhere</a>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="card border-warning" >
                    <img
                      src="image/roti/pizza_jumbo.jpeg"
                      class="card-img-top"
                      alt="..."
                      
                    />
                    <div class="card-body">
                      <h2 class="card-title">Pizza Mini</h2>
                      <hr>
                      <p class="fs-4">
                        Some quick example text to build on the card title and
                        make up the bulk of the card's content.
                      </p>
                      <a href="#" class="btn btn-warning">Go somewhere</a>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="card border-warning" >
                    <img
                      src="image/roti/roti_kasur_jumbo.jpeg"
                      class="card-img-top"
                      alt="..."
                      
                    />
                    <div class="card-body">
                      <h2 class="card-title">Pizza Mini</h2>
                      <hr>
                      <p class="fs-4">
                        Some quick example text to build on the card title and
                        make up the bulk of the card's content.
                      </p>
                      <a href="#" class="btn btn-warning">Go somewhere</a>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="card border-warning" >
                    <img
                      src="image/roti/bee_roll.jpeg"
                      class="card-img-top"
                      alt="..."
                      
                    />
                    <div class="card-body">
                      <h2 class="card-title">Pizza Mini</h2>
                      <hr>
                      <p class="fs-4">
                        Some quick example text to build on the card title and
                        make up the bulk of the card's content.
                      </p>
                      <a href="#" class="btn btn-warning">Go somewhere</a>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="card border-warning" >
                    <img
                      src="image/roti/pizza_mini.jpeg"
                      class="card-img-top"
                      alt="..."
                      
                    />
                    <div class="card-body">
                      <h2 class="card-title">Pizza Mini</h2>
                      <hr>
                      <p class="fs-4">
                        Some quick example text to build on the card title and
                        make up the bulk of the card's content.
                      </p>
                      <a href="#" class="btn btn-warning">Go somewhere</a>
                    </div>
                  </div>
                </div>
                
              </div>
              <br />
              <br />
              <div class="swiper-pagination"></div>
            </div>
          </div>
        </section>
      </center>
      <!-- Best Seller Wijaya Bakery End  -->
      <!-- Pemisah start -->
      <div class="d-flex mt-lg-5 mt-md-4 mt-sm-2" >
        <img src="image/bg/line.png" alt="" style="width: 25%;">
        <img src="image/bg/line.png" alt="" style="width: 25%;">
        <img src="image/bg/line.png" alt="" style="width: 25%;">
        <img src="image/bg/line.png" alt="" style="width: 25%;">
      </div>
      <!-- Pemisah End -->
      <!-- Alamat Wijaya Bakery Start-->
      <section id="alamat" class="p-lg-5 p-sm-3 text-center">
        <!-- <img class="bg-loc" src="image/bg/bg-best.jpeg" alt=""> -->
          <h1 class="m-5 stroke ">
            Lokasi <span id="bakery">Wijaya</span><span class="text-warning">Bakery.
          </h1>
          <iframe style="border-radius: 30px;"src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1920.2939888632475!2d113.50915297315755!3d-7.7764952393500675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd703c7f2d48695%3A0xdd8ae747e8bbd8f0!2sToko%20Wijaya!5e0!3m2!1sid!2sid!4v1680512280593!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
      </section>
      <!-- Alamat Wijaya Bakery End-->
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
