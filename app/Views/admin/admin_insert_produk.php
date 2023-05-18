<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Tambah Produk</title>
    <link rel="shortcut icon" href="../image/logo/logo.png" />
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
    <link rel="stylesheet" href="../css/basic.css" />
    <link rel="stylesheet" href="../css/index.css" />
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
      <label for="nama_pro">Nama Produk</label>
      <input type="text" name="nama_pro" id="nama_pro" class="bg-secondary bg-opacity-10 form-control" placeholder="Masukkan Nama Produk" required>
      <label for="jenis_pro">Jenis Produk</label>
      <select id="jenis_pro" class="form-select" name="jenis_pro" placeholder="Pilih Jenis Produk">
      <?php foreach ($kel_produk as $kel_pro) :?>
        <option><?= $kel_pro['nama_kel']?></option>
        <?php endforeach?>
      </select>
      <label for="stok_pro">Stok Produk</label>
      <input type="number" name="stok_pro" id="stok_pro" class="bg-secondary bg-opacity-10 form-control" placeholder="Masukkan Modal Produk" required>
      <label for="modal_pro">Modal Produk</label>
      <input type="text" name="modal_pro" id="modal_pro" class="bg-secondary bg-opacity-10 form-control" placeholder="Masukkan Modal Produk" required>
      <label for="harga_pro">Harga Produk</label>
      <input type="text" name="harga_pro" id="harga_pro" class="bg-secondary bg-opacity-10 form-control" placeholder="Masukkan Harga Produk" required>
      <label for="">Informasi Produk</label>
      <textarea name="info_pro" id="info_pro" cols="30" rows="5" class="bg-secondary bg-opacity-10 form-control" placeholder="Masukkan Informasi Produk"></textarea>
      <label for="gambar_pro">Gambar Produk</label>
      <input type="file" name="gambar_pro" id="gambar_pro" class="bg-secondary bg-opacity-10 form-control" accept=".jpeg,.jpg,.png,image" placeholder="Masukkan Gambar Produk" required>    
        
      <br><br>
      <div class="text-center">
        <a href="<?= base_url('admin/produk')?>" class="btn btn-danger btn-lg">Kembali</a>
        <button type="submit" name="sub" class="btn btn-success btn-lg" onclick="alertProdukSuccess()">Selesai</button>
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
      <script src="../assets/js/script.js" type="text/javascript"></script>
</body>
</html>