<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi - Wijaya Bakery</title>
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
    <link rel="stylesheet" href="<?= base_url('css/pesanan.css')?>">
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
            <h1>Riwayat Transaksi</h1>
            <div class="row">
            <div class="col-12">
            <input type="text" name="cari_pesan_sudah" id="cariSudah" onkeyup="pesanSudah()" class="form-control mb-3 bg-secondary bg-opacity-10" placeholder="Cari pelanggan...">

            <form action="<?= base_url('admin/filter_riwayat'); ?>" method="get">
                <div class="col-md-6 d-flex flex-nowrap m-2">
                  <label for="start">Tanggal Awal:</label>
                  <input type="date" name="start" id="start" class="form-control me-3">
                  <label for="floatingInput">Tanggal Akhir:</label>
                  <input type="date" name="end" id="floatingInput" class="form-control">
                  <button type="submit" class="btn btn-primary">Filter</button>
                  <a href="<?= base_url('admin/riwayat')?>" class="btn btn-primary ms-2">Reset</a>
                </div> 
            </form>
              <table class="table table-warning" id="pesanan_sudah">
              <tr>
                <th>Nama Pelanggan</th>
                <th>Tanggal</th>
                <th>No HP</th>
                <th>Status</th>
                <th>Total Harga</th>

                <th></th>
              </tr>
            <?php $counter=0;
            foreach($pesanan_selesai as $pesan):?>
              <tr>

                <td><?= $pesan['nama_pelanggan']?></td>
                <td><?= $pesan['tanggal']?></td>
                <td>0<?= $pesan['no_hp_pelanggan']?></td>
                <td><?= $pesan['status']?></td>
                <td><?= $pesan['total_harga']?></td>
                
                <td><button id="detail" class="btn btn-primary" onclick="detail(<?=$counter?>)">Detail</button></td>
              </tr>
              <?php $counter++; endforeach ?>
            </table>
            <!-- Detail Pesanan Start -->
      <div class="container p-2" style="display: none;">
        <?php $yipi=0;
        foreach($pesanan_selesai as $pesan):?>
      
        <div class="card mt-3" style="display: none;" id="detail<?= $yipi?>">
          
        <div class="card-body">
          <div class="top d-flex justify-content-between">
            <h5 class=""></h5>
            <h5 class="card-title"><?= $pesan['nama_pelanggan']?></h5>
            <button type="button" class="btn-close justify-content-end" aria-label="Close"></button>
          </div>
            <table class="table">
                    <tr>
                      <th>Kuantitas</th>
                      <th>Nama Produk</th>
                      <th>Modal Produk</th>
                      <th>Sub Modal</th>
                      <th>Harga Produk</th>
                      <th>Sub Total</th>
                    </tr>
                    <?php
                  foreach($join_pro[$yipi] as $detail){?>
                    <tr>
                      
                      <td><?= $detail['kuantitas']?></td>
                      <td><?= $detail['nama_produk']?></td>
                      <td><?= $detail['modal_produk']?></td>
                      <td><?= $detail['sub_modal']?></td>
                      <td><?= $detail['harga_produk']?></td>
                      <td><?= $detail['sub_total']?></td>
                                    
                    </tr>
                  <?php  } $yipi++; ?>
                  
            </table>
          </div>
        </div>        
      <?php endforeach?>
      </div>
      <!-- Detail Pesanan End -->
            </div>
            </div>
          </div>
        
          </div>
    </div>
    <button onclick="topFunction()" id="btntotop" title="Go to top"><i data-feather="chevron-up"></i></button>
    <!-- Footer Start -->
    <?php include($filePath.'\layout\footer.php') ?>
      <!-- Footer End -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
      feather.replace();
      </script>
    <script src="<?= base_url('assets/js/script.js')?>"></script>
    <script src="<?= base_url('assets/js/onkeyup.js')?>"></script>
    <script src="<?= base_url('assets/js/pesanan.js')?>"></script>
</body>
</html>