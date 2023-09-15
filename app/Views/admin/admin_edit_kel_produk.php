<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Edit Kelompok Produk</title>
  <link rel="shortcut icon" href="<?= base_url('image/logo/logo.png') ?>" />
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  <link rel="stylesheet" href="<?= base_url('css/basic.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('css/index.css') ?>" />
</head>

<body>
  <!-- Header Start -->
  <?php
  $rootPath = ROOTPATH;
  $filePath = $rootPath . 'app\Views';
  include($filePath . '\layout\admin_header.php') ?>
  <!-- Header End -->
  <main>
    <form action="" method="post" enctype="multipart/form-data" class="p-md-2 p-sm-0">
      <div class="container p-4 bg-warning bg-opacity-25 rounded-4">
        <div class="row">
          <div class="col-md-6 col-xs-12">
            <div class="form-floating mb-3 mt-md-4 mt-sm-0 ">
              <input type="text" name="nama_kel_pro" id="nama_kel_pro" class="bg-light form-control" placeholder="Masukkan Nama Kelompok Produk" value="<?= $kel_produk1['nama_kel'] ?>" required>
              <label for="nama_kel_pro">Nama Jenis Produk</label>
            </div>
          </div>
          <div class="col-md-6 col-xs-12 col-md">
            <label for="">Gambar Produk </label>

            <br>
            <input type="file" name="gambar_kel_pro" class="mt-2 bg-ilght form-control" accept=".jpeg,.jpg,.png,image" placeholder="Masukkan Gambar Produk">
            <p>NB : Disarankan seperti gambar Palm Roll Ukuran 720x1280 pixel!</p>
            <input type="text" name="gambar" class="visually-hidden" value="<?= $kel_produk1['gambar_kel'] ?>">
            <div class="text-center pt-3">
              <img style="width:200px" id="gambar_pro" src="<?= base_url('image/bg/jenis_produk/') ?><?= $kel_produk1['gambar_kel'] ?>" alt="">
            </div>
          </div>
        </div>
        <div class="d-flex mt-4 justify-content-around">
          <a href="<?= base_url('admin/produk') ?>" class="btn btn-danger btn-lg">Kembali</a>
          <input type="submit" name="sub" class="btn btn-success btn-lg" value="Simpan"></input>
        </div>
      </div>
    </form>
  </main>
  <button onclick="topFunction()" id="btntotop" title="Go to top"><i data-feather="chevron-up"></i></button>

  <!-- Footer Start -->
  <?php include($filePath . '\layout\footer.php') ?>
  <!-- Footer End -->
  <!-- Script feather-icons -->
  <script src="https://unpkg.com/feather-icons"></script>
  <script>
    feather.replace();
  </script>
  <!-- Script Manual -->
  <script src="<?= base_url('assets/js/script.js') ?>" type="text/javascript"></script>
</body>

</html>