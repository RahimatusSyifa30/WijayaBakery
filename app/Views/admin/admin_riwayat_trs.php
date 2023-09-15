<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Riwayat Transaksi - Wijaya Bakery</title>
  <link rel="shortcut icon" href="<?= base_url('image/logo/logo.png') ?>" />
  <!-- Bootstrap Start -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <!-- Bootstrap End -->
  <link rel="stylesheet" href="<?= base_url('css/basic.css') ?>">
  <link rel="stylesheet" href="<?= base_url('css/pesanan.css') ?>">
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
    <div class="container mt-md-4 mt-sm-0 p-4 text-center bg-warning bg-opacity-25 rounded-4">
      <h1 class="bakery stroke">Riwayat Transaksi</h1>
      <?php if (empty($pesanan_selesai)) { ?>
        <div class="container-fluid mt-4">
          <div class="row ">
            <div class="offset-lg-3 col-lg-6 col-md-12 col-12 text-center bg-light p-4 rounded-4">
              <h2 class="bakery">Belum ada pesanan.😁</h2>
            </div>
          </div>
        </div>
      <?php } else { ?>
        <div class="row g-3 mb-3 mt-3 justify-content-center">
          <form action="<?= base_url('admin/filter_riwayat'); ?>" method="get" class="d-flex flex-row col-md-6 justify-content-between">
            <div>
              <label for="start">Periode :</label>
            </div>
            <div>
              <input type="date" name="start" id="start" class="form-control">
            </div>
            <div>
              <label for="floatingInput">-</label>
            </div>
            <div>
              <input type="date" name="end" id="floatingInput" class="form-control">
            </div>
            <div>
              <button type="submit" class="btn bg-btnhover">Filter</button>
            </div>
            <div>
              <a href="<?= base_url('admin/reset_tanggal_riwayat') ?>" class="btn bg-btnhover">Reset</a>
            </div>
          </form>
        </div>
        <div class="row justify-content-center">
          <form action="" method=" post" class="col-md-6 col-xs-12">
            <div class=" input-group mt-2">
              <input type="text" name="cari" id="cari" class="form-control mb-3 bg-white " placeholder="Cari pelanggan...">
              <div class="input-group-append">
                <button type="submit" class="btn bg-btnhover" id="button-addon2">Cari</button>
              </div>
            </div>
          </form>
        </div>
        <div class="">
          <table class="table table-responsive table-borderless rounded-2 table-warning table-hover" id="pesanan_belum" aria-disabled="">
            <thead>
              <tr class="bg-light">
                <th scope="col" width="15%">Nama Pelanggan</th>
                <th scope="col" width="15%">Tanggal</th>
                <th scope="col" width="20%">No HP</th>
                <th scope="col" width="10%">Status</th>
                <th scope="col" class="text-end" width="15%"><span>Total Harga</span></th>
                <th scope="col" width="10%"></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $counter = 0;
              foreach ($pesanan_selesai as $pesan) : ?>
                <tr>
                  <td><?= $pesan['nama_pelanggan'] ?></td>
                  <td><?= $pesan['tanggal'] ?></td>
                  <td><a href="https://wa.me/62<?= $pesan['no_hp_pelanggan'] ?>" class="btn bg-btnhover" target="_blank"><?= $pesan['no_hp_pelanggan'] ?></a></td>
                  <td><span class="fw-bolder"><?= $pesan['status'] ?></span></td>
                  <td class="text-end"><span class="fw-bolder">Rp <?= $pesan['total_harga'] ?></span></td>
                  <td><button type="button" class="btn bg-btnhover trigger" onclick="detail(<?= $counter ?>)" title="Tampilkan Detail Pesanan">Detail</button></td>
                </tr>
              <?php $counter++;
              endforeach ?>
            </tbody>
          </table>
        </div>
        <div class="pagination justify-content-end">
          <?= $pager->links('pesanan', 'pagination') ?>
        </div>



      <?php } ?>
    </div>
    <!-- Detail Pesanan Start -->
    <div class="container con detail-sel p-2" style="display: none;">
      <?php $yipi = 0;
      foreach ($pesanan_selesai as $pesan) : ?>
        <div class="card mt-3" id="detail<?= $yipi ?>" style="display: none;">
          <div class="card-body">
            <div class="top d-flex justify-content-between">
              <h5 class=""></h5>
              <h5 class="card-title"><?= $pesan['nama_pelanggan'] ?></h5>
              <button type="button" class="btn-close justify-content-end" aria-label="Close"></button>
            </div>
            <table class="table">
              <tr>
                <th>Kuantitas</th>
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
                  <td><?= $detail['harga_produk'] ?></td>
                  <td><?= $detail['sub_total'] ?></td>
                </tr>
              <?php  }
              $yipi++; ?>
            </table>
          </div>
        </div>
      <?php endforeach ?>
    </div>
    <!-- Detail Pesanan End -->
  </main>
  <button onclick="topFunction()" id="btntotop" title="Go to top"><i data-feather="chevron-up"></i></button>
  <!-- Footer Start -->
  <?php include($filePath . '\layout\footer.php') ?>
  <!-- Footer End -->
  <script src="https://unpkg.com/feather-icons"></script>
  <script>
    feather.replace();
  </script>
  <script src="<?= base_url('assets/js/script.js') ?>"></script>
  <script src="<?= base_url('assets/js/riwayat.js') ?>"></script>
</body>

</html>