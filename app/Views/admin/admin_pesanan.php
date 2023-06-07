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
</head>
<body>
 <!-- Header Start -->
 <?php

$rootPath = ROOTPATH;
$filePath = $rootPath . 'app\Views';
include($filePath . '\layout\admin_header.php') ?>

<!-- Header End -->
    <div class="col-12">

        <?php 
        if(session()->getFlashdata('notif')){ 
          echo '<div class="alert alert-success justify-content-between d-flex fade show" role="alert">';
            echo '<h5>'.session()->getFlashdata('notif').'</h5>';
            echo '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }else if(session()->getFlashdata('error')){ 
          echo '<div class="alert alert-danger justify-content-between d-flex fade show" role="alert">';
            echo '<h5>'.session()->getFlashdata('error').'</h5>';
            echo '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
        
        ?>
      </div>


      <!-- Pesanan Masuk -->
    <div class="row p-md-4 p-sm-1">
        <div class="col-sm-6 col-md-6 bg-secondary bg-opacity-10 text-center border border-2">
            <h1>Pesanan Masuk</h1>
            <div class="row">
              <div class="col-12">
              <input type="text" name="cari_pesan_belum" id="cariBelum" onkeyup="pesanBelum()" class="form-control mb-3 bg-secondary bg-opacity-10" placeholder="Cari pelanggan...">
              </div>
            <div class="col-12 " >
            <?php $counter=0;
            foreach($pesanan_belum as $pesan){?> 
            <div class="" id="pesanan_belum">
              <table class="table table-warning table-responsive" >
              <tr>
                <th>Nama Pelanggan</th>
                <th>Tanggal</th>
                <th>No HP</th>
                <th>Status</th>

                <th></th>
                <th></th>
              </tr>
              <tr>

                <td><?= $pesan['nama_pelanggan']?></td>
                <td><?= $pesan['tanggal']?></td>
                <td>0<?= $pesan['no_hp_pelanggan']?></td>
                <td><?= $pesan['status']?></td>
                
                <td><a href="<?= base_url('admin/ubah_pesanan/'.$pesan['id_pesanan']) ?>"><i data-feather="edit"></i></a></td>
                <td><button id="detail" class="btn btn-primary" onclick="detail(<?=$counter?>)">Detail</button></td>
              </tr>
            </table>
            </div>
            <div class="col-12" id="data-table<?= $counter;?>" style="display:none">
            <table class="table table-responsive" >
              <tr class="position-sticky">
                <th>Kuantitas</th>
                <th>Nama Produk</th>
                <th>Modal Produk</th>
                <th>Sub Modal</th>
                <th>Harga Produk</th>
                <th>Sub Total</th>
              </tr>
              <?php
            foreach($join_pro[$counter] as $detail){?>
              <tr>
                
                <td><?= $detail['kuantitas']?></td>
                <td><?= $detail['nama_produk']?></td>
                <td><?= $detail['modal_produk']?></td>
                <td><?= $detail['kuantitas']*$detail['modal_produk']?></td>
                <td><?= $detail['harga_produk']?></td>
                <td><?= $detail['kuantitas']*$detail['harga_produk']?></td>
                              
              </tr>
              <?php 
              }?>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><?= $pesan['total_modal']?></td>
                <td></td>
                <td><?= $pesan['total_harga']?></td>

              </tr>

            </table>
            </div>
            <div class="col-12 text-center">
              <a href="<?= base_url('admin/hapus_pesanan/'.$pesan['id_pesanan']) ?>"><i class="bi bi-x-circle-fill bg-opacity-10 bg-secondary"></i></a>
              <a href="<?= base_url('admin/pesanan_diproses/'.$pesan['id_pesanan'])?>"><i class="bi bi-check-circle-fill bg-opacity-10 bg-secondary"></i></a>
            </div>
            <?php $counter++; }?>
            </div>
            
            </div>
            
          </div>
        <div class="col-sm-6 col-md-6 bg-secondary bg-opacity-10 text-center border border-2" >
            <h1>Pesanan Diterima</h1>
        
        <div class="row">
            <div class="col-12">
              <input type="text" name="cari_pesan_sudah" id="cariSudah" onkeyup="pesanSudah()" class="form-control mb-3 bg-secondary bg-opacity-10" placeholder="Cari pelanggan...">
            </div>
            <div class="col-12" >
            <?php 
            foreach($pesanan_diproses as $pesan_sel){?>
              <table class="table table-warning" id="pesanan_sudah">
              <tr>
                <th>Nama Pelanggan</th>
                <th>Tanggal</th>
                <th>No HP</th>
                <th>Status</th>

                <th></th>
                <th></th>
              </tr>
              <tr>

                <td><?= $pesan_sel['nama_pelanggan']?></td>
                <td><?= $pesan_sel['tanggal']?></td>
                <td>0<?= $pesan_sel['no_hp_pelanggan']?></td>
                <td><?= $pesan_sel['status']?></td>
                
                <td><a href="<?= base_url('admin/ubah_pesanan/'.$pesan_sel['id_pesanan']) ?>"><i data-feather="edit"></i></a></td>
                <td><button id="detail" class="btn btn-primary" onclick="detail(<?=$counter?>)">Detail</button></td>
              </tr>
            </table>
            <div class="col-12" id="data-table<?= $counter;?>" style="display:none">
            <table class="table table-responsive" >
              <tr>
                <th>Kuantitas</th>
                <th>Nama Produk</th>
                <th>Modal Produk</th>
                <th>Sub Modal</th>
                <th>Harga Produk</th>
                <th>Sub Total</th>
              </tr>
              <?php $y=0;
            foreach($join_pro1[$y] as $detail1){?>
              <tr>
                
                <td><?= $detail1['kuantitas']?></td>
                <td><?= $detail1['nama_produk']?></td>
                <td><?= $detail1['modal_produk']?></td>
                <td><?= $detail1['kuantitas']*$detail1['modal_produk']?></td>
                <td><?= $detail1['harga_produk']?></td> 
                <td><?= $detail1['kuantitas']*$detail1['harga_produk']?></td>
                
              </tr>
              
              <?php 
              }
              ?>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><?= $pesan_sel['total_modal']?></td>
                <td></td>
                <td><?= $pesan_sel['total_harga']?></td>
              </tr>
              
            </table>
            </div>
            <div class="col-12 text-center">
              <?= form_open('admin/pesanan_selesai/'.$pesan_sel['id_pesanan'])?>
              <a href="<?= base_url('admin/hapus_pesanan/'.$pesan_sel['id_pesanan']) ?>"><i class="bi bi-x-circle-fill"></i></a>
              <button type="submit"><i class="bi bi-check-circle-fill"></i></button>
            </div>
            <?php
            
              $y++;
            }?>
            <?= form_close()?>
            </div>
            </div>
          </div>
          </div>
          <?php echo form_close(); ?>
    </div>
    <!-- Footer Start -->
    <?php include($filePath.'\layout\footer.php') ?>
      <!-- Footer End -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
      feather.replace();
      </script>
    <script src="<?= base_url('assets/js/script.js')?>"></script>
    <script src="<?= base_url('assets/js/onkeyup.js')?>"></script>
    
</body>
</html>