<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Wijaya Bakery</title>
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
      <!-- Pesanan Masuk -->
      <main>
    <div class="row m-auto">
      
        <div class="col-sm-6 col-md-12 bg-secondary bg-opacity-10 text-center border border-2">
            <h1>Pesanan Masuk</h1>
            <div class="row">
              <div class="col-12">
              <input type="text" name="cari_pesan_belum" id="cariBelum" onkeyup="pesanBelum()" class="form-control mb-3 bg-secondary bg-opacity-10" placeholder="Cari pelanggan...">
            <!-- Detail Pesanan Start -->
      <div class="container con p-2" style="display: none;">
        <?php $yipi=0;
        foreach($pesanan_belum as $pesan):?>
      
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
            <div class="col-12 " >
              <table class="table table-warning table-hover table-striped table-responsive" id="pesanan_belum" aria-disabled="">
              <tr>
                <th>Nama Pelanggan</th>
                <th>Tanggal</th>
                <th>No HP</th>
                <th>Status</th>
                <th>Total Modal</th>
                <th>Total Harga</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
              </tr>
              <?php $counter=0;
            foreach($pesanan_belum as $pesan):?>
              <tr>
                <td><?= $pesan['nama_pelanggan']?></td>
                <td><?= $pesan['tanggal']?></td>
                <td>0<?= $pesan['no_hp_pelanggan']?></td>
                <td><?= $pesan['status']?></td>
                <td><?= $pesan['total_modal']?></td>
                <td><?= $pesan['total_harga']?></td>
                <td><a href="<?= base_url('admin/ubah_pesanan/'.$pesan['id_pesanan']) ?>"><i data-feather="edit"></i></a></td>
                <td><button class="btn btn-primary trigger" onclick="detail(<?= $counter ?>)">Tampilkan Card</button></td>

                <td><a href="<?= base_url('admin/hapus_pesanan/'.$pesan['id_pesanan']) ?>"><i class="bi bi-x-circle-fill bg-opacity-10 bg-secondary"></i></a></td>
              <td><a href="<?= base_url('admin/pesanan_diproses/'.$pesan['id_pesanan'])?>"><i class="bi bi-check-circle-fill bg-opacity-10 bg-secondary"></i></a></td>           
              </tr>
              <?php $counter++; endforeach ?>
            </table>
            <!--  -->
            <!-- Pesanan Diproses -->
            <div class="row m-auto">
              
              <div class="col-sm-6 col-md-12 bg-secondary bg-opacity-10 text-center border border-2">
                  <h1>Pesanan Diproses</h1>
                  <div class="row">
                    <div class="col-12">
                    <input type="text" name="cari_pesan_sudah" id="cariSudah" onkeyup="pesanSudah()" class="form-control mb-3 bg-secondary bg-opacity-10" placeholder="Cari pelanggan...">
                  <!-- Detail Pesanan Start -->
            <div class="container con sel p-2" style="display: none;">
              <?php $yuhu=0;
              foreach($pesanan_diproses as $pesan_sel):?>
            
              <div class="card mt-3" style="display: none;" id="detail_sel<?= $yuhu?>">
                
              <div class="card-body">
                <div class="top d-flex justify-content-between">
                  <h5 class=""></h5>
                  <h5 class="card-title"><?= $pesan_sel['nama_pelanggan']?></h5>
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
                        foreach($join_pro1[$yuhu] as $detail){?>
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
                  <div class="col-12 " >
                    <table class="table table-warning table-hover  table-responsive" id="pesanan_sudah">
                    <tr>
                      <th>Nama Pelanggan</th>
                      <th>Tanggal</th>
                      <th>No HP</th>
                      <th>Status</th>
                      <th>Total Modal</th>
                      <th>Total Harga</th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                    </tr>
                    <?php $counter=0;
                  foreach($pesanan_diproses as $pesan_sel):?>
                    <tr>
                      <td><?= $pesan_sel['nama_pelanggan']?></td>
                      <td><?= $pesan_sel['tanggal']?></td>
                      <td>0<?= $pesan_sel['no_hp_pelanggan']?></td>
                      <td><?= $pesan_sel['status']?></td>
                      <td><?= $pesan_sel['total_modal']?></td>
                      <td><?= $pesan_sel['total_harga']?></td>
                      <td><a href="<?= base_url('admin/ubah_pesanan/'.$pesan_sel['id_pesanan']) ?>"><i data-feather="edit"></i></a></td>
                      <td><button class="btn btn-primary trigger" onclick="detail_sel(<?= $counter ?>)">Tampilkan Card</button></td>

                      <td><a href="<?= base_url('admin/hapus_pesanan/'.$pesan_sel['id_pesanan']) ?>"><i class="bi bi-x-circle-fill bg-opacity-10 bg-secondary"></i></a></td>
                    <td><a href="<?= base_url('admin/pesanan_selesai/'.$pesan_sel['id_pesanan'])?>"><i class="bi bi-check-circle-fill bg-opacity-10 bg-secondary"></i></a></td>           
                    </tr>
                    <?php $counter++; endforeach ?>
                  </table>
                  </main>
                  <button onclick="topFunction()" id="btntotop" title="Go to top"><i data-feather="chevron-up"></i></button>
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
      feather.replace();
      </script>
    <script src="<?= base_url('assets/js/script.js')?>"></script>
    <script src="<?= base_url('assets/js/onkeyup.js')?>"></script>
    <script src="<?= base_url('assets/js/pesanan.js')?>"></script>
    
</body>
</html>