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
        }
        
        ?>
      </div>


      <!-- Pesanan Masuk -->
    <div class="row p-md-4 p-sm-1">
        <div class="col-sm-6 col-md-6 bg-secondary bg-opacity-10 text-center border border-2">
            <h1>Pesanan Masuk</h1>
            <div class="row">
            <div class="col-8 ">
            <?php $counter=0;
            foreach($pesanan_belum as $pesan){?>
              <table class="table table-warning table-responsive">
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
            <table class="table table-responsive" >
              <tr>
                <th>Kuantitas</th>
                <th>Nama Produk</th>
                <th>Modal Produk</th>
                <th>Sub Modal</th>
                <th>Harga Produk</th>
                <th>Sub Total</th>
              </tr>
              <?php $totalmodal[]=0;$totalharga[]=0;
            foreach($join_pro[$counter] as $detail){?>
              <tr>
                
                <td><?= $detail['kuantitas']?></td>
                <td><?= $detail['nama_produk']?></td>
                <td><?= $detail['modal_produk']?></td>
                <td><?= $submodal=$detail['kuantitas']*$detail['modal_produk']?></td>
                <td><?= $detail['harga_produk']?></td>
                <td><?= $subtotal=$detail['kuantitas']*$detail['harga_produk']?></td>
                              
              </tr>
              <?php 
              $totalmodal[$counter]+=$submodal;  
              $totalharga[$counter]+=$subtotal;  
              }?>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><?=$totalmodal[$counter];?></td>
                <td></td>
                <td><?=$totalharga[$counter];?></td>

              </tr>

            </table>
            </div>
            
              <?php
            $counter++;

            }?>
            </div>
            <div class="col-4 text-center">
              <a href="<?= base_url('admin/hapus_pesanan/'.$pesan['id_pesanan']) ?>"><i class="bi bi-x-circle-fill bg-opacity-10 bg-secondary"></i></a>
              <a href="<?= base_url('admin/pesanan_diproses/'.$pesan['id_pesanan'])?>"><i class="bi bi-check-circle-fill bg-opacity-10 bg-secondary"></i></a>
            </div>
            </div>
          </div>
        <div class="col-sm-6 col-md-6 bg-secondary bg-opacity-10 text-center border border-2">
            <h1>Pesanan Diterima</h1>
        
        <div class="row">
            <div class="col-12">
            <?php 
            foreach($pesanan_diproses as $pesan_sel){?>
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

                <td><?= $pesan_sel['nama_pelanggan']?></td>
                <td><?= $pesan_sel['tanggal']?></td>
                <td><?= $pesan_sel['no_hp_pelanggan']?></td>
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
              <?php $totalmodal1[$counter]=0;$totalharga1[$counter]=0;;
            foreach($join_pro1[$counter] as $detail){?>
              <tr>
                
                <td><?= $detail['kuantitas']?></td>
                <td><?= $detail['nama_produk']?></td>
                <td><?= $detail['modal_produk']?></td>
                <td><?= $submodal1=$detail['kuantitas']*$detail['modal_produk']?></td>
                <td><?= $detail['harga_produk']?></td> 
                <td><?= $subtotal1=$detail['kuantitas']*$detail['harga_produk']?></td>
                
              </tr>
              
              <?php 
              $totalmodal1[$counter]+=$submodal1;  
              $totalharga1[$counter]+=$subtotal1;  
              }
              $untung=$totalharga1[$counter]-$totalmodal1[$counter];
              ?>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><?=$totalmodal1[$counter];?></td>
                <td></td>
                <td><?=$totalharga1[$counter];?></td>
              </tr>
              
            </table>
            </div>
            <div class="col-12 text-center">
            <?php echo form_open('admin/pesanan_selesai/'.$pesan_sel['id_pesanan']);?>
                <?php echo form_hidden('total_modal'.$pesan_sel['id_pesanan'],$totalmodal1[$counter]);?>
                <?php echo form_hidden('untung_kotor'.$pesan_sel['id_pesanan'],$totalharga1[$counter]);?>
                <?php echo form_hidden('untung_bersih',$untung)?>
              <a href="<?= base_url('admin/hapus_pesanan/'.$pesan_sel['id_pesanan']) ?>"><i class="bi bi-x-circle-fill"></i></a>
              <button type="submit"><i class="bi bi-check-circle-fill"></i></button>
            </div>
            <?php
            
              $counter++;
            }?>
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
    
</body>
</html>