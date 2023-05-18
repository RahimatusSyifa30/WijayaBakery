<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Edit Produk</title>
    <link rel="shortcut icon" href="/image/logo/logo.png" />
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
    <link rel="stylesheet" href="/css/basic.css" />
    <link rel="stylesheet" href="/css/index.css" />
</head>
<body>
    <!-- Header Start -->
    <?php 
    $rootPath = ROOTPATH;
    $filePath = $rootPath . 'app\Views';
    include($filePath.'\layout\admin_header.php') ?>
    <!-- Header End -->
    <content>
    <form action="" method="post" enctype="multipart/form-data" class="p-5">
    <label for="nama_kel_pro">Nama Jenis Produk</label>
    <input type="text" name="nama_kel_pro" id="nama_kel_pro" class="bg-secondary bg-opacity-10 form-control" placeholder="Masukkan Nama Kelompok Produk" value="<?= $kel_produk1['nama_kel']?>" required>
    </div>
    <label for="">Gambar Produk </label>
    <br>
    
    <input type="text" name="gambar" class="visually-hidden" value="<?= $kel_produk1['gambar_kel']?>">
    <img style="width:300px" id="gambar_pro" src="/image/bg/jenis_produk/<?= $kel_produk1['gambar_kel']?>" alt="">
    <input type="file" name="gambar_kel_pro"  class="bg-secondary bg-opacity-10 form-control" accept=".jpeg,.jpg,.png,image" placeholder="Masukkan Gambar Produk">  
    <br><br>
      <div class="text-center">
        <a href="<?= base_url('admin/produk')?>" class="btn btn-danger btn-lg">Kembali</a>
        <input type="submit" name="sub" class="btn btn-success btn-lg" value="Selesai"></input>
      </div>
    </form>
    </content>
    <!-- Footer Start -->
    <?php include($filePath.'\layout\footer.php') ?>
      <!-- Footer End -->
      <!-- Script feather-icons -->
      <script src="https://unpkg.com/feather-icons"></script>
      <script>
        feather.replace();
      </script>
      <!-- Script Manual -->
      <script src="/assets/js/script.js" type="text/javascript"></script>
</body>
</html>