<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Edit Pesanan</title>
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
    <?php 
    $rootPath = ROOTPATH;
    $filePath = $rootPath . 'app\Views';
    include($filePath.'\layout\admin_header.php') ?>
    <!-- Header End -->
    <content>
    <form action="" method="post" enctype="multipart/form-data" class="p-5">

      <label for="nama_pel">Nama Pelanggan</label>
      <input type="text" name="nama_pel" id="nama_pel" class="bg-secondary bg-opacity-10 form-control" placeholder="Masukkan Nama Pelanggan" value="<?= $pesanan['nama_pelanggan']?>" required >
      <label for="tanggal">Tanggal</label>
      <input type="datetime" name="tanggal" id="tanggal" class="bg-secondary bg-opacity-10 form-control" value="<?= $pesanan['tanggal']?>" disabled>
      <label for="no_hp">No HP</label>
      <input type="text" name="no_hp" id="No_hp" class="bg-secondary bg-opacity-10 form-control" value="<?= $pesanan['no_hp_pelanggan']?>">
      <table class="table table-warning" >
              <tr>
                <th>Kuantitas</th>
                <th>Nama Produk</th>
                <th>Modal Produk</th>
                <th>Harga Produk</th>
                
                <th>Sub Modal</th>
                <th>Sub Total</th>
                <th></th>
              </tr>
              <?php
              $i=0;
              $total=0; 
            foreach($join_pro as $detail){?>
              <tr>
                
                <td><input type="number" name="kuantitas" id="kuantitas"  value="<?= $detail['kuantitas']?>"></td>
                
                <td>
                <select name="nama_prod" id="nama_prod">
                  <option value="<?= $detail['nama_produk']?>"><?= $detail['nama_produk']?></option>
                  <?php foreach($produk as $pro):?>
                    <option value="<?= $pro['nama_produk']?>"><?= $pro['nama_produk']?></option>
                  <?php endforeach ?>
                </select>
                </td>
                <td><input type="text" name="kuantitas" id="kuantitas"  value="<?= $detail['harga_produk']?>"></td>
                <td><input type="text" name="kuantitas" id="kuantitas"  value="<?= $detail['modal_produk']?>"></td>
                <td><input type="text" name="submodal" id="submodal"  value="<?= $submodal[$i]?>" disabled></td>
                <td><input type="text" name="subtotal" id="subtotal"  value="<?= $subtotal[$i]?>" disabled></td>
              </tr>
              <?php 
              
              $i++; }?>
              <tr>
                <td></td>
                <td></td>

                <td></td>
                <td>Total Modal : <?= $totalmodal?></td>
                <td></td>
                <td>Total Harga : <?= $totalharga?></td>
              </tr>

            </table>
      <br><br>
      <div class="text-center">
        <a href="<?= base_url('admin')?>" class="btn btn-danger btn-lg">Kembali</a>
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
      <script src="<?= base_url('assets/js/script.js')?>" type="text/javascript"></script>
</body>
</html>