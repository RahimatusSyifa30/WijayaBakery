<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Edit Produk</title>
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
    <form action="<?= base_url('admin/ubah_produk/' . $produk[0]->id_produk) ?>" method="post" enctype="multipart/form-data" class="mt-2">
      <div class="container bg-warning bg-opacity-25 rounded-4 p-4">
        <h1 class="bakery stroke p-2 mb-4 text-center">Edit Produk</h1>
        <div class="row">
          <div class="col-md-6 col-xs-12">
            <div class="form-floating mb-3 ">
              <input type="text" name="nama_pro" id="nama_pro" class="bg-light form-control" placeholder="Masukkan Nama Produk" value="<?= $produk[0]->nama_produk ?>" required>
              <label for="nama_pro">Nama Produk</label>
            </div>
            <div class="form-floating mb-3">
              <select id="jenis_pro" class="form-select" name="jenis_pro" placeholder="Pilih Jenis Produk">
                <option selected class="" value="<?= $produk[0]->jenis_produk ?>"><?= $produk[0]->nama_kel ?></option>
                <?php foreach ($kel_produk as $kel_pro) : ?>
                  <option value="<?= $kel_pro['id_kel'] ?>"><?= $kel_pro['nama_kel'] ?></option>
                <?php endforeach ?>
              </select>
              <label for="jenis_pro">Jenis Produk</label>
            </div>
            <div class="form-floating mb-3">
              <input type="number" name="stok_pro" id="stok_pro" min=0 class="bg-light form-control" placeholder="Masukkan Modal Produk" required value="<?= $produk[0]->stok_produk ?>">
              <label for="stok_pro">Stok Produk</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" name="modal_pro" id="modal_pro" class="bg-light form-control" placeholder="Masukkan Modal Produk" required value="<?= $produk[0]->modal_produk ?>">
              <label for="modal_pro">Modal Produk</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" name="harga_pro" id="harga_pro" class="bg-light form-control" placeholder="Masukkan Harga Produk" required value="<?= $produk[0]->harga_produk ?>">
              <label for="harga_pro">Harga Produk</label>
            </div>
            <div class="form-floating mb-3">
              <textarea name="info_pro" id="info_pro" cols="50" rows="50" class="bg-light form-control" placeholder="Masukkan Informasi Produk"><?= $produk[0]->informasi_produk ?></textarea>
              <label for="">Informasi Produk</label>
            </div>
          </div>
          <div class="col-md-6 col-xs-12">
            <input type="text" name="gambar" class="visually-hidden" value="<?= $produk[0]->gambar_produk ?>">
            <label for="gambar_pro">Gambar Produk</label>
            <p>NB : Disarankan seperti gambar Palm Roll Ukuran 720x1280 pixel!</p>
            <br>
            <div class="text-center">
              <img style="width:150px" src="<?= base_url('image/roti/') ?><?= $produk[0]->gambar_produk ?>" alt="">
              <input type="file" src="<?= base_url('image/roti/') ?><?= $produk[0]->gambar_produk ?>" name="gambar_pro" id="gambar_pro" class="bg-light form-control mt-2 m-auto" accept=".jpeg,.jpg,.png,image" placeholder="Masukkan Gambar Produk">
            </div>
          </div>
        </div>
      </div>


      <div class="d-flex mt-4 justify-content-around">
        <a href="<?= base_url('admin/produk') ?>" class="btn btn-danger btn-lg">Kembali</a>
        <input type="submit" name="sub" class="btn btn-success btn-lg" value="Simpan"></input>
      </div>
    </form>
  </main>

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