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
</head>
<body>
 <!-- Header Start -->
 <?php

$rootPath = ROOTPATH;
$filePath = $rootPath . 'app\Views';
include($filePath . '\layout\admin_header.php') ?>
<!-- Header End -->
<div class="row">
    <div class="col-12">
        <?php 
        if(session()->getFlashdata('notif')){ 
          echo '<div class="alert alert-success justify-content-between d-flex fade show" role="alert">';
            echo '<h5>'.session()->getFlashdata('notif').'</h5>';
            echo '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
        
        ?>
      </div>
      </div>
    <div class="row p-md-4 p-sm-1">
        <div class="col-12 bg-secondary bg-opacity-10 text-center border border-2">
            <h1>Riwayat Transaksi</h1>
              <!-- <a href="<?= base_url('admin/pilih_pesanan')?>" class="ms-4 align-self-center" title="Tambah Pesanan"><i data-feather="plus-square"></i></a> -->
            <div class="row">
            <div class="col-12">
            <?php $counter=0;
            foreach($pesanan_selesai as $pesan){?>
              <table class="table table-warning">
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
                <td><?= $pesan['no_hp_pelanggan']?></td>
                <td><?= $pesan['status']?></td>
                
                <td><a href="<?= base_url('admin/ubah_pesanan/'.$pesan['id_pesanan']) ?>"><i data-feather="edit"></i></a></td>
                <td><button id="detail" class="btn btn-primary" onclick="detail(<?=$counter?>)">Detail</button></td>
              </tr>
            </table>
            <div class="col-12" id="data-table<?= $counter;?>" style="display:none">
            <table class="table table-warning" >
              <tr>
                <th>Kuantitas</th>
                <th>Nama Produk</th>
                <th>Sub Total</th>
              </tr>
              <?php 
            foreach($join_pro[$counter] as $detail){?>
              <tr>
                
                <td><?= $detail['kuantitas']?></td>
                <td><?= $detail['nama_produk']?></td>
                <td><?= $detail['sub_total']?></td>
                
              </tr>
              <?php }?>
              <tr>
                <td></td>
                <td></td>
                <td>Total Harga : <?= $pesan['total_harga']?></td>
              </tr>

            </table>
            </div>
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
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
      feather.replace();
      </script>
    <script src="<?= base_url('assets/js/script.js')?>"></script>
</body>
</html>