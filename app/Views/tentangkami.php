<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Wijaya Bakery - Tentang Kami</title>
  <link rel="shortcut icon" href="image/logo/logo.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="<?= base_url('css/basic.css') ?>">
  <link rel="stylesheet" href="<?= base_url('css/tentangkami.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/izi/css/iziToast.min.css') ?>" />
  <script src="<?= base_url('assets/izi/js/iziToast.min.js') ?>" type="text/javascript"></script>
</head>

<body>
  <!-- Header Start -->
  <?php include("layout/header.php") ?>
  <!-- Header End -->
  <img class="bg-slide m-0" src="image/bg/body-head.png" alt="">
  <section id="about" class="mtt ">
    <div class="container rounded-5   p-3">
      <div class="about-1">
        <h1 id="bakery" class="text-center stroke font-lg">Tentang Wijaya<span class="text-warning">Bakery.</span></h1>
        <hr class="hr-title">
        <img src="image/logo/logo.png" class="rounded mx-auto d-block logo p-4" alt="..." />
        <p>Toko Roti <span class="fw-bolder">Wijaya Bakery</span> adalah sebuah perusahaan toko roti yang didirikan pada tahun 2020 dengan tujuan menyediakan roti yang berkualitas kepada pelanggan.
          Beralamatkan di Jl. Raya Pakuniran, RT.16/RW.04, Bucor Kulon, Kec. Pakuniran, Kabupaten Probolinggo, Jawa Timur 67292.
          <span class="fw-bolder">Wijaya Bakery</span> menyajikan roti lezat dan inovatif yang memuaskan selera pelanggan.
        </p>
        <p><span class="fw-bolder">Wijaya Bakery</span> memiliki berbagai macam pilihan roti, seperti brownis, donat, kue tart, pizza, dan roti.</p>
        <hr class="hr-mid">
      </div>
      <div id="about-2">
        <div class="content-box-lg">
          <div class="container">
            <div class="row">
              <div class="col-md-4">
                <div class="about-item text-center p-2">
                  <i class="fa fa-globe"></i>
                  <h3> Visi </h3>
                  <hr>
                  <p>Menjadi toko roti yang dikenal secara luas karena inovasi, kualitas, dan keunikan produk roti yang kami tawarkan kepada pelanggan.</p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="about-item text-center p-2">
                  <i class="fa fa-book"></i>
                  <h3> Misi </h3>
                  <hr>
                  <p>1. Menyediakan roti berkualitas tinggi dan beragam dengan rasa yang unik dan menarik bagi pelanggan kami.</p>
                  <p>2. Membangun hubungan yang kokoh dengan pelanggan kami dengan memberikan pelayanan yang ramah, responsif, dan profesional.</p>
                  <p>3. Menjaga Kualitas dan Kebersihan: Kebersihan dan keamanan adalah prioritas utama kami. Kami menjaga kebersihan ruang produksi, peralatan, dan bahan baku dengan standar yang tinggi.</p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="about-item text-center p-2">
                  <i class="fa fa-handshake-o"></i>
                  <h3> Tujuan </h3>
                  <hr>
                  <p>1. Memperluas jangkauan pasar dan meningkatkan kesadaran merek kami melalui strategi pemasaran yang efektif,termasuk penggunaan media sosial.</p>
                  <p>2. Menjadi tempat yang diandalkan untuk kebutuhan roti sehari-hari pelanggan dengan menyediakan berbagai macam pilihan roti.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include('layout\footer.php') ?>
  <!-- Script feather-icons -->
  <script src="https://unpkg.com/feather-icons"></script>
  <script>
    feather.replace();
  </script>
  <!-- Script Manual -->
  <script src="assets/js/script.js" type="text/javascript"></script>

</body>

</html>