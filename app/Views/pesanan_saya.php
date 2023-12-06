<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pesanan Saya</title>
  <link rel="shortcut icon" href="<?= base_url('image/logo/logo.png') ?>" />
  <!-- Bootstrap Start -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <!-- Bootstrap End -->
  <link rel="stylesheet" href="<?= base_url('css/basic.css') ?>">
  <link rel="stylesheet" href="<?= base_url('css/pesanan.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/izi/css/iziToast.min.css') ?>" />

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
    <div class="container mt-md-3 mt-sm-0 p-4 text-center bg-warning bg-opacity-25 rounded-4">
      <h1 class="bakery stroke p-2">Pesanan Saya</h1>
      <?php if (empty($pes)) { ?>
        <div class="container-fluid mt-4">
          <div class="row ">
            <div class="offset-lg-3 col-lg-6 col-md-12 col-12 text-center bg-light p-4 rounded-4">
              <h2 class="bakery">Tidak ada pesanan.😁</h2>
            </div>
          </div>
          <a href="<?= base_url('produk') ?>" class="btn">Lihat Produk</a>

        </div>
      <?php } else { ?>
        <div class="mb-2  justify-content-between align-items-center">
          <div class="position-relative">
            <input type="text" name="cari_pesan_belum" id="cariBelum" onkeyup="pesanBelum()" class="form-control mb-3 bg-white " placeholder="Cari user...">
          </div>
        </div>
        <div class="">
          <table class="table table-responsive table-borderless rounded-2 table-warning table-hover bakery" id="pesanan_belum" aria-disabled="">
            <thead>
              <tr class="bg-light border-bottom border-warning">
                <th scope="col" width="20%">Tanggal</th>
                <th scope="col" width="20%">Tanggal Pengambilan</th>
                <th scope="col" width="5%">Status</th>
                <th scope="col" class="text-end" width="15%"><span>Total Harga</span></th>
                <th scope="col" width="10%"></th>
              </tr>
            </thead>
            <tbody>
              <?php $counter = 0;
              foreach ($pes as $pesan) : ?>
                <tr>
                  <td><?= $pesan['tanggal'] ?></td>
                  <td><?php if($pesan['tanggal_pengambilan']=="0000-00-00"){
                    echo "-";
                  }else{
                    echo $pesan['tanggal_pengambilan'];
                  } ?></td>
                  <td><span class="fw-bolder"><?= $pesan['status'] ?></span></td>
                  <td class="text-end"><span class="fw-bolder">Rp <?= $pesan['total_harga'] ?></span></td>
                  <td><button type="button" class="btn bg-btnhover trigger" onclick="detail(<?= $counter ?>)" title="Tampilkan Detail Pesanan">Detail</button></td>
                </tr>
              <?php $counter++;
              endforeach ?>
            </tbody>
          </table>
        </div>
    </div>

    <!-- Detail Pesanan Start -->
    <div class="container con detail-belum p-2" style="display: none;">
      <?php $yipi = 0;
        foreach ($pes as $pesan) : ?>
        <div class="card card-shadow mt-3" style="display: none;" id="detail<?= $yipi ?>">
          <div class="card-body">
            <div class="top d-flex justify-content-between">
              <h5 class=""></h5>
              <h5></h5>
              <button type="button" class="btn-close justify-content-end" aria-label="Close"></button>
            </div>
            <table class="table bakery">
              <tr>
                <th>Jumlah barang</th>
                <th>Nama Produk</th>
                <!-- <th>Modal Produk</th>
              <th>Sub Modal</th> -->
                <th>Harga Produk</th>
                <th>Sub Total</th>

              </tr>
              <?php
              foreach ($join_pro[$yipi] as $detail) { ?>
                <tr>
                    <td><?= $detail['kuantitas'] ?></td>
                    <td><?= $detail['nama_produk'] ?></td>
                    <!-- <td><?= $detail['modal_produk'] ?></td>
                <td><?= $detail['sub_modal'] ?></td> -->
                    <td>Rp <?= $detail['harga_produk'] ?></td>
                    <td>Rp <?= $detail['sub_total'] ?></td>
                </tr>
              <?php  }
              $yipi++; ?>

            </table>

          </div>
        </div>
      <?php endforeach ?>
    </div>
    <!-- Detail Pesanan End -->
  <?php } ?>

  </main>
  <!-- Footer Start -->
  <?php include($filePath . '\layout\footer.php') ?>
  <!-- Footer End -->
  <script src="https://unpkg.com/feather-icons"></script>
  <script>
    feather.replace();
  </script>
  <script src="<?= base_url('assets/js/script.js') ?>"></script>
  <script src="<?= base_url('assets/js/onkeyup.js') ?>"></script>
  <script src="<?= base_url('assets/js/pesanan.js') ?>"></script>
  <script src="<?= base_url('assets/izi/js/iziToast.min.js') ?>" type="text/javascript"></script>
</body>

</html>