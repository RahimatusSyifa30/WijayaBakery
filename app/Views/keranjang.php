<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Keranjang</title>
  <link rel="shortcut icon" href="<?= base_url('image/logo/logo.png') ?>" />
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  <link rel="stylesheet" href="<?= base_url('css/basic.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('css/cart.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/izi/css/iziToast.min.css') ?>" />
  <script src="<?= base_url('assets/izi/js/iziToast.min.js') ?>" type="text/javascript"></script>
</head>

<body>
  <!-- Header Start -->
  <?php
  $rootPath = ROOTPATH;
  $filePath = $rootPath . 'app\Views';
  include($filePath . '\layout\header.php') ?>
  <!-- Header End -->

  <main>
    <?php include($filePath . '\layout\alert.php') ?>
    <section class="">
      <?php if (empty($jumlah_item)) { ?>
        <div class="container-fluid  con">
          <div class="row ">
            <div class="offset-lg-3 col-lg-6 col-md-12 col-12 text-center">
              <img src="<?= base_url('image/logo/logo_cart_empty.png') ?>" alt="" class="img-fluid mb-4" id="logo_cart">
              <h2 class="bakery">Keranjang belanja anda kosong.</h2>
              <h6 class="mb-4 bakery stroke">
                Temukan berbagai produk menarik di Wijaya <span class="text-warning">Bakery.</span>
              </h6>
              <a href="<?= base_url('produk') ?>" class="btn bg-btnhover btn-lg">Lihat produk sekarang</a>
            </div>
          </div>
        </div>
      <?php } else { ?>
        <div class="container h-100 py-md-4 py-sm-0">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
              <div class="card shopping-cart" style="border-radius: 15px;">
                <div class="card-body text-black">
                  <div class="row ">
                    <div class="col-lg-6 col-md-8 px-5 py-4 m-auto">
                      <h3 class="mb-5 pt-2 text-center fw-bold text-uppercase bakery stroke">Produk Anda</h3>
                      <?php
                      $i = 0;
                      foreach ($isi_ker as $keranjang) : ?>
                        <div class="d-flex align-items-center mb-5">
                          <div class="flex-shrink-0 me-3">
                            <img src="<?= base_url('image/roti/') . $keranjang['options']['gambar'] ?>" class="img-fluid foto-roti" alt="Generic placeholder image">
                          </div>
                          <div class="flex-grow-1 ms-3">
                            <a href="#!" class="float-end text-black"><i class="fas fa-times"></i></a>
                            <h5 class="bakery"><?= $keranjang['name'] ?></h5>
                            <?= form_open('ubah_keranjang') ?>
                            <div class="d-flex align-items-center">
                              <p class="fw-bold mb-0 me-5 pe-3">Rp <?= $keranjang['price'] ?></p>
                              <div class="def-number-input number-input safari_only">
                                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus  bakery"></button>
                                <input class="quantity fw-bold text-black" min="0" name="qty<?= $i ?>" value="<?= $keranjang['qty'] ?>" type="number">
                                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus bakery"></button>
                              </div>
                            </div>
                          </div>
                          <div>
                            <a href="<?= base_url('hapus_keranjang/' . $keranjang['rowid']) ?>" title="Hapus semua isi keranjang"><i data-feather="x" class="stroke-hover"></i></a>
                          </div>
                        </div>
                        <div class="d-flex justify-content-between px-x mb-2">
                          <h5 class="fw-bold mb-0">Sub Total :</h5>
                          <h5 class="fw-bold">Rp <?= $keranjang['subtotal'] ?></h5>
                        </div>
                        <hr class="mb-4 text-warning" style="height: 2px; opacity: 1;">
                      <?php $i++;
                      endforeach ?>
                      <div class="d-flex justify-content-between p-2 mb-2 bg-warning-subtle bakery rounded-2 align-items-center">
                        <h5 class="fw-bold mb-0">Total :</h5>
                        <h5 class="fw-bold mb-0">Rp <?= $total_harga ?></h5>
                        <a href="<?= base_url('hapus_total_keranjang') ?>" class="btn bg-btnhover-reverse"><i data-feather="trash"></i></a>
                      </div>
                      <div class="total text-center">
                        <?= form_close() ?>
                      </div>
                    </div>
                    <div class="col-lg-6 px-5 py-4 bakery">
                      <h3 class="mb-5 pt-2 text-center fw-bold text-uppercase bakery stroke">Pembayaran</h3>
                      <?= form_open('admin/tambah_pesanan') ?>
                      <div class="form-floating mb-3 ">
                        <input type="text" name="nama_pel" id="nama_pel" class="form-control" placeholder="Masukkan nama anda" title="Masukkan nama pelanggan" required>
                        <label for="nama_pel">Nama Pelanggan</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="datetime" name="tanggal" id="tanggal" class="form-control bakery" value="<?= date('d-m-y H:i') ?>" title="Tanggal pemesanan" disabled>
                        <label for="tanggal">Tanggal</label>
                      </div>
                      <div class="input-group mb-3 bakery">
                        <span class="input-group-text bakery" id="basic-addon1">+62</span>
                        <div class="form-floating">
                          <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="sdah" title="Masukkan No HP atau No WA" required>
                          <label for="no_hp">No HP/WA</label>
                        </div>
                      </div>
                      <div class="justify-content-center text-center">
                        <button type="submit" class="btn btn-lg bg-btnhover btn-block mb-3">Buat Pesanan</button>
                      </div>
                      <?= form_close() ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </section>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

</body>

</html>