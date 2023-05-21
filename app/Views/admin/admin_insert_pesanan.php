<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Tambah Pesanan</title>
  <link rel="shortcut icon" href="<?= base_url('image/logo/logo.png')?>" />
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  <link rel="stylesheet" href="<?= base_url('css/basic.css')?>" />
  <link rel="stylesheet" href="<?= base_url('css/pesanan.css')?>" />
</head>

<body>
  <!-- Header Start -->
  <?php

  $rootPath = ROOTPATH;
  $filePath = $rootPath . 'app\Views';
  include($filePath . '\layout\admin_header.php') ?>
  <!-- Header End -->
  <content>
      <div class="col-12">
        <?php 
        if(session()->getFlashdata('pesan')){ 
          echo '<div class="alert alert-success justify-content-between d-flex" style="transition:0.6ms" role="alert">';
            echo '<h5>'.session()->getFlashdata('pesan').'</h5>';
            echo '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
        
        ?>
      </div>
      <div class="row">
        <?php foreach ($produk as $pro) : ?>
          <div class="col-md-6 col-xs-12">
          <?php 
            
            echo form_open('admin/tambah_keranjang');
            echo form_hidden('id',$pro['id_produk']);
            echo form_hidden('price',$pro['harga_produk']);
            echo form_hidden('name',$pro['nama_produk']);

            echo form_hidden('stok',$pro['stok_produk']);
            echo form_hidden('gambar',$pro['gambar_produk']);
          ?>
            <div class="card border-warning m-2 p-2">
              <div class="row">
                <div class="col-md-4 col-xs-12">
                  <img src="/image/roti/<?= $pro["gambar_produk"] ?>" class="rounded-2" alt="..." />
                </div>


                <div class="col-md-4 col-xs-12 text-center">
                  <h2 class=""><?= $pro["nama_produk"] ?></h2>
                  <p class=""><?= $pro["informasi_produk"] ?></p>

                </div>
                <div class="col-md-4 col-xs-12 text-center">
                  <h3>Rp. <?= $pro["harga_produk"] ?></h3>
                  <h3>Stok : <?= $pro["stok_produk"] ?></h3>
                  <button type="submit" class="bg-white m-2"><i class="bi bi-patch-plus-fill"></i></button>
                  
                  
                </div>
              </div>
            </div>
          
          
          </div>
        <?php
        echo form_close(); 
        endforeach ?>
      </div>
      <br><br>
  </content>
  <!-- Footer Start -->
  <?php include($filePath . '\layout\footer.php') ?>
  <!-- Footer End -->
  <!-- Script feather-icons -->
  <script src="https://unpkg.com/feather-icons"></script>
  <script>
    feather.replace();
  </script>
  <!-- Script Manual -->
  <script src="<?= base_url('assets/js/script.js')?>" type="text/javascript"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

</body>

</html>