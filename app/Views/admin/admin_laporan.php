<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan - Wijaya Bakery</title>
    <link rel="shortcut icon" href="<?= base_url('image/logo/logo.png')?>" />
    <!-- Bootstrap Start -->
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
    <!-- Bootstrap End -->
    <link rel="stylesheet" href="<?= base_url('css/basic.css')?>">
</head>
<body>
 <!-- Header Start -->
 <?php

$rootPath = ROOTPATH;
$filePath = $rootPath . 'app\Views';
include($filePath . '\layout\admin_header.php') ?>
<!-- Header End -->
<?php include($filePath.'\layout\alert.php') ?>
    <div class="row p-md-4 p-sm-1">
        <div class="col-12 bg-secondary bg-opacity-10 text-center border border-2">
            <h1>Laporan Keuangan</h1>
            <div class="row">
              <div class="col-md-6">
              <form action="<?= base_url('admin/filter_laporan'); ?>" method="post">
                <div class="d-flex flex-nowrap m-2">
                  <label for="start">Tanggal Awal:</label>
                  <input type="date" name="start" id="start" class="form-control me-3">
                  <label for="floatingInput">Tanggal Akhir:</label>
                  <input type="date" name="end" id="floatingInput" class="form-control">
                  <button type="submit" class="btn btn-primary">Filter</button>
                </div> 
            </form>
              </div>
            <div class="col-12">
            <?php $counter=0;
            foreach($laporan as $lapor){?>
              <table class="table table-warning">
              <tr>
                <th>Nama Pelanggan</th>
                <th>Tanggal Laporan</th>
                <th>Modal</th>
                <th>Keuntungan Kotor</th>
                <th>Keuntungan Bersih</th>
              </tr>
              <tr>

                <td><?= $lapor['nama_pelanggan']?></td>
                <td><?= $lapor['tanggal_laporan']?></td>
                <td><?= $lapor['modal']?></td>
                <td><?= $lapor['keuntungan_kotor']?></td>
                <td><?= $lapor['keuntungan_bersih']?></td>
              </tr>
            </table>
          
              <?php 
            $counter++;
            }?>
            </div>
            </div>
          </div>
        
          </div>
    </div>
    <!-- Footer Start -->
    <?php include($filePath.'\layout\footer.php') ?>
      <!-- Footer End -->
      <button onclick="topFunction()" id="btntotop" title="Go to top"><i data-feather="chevron-up"></i></button>
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
      feather.replace();
      </script>
    <script src="<?= base_url('assets/js/script.js')?>"></script>
</body>
</html>