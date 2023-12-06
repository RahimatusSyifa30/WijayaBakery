<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wijaya Bakery - Kontak Kami</title>
  <link rel="shortcut icon" href="image/logo/logo.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="<?= base_url('css/basic.css') ?>">
  <link rel="stylesheet" href="<?= base_url('css/kontakkami.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/izi/css/iziToast.min.css') ?>" />
  <script src="<?= base_url('assets/izi/js/iziToast.min.js') ?>" type="text/javascript"></script>
</head>

<body>
  <!-- Header Start -->
  <?php include("layout/header.php") ?>
  <!-- Header End -->
  <?php include('layout/alert.php') ?>

  <img class="bg-slide m-0" src="image/bg/body-head.png" alt="">
  <section>
    <div class="p-4 mtt">
      <h1 id="" class="text-center bakery stroke font-lg">Kontak Wijaya<span class="text-warning">Bakery.</span></h1>
      <hr>
    </div>
    <div class="container con ">
      <div class="contactInfo col-12">
        <div class="row top">
          <div class="col-12">
            <h2 id="" class="title-kon stroke ">Informasi Kontak</h2>
          </div>
          <div class="col-12 mt-4">
            <a href="https://goo.gl/maps/gm4tphk6zCobfKBJ6" target="_blank" class="btn bakery  ttt text-wrap stroke d-flex "> <span class="p-1"><img src="image/logo/lokasi.png"></span>Jl. Raya Pakuniran, RT.16/RW.04, Bucor Kulon.</a>
          </div>
          <div class="col-12 mt-2">
            <a href="https://wa.me/62<?= $no_hp ?>" target="_blank" class="btn ttt bakery  text stroke "><span class="p-1"> <img src="image/logo/wa.png"></span> <?= $no_hp ?></a>
          </div>
        </div>
      </div>
      <form action="<?= base_url('kirim_pesan') ?>" method="post" class="col-12">
        <div class="contactForm">
          <div class="isi text-center">
            <h2 id="" class="stroke title-kon">Kirim Pesan</h2>
            <div class="formBox">
              <div class="inputBox form-floating w50">
                <input type="text" name="nama" class="form-control" id="floatingInput" required placeholder="Masukkan Nama">
                <label for="floatingInput">Nama</label>
              </div>
              <div class="inputBox form-floating w100">
                <textarea name="pesan" class="form-control" required placeholder="Tulis Pesan Anda..."></textarea>
                <label>Pesan</label>
              </div>
              <div id="captcha-container" class="text-start w50">
                <label for="captcha-input">Captcha</label>
                <input type="hidden" id="captcha-result" name="captcha-result">
                <input type="text" id="captcha-input" name="captcha-input" class="form-control" required>
                <p>Note : Captcha wajib diisi untuk mencegah anti-spam</p>
              </div>
              <div class="inputBox w100 text-center">
                <button class="btn bg-btnhover btn-lg" type="submit">Kirim</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </section>

  <!-- Footer Start -->
  <?php include("layout/footer.php") ?>
  <!-- Footer End -->
  <!-- Script feather-icons -->
  <script src="https://unpkg.com/feather-icons"></script>
  <script>
    feather.replace();
  </script>
  <!-- Script Manual -->
  <script src="assets/js/script.js" type="text/javascript"></script>
  <script src="assets/js/regis.js" type="text/javascript"></script>

</body>

</html>