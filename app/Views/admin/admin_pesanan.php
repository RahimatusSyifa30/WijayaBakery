<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Wijaya Bakery</title>
    <link rel="shortcut icon" href="/image/logo/logo.png" />
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
    <link rel="stylesheet" href="/css/basic.css">
    <link rel="stylesheet" href="/assets/izitoast/css/iziToast.min.css">
</head>
<body>
 <!-- Header Start -->
 <?php

$rootPath = ROOTPATH;
$filePath = $rootPath . 'app\Views';
include($filePath . '\layout\admin_header.php') ?>

<!-- Header End -->
    <div class="col-12">
    <script src="/assets/izitoast/js/iziToast.min.js">
      iziToast.settings({
      timeout: 3000, // default timeout
      resetOnHover: true,
      // icon: '', // icon class
      transitionIn: 'flipInX',
      transitionOut: 'flipOutX',
      position: 'topRight',});
  iziToast.success({
    title: 'Hey',
    message: 'dsadsa'
  });
</script>
        <?php 
        if(session()->getFlashdata('pesan')){ 
          echo '<div class="alert alert-success justify-content-between d-flex fade show" role="alert">';
            echo '<h5>'.session()->getFlashdata('pesan').'</h5>';
            echo '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
        
        ?>
      </div>
    <div class="row p-md-4 p-sm-1">
        <div class="col-sm-6 col-md-6 bg-secondary bg-opacity-10 text-center border border-2">
            <h1>Pesanan Masuk</h1>
              <!-- <a href="<?= base_url('admin/pilih_pesanan')?>" class="ms-4 align-self-center" title="Tambah Pesanan"><i data-feather="plus-square"></i></a> -->
            <div class="row">
            <div class="col-12">
            <?php $counter=0;
            foreach($pesanan_belum as $pesan){?>
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
            <div class="col-12 text-center">
              <a href="<?= base_url('admin/hapus_pesanan/'.$pesan['id_pesanan']) ?>"><i class="bi bi-x-circle-fill"></i></a>
              <a href="<?= base_url('admin/pesanan_diproses/'.$pesan['id_pesanan'])?>"><i class="bi bi-check-circle-fill"></i></a>
            </div>
              <?php 
            $counter++;
            }?>
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
            <table class="table table-warning" >
              <tr>
                <th>Kuantitas</th>
                <th>Nama Produk</th>
                <th>Sub Total</th>
              </tr>
              <?php 
            foreach($join_pro1[$counter] as $detail){?>
              <tr>
                
                <td><?= $detail['kuantitas']?></td>
                <td><?= $detail['nama_produk']?></td>
                <td><?= $detail['sub_total']?></td>
                
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td>Total Harga : <?= $pesan_sel['total_harga']?></td>
              </tr>
              <?php }?>
            </table>
            </div>
            <div class="col-12 text-center">
              <a href="<?= base_url('admin/hapus_pesanan/'.$pesan_sel['id_pesanan']) ?>"><i class="bi bi-x-circle-fill"></i></a>
              <a href="<?= base_url('admin/pesanan_selesai/'.$pesan_sel['id_pesanan'])?>"><i class="bi bi-check-circle-fill"></i></a>
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
    <script src="/assets/js/script.js"></script>
    
</body>
</html>