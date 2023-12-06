<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laporan Keuangan - Wijaya Bakery</title>
  <link rel="shortcut icon" href="<?= base_url('image/logo/logo.png') ?>" />
  <!-- Bootstrap Start -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <!-- Bootstrap End -->
  <link rel="stylesheet" href="<?= base_url('css/basic.css') ?>">
  <link rel="stylesheet" href="<?= base_url('css/pesanan.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/izi/css/iziToast.min.css') ?>" />
  <script src="<?= base_url('assets/izi/js/iziToast.min.js') ?>" type="text/javascript"></script>
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
      <h1 class="bakery stroke">Laporan Keuangan</h1>
      <div class="row g-3 mb-3 mt-3 justify-content-center">
        <form action="<?= base_url('admin/filter_laporan'); ?>" method="get" class="d-flex flex-row col-xs-12 col-sm-7 col-lg-7 col-xl-6 justify-content-between">
          <div class="col-auto">
            <label for="start">Periode :</label>
          </div>
          <div class="col-auto">
            <input type="date" name="start" id="start" class="form-control">
          </div>
          <div class="col-auto">
            <label for="floatingInput"> - </label>
          </div>
          <div class="col-auto">
            <input type="date" name="end" id="floatingInput" class="form-control">
          </div>
          <div class="col-auto">
            <button type="submit" class="btn bg-btnhover">Filter</button>
          </div>
          <div class="col-auto">
            <a href="<?= base_url("admin/reset_tanggal_laporan") ?>" type="submit" class="btn bg-btnhover">Reset</a>
          </div>
        </form>
      </div>
      <?php if (empty($laporan)) { ?>
        <div class="container-fluid mt-4">

          <div class="row ">
            <div class="offset-lg-3 col-lg-6 col-md-12 col-12 text-center bg-light p-4 rounded-4">

              <h2 class="bakery">Tidak ada Laporan.😁</h2>
            </div>
          </div>
        </div>
      <?php } else { ?>
        <div class="row justify-content-center">
          <div class="mb-2 col-md-12 col-xs-12 ">
            <div class="position-relative">
              <form action="" method="post">
                <div class="input-group mt-2 mb-3">
                  <input type="text" name="cari" id="cariBelum" class="form-control mb-3 bg-white " placeholder="Cari pelanggan...">
                  <div class="input-group-append">
                    <button type="submit" class="btn bg-btnhover" id="button-addon2">Cari</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="">
          <table class="table table-responsive table-borderless rounded-2 table-warning table-hover bakery" id="pesanan_belum" aria-disabled="">
            <thead>
              <tr class="bg-light">
                <th scope="col" width="20%">Tanggal</th>
                <th scope="col" width="20%">Modal</th>
                <th scope="col" width="20%">Keuntungan Kotor</th>
                <th scope="col" width="20%">Keuntungan Bersih</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $counter = 0;
              foreach ($laporan as $pesan) : ?>
                <tr>
                  <td><?= $pesan['tanggal_laporan'] ?></td>
                  <td><?= $pesan['modal'] ?></td>
                  <td><?= $pesan['keuntungan_kotor'] ?></td>
                  <td><?= $pesan['keuntungan_bersih'] ?></td>
                </tr>
              <?php $counter++;
              endforeach ?>

            </tbody>
            <tfoot>
              <tr>
                <td></td>
                <td class="fw-bolder"><?= $modal ?></td>
                <td class="fw-bolder"><?= $untung_kotor ?></td>
                <td class="fw-bolder"><?= $unber ?></td>
              </tr>
            </tfoot>
          </table>
        </div>
        <div class="pagination justify-content-end">
          <?= $pager->links('laporan', 'pagination') ?>
        </div>
      <?php } ?>
    </div>
  </main>
  <!-- Footer Start -->
  <?php include($filePath . '\layout\footer.php') ?>
  <!-- Footer End -->
  <script src="https://unpkg.com/feather-icons"></script>
  <script>
    feather.replace();
  </script>
  <script src="<?= base_url('assets/js/script.js') ?>"></script>
</body>

</html>