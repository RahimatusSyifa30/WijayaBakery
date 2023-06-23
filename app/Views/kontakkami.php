<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wijaya Bakery - Kontak Kami</title>
    <link rel="shortcut icon" href="image/logo/logo.png" />
  
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="<?= base_url('css/basic.css')?>">
    <link rel="stylesheet" href="<?= base_url('css/kontakkami.css')?>">
</head>
<body>
    <!-- Header Start -->
    <?php include("layout/header.php") ?>
    <!-- Header End -->
      <h1 id="bakery" class="text-center stroke">Tentang Wijaya<span class="text-warning">Bakery.</span></h1>
      <hr>
    <section>
      <div class="container">
        <div class="contactInfo">
          <div>
            <h2 id="bakery" class="text-center stroke">Informasi Kontak</h2>
            <br>
            <ul class="info">
              <li>
                <span><img src="image/logo/lokasi.png"></span>
                <span id="bakery" class="text stroke">Jl. Raya Pakuniran, RT.16/RW.04,<br>Bucor Kulon.</span>
              </li>
              <li>
                <span> <img src="image/logo/wa.png"></span>
                <span id="bakery" class="text stroke">081318140558</span>
              </li>
              <li>
                <span> <img src="image/logo/email.png"></span>
                <span id="bakery" class="text stroke">sifaspt317@gmail.com</span>
              </li>
            </ul>
          </div>
          </div>
        <div class="contactForm">
          <h2 id="bakery" class="text stroke">Kirim Pesan</h2>
          <div class="formBox">
            <div class="inputBox w50">
              <input type="text" name="" required>
              <span>Nama Depan</span>
            </div>
            <div class="inputBox w50">
              <input type="text" required>
              <span>Nama Belakang</span>
            </div>
            <div class="inputBox w50">
              <input type="text" required>
              <span>Nomor Telepon</span>
            </div>
            <div class="inputBox w100">
              <textarea required></textarea>
              <span>Tulis Pesan Anda...</span>
            </div>
            <div class="inputBox w100">
              <input type="submit" value="Kirim">
            </div>
          </div>
        </div>

      </div>

    <button onclick="topFunction()" id="btntotop" title="Go to top"><i data-feather="chevron-up"></i></button>
    </section>

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