<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Edit Pesanan</title>
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
    <?php include($filePath . '\layout\alert.php') ?>

    <div class="container mt-md-5 mt-sm-0 p-4 text-center bg-warning bg-opacity-25 rounded-4">
      <h1 class="bakery stroke">Edit Pesanan</h1>
      <!-- //////////////////////// -->
      <div class="">
        <form action="" method="post" enctype="multipart/form-data" class="p-5">
          <div class="row">
            <div class="col-md-6 col-xs-12">
              <div class="form-floating mb-3 ">
                <input type="text" name="nama_pel" id="nama_pel" class="form-control bakery" placeholder="Masukkan nama pelanggan" title="Masukkan nama pelanggan" value="<?= $pesanan['nama_user'] ?>" required>
                <label for="nama_pel">Nama Pelanggan</label>
              </div>
            </div>
            <div class="col-md-6 col-xs-12">
              <div class="form-floating mb-3">
                <input type="datetime" name="tanggal" id="tanggal" class="form-control bakery" title="Tanggal pemesanan" value="<?= $pesanan['tanggal'] ?>" disabled>
                <label for="tanggal">Tanggal</label>
              </div>
            </div>
            <div class="col-md-6 col-xs-12">
              <div class="form-floating mb-3 ">
                <input type="text" name="no_hp" id="no_hp" class="form-control bakery" placeholder="Masukkan no hp" title="Masukkan nama pelanggan" value="<?= $pesanan['no_hp_user'] ?>" required>
                <label for="no_hp">No HP</label>
              </div>
            </div>
          </div>
          <table class="table table-responsive table-borderless rounded-2 table-warning table-hover" id="pesanan" aria-disabled="">
            <thead>
              <tr class="bg-light border-bottom border-warning">
                <th scope="col" width="15%">Nama Produk</th>
                <th scope="col" width="15%">Jumlah Barang</th>
                <th scope="col" width="20%">Harga Produk</th>
                <th scope="col" width="20%">Sub Total</th>
                <th scope="col" width="5%"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php foreach ($join_pro as $detail) { ?>
                  <form action="<?= base_url('admin/hapus_detail_pesanan/' . $detail['id_detail']) ?>" method="post">
                    <input type="hidden" name="id_pesan" value="<?= $id_pesan ?>">
                    <td><?= $detail['nama_produk'] ?></td>
                    <td><?= $detail['kuantitas'] ?></td>
                    <td><?= $detail['harga_produk'] ?></td>
                    <td><?= $detail['kuantitas'] * $detail['harga_produk'] ?></td>
                    <td><button type="submit" class="btn bg-btnhover"><i data-feather="trash"></i></button></td>
                  </form>
              </tr>
            <?php } ?>
            </tbody>
            <tfoot>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td id="subtotal" class="fw-bolder"></td>
                <td></td>
              </tr>
            </tfoot>
          </table>

          <div class="text-end">
            <a href="<?= base_url('admin/produk') ?>" class="btn bg-btnhover " id="tambah-pesanan"><i data-feather="plus-square"></i> Tambah Pesanan</a>
          </div>
          <div class="d-flex mt-4 justify-content-around">
            <div>
              <a href="<?= base_url('admin') ?>" class="btn  btn-danger btn-lg "> Kembali </a>
            </div>
            <div class="align-bottom">
              <input type="submit" name="sub" class="btn btn-success btn-lg " value="   Ubah   "></input>
            </div>
          </div>
      </div>
      </form>
    </div>
    <!-- //////////////////////// -->



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
  <script src="<?= base_url('assets/js/edit_pesanan.js') ?>" type="text/javascript"></script>
</body>

</html>