<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - Keranjang</title>
  <link rel="shortcut icon" href="<?= base_url('image/logo/logo.png')?>" />
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  <link rel="stylesheet" href="<?= base_url('css/basic.css')?>" />
  <link rel="stylesheet" href="<?= base_url('css/pesanan.css')?>" />
</head>

<body>
  <!-- Header Start -->
  <?php
  $rootPath = ROOTPATH;
  $filePath = $rootPath . 'app\Views';
  include($filePath . '\layout\admin_header.php') ?>
  <!-- Header End -->
  <content>
  
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

      <div class="row">
      <?php if(empty($jumlah_item)){?>
          <div class="col-12 text-center align-items-center p-5" style="height: 320px;">  
          <h1 class="">Keranjang kosong</h1>
          </div>
          <?php }else{?>
        <div class="col-8 text-center">

        <table class="table table-warning">
        <tr>
          <th>Gambar Produk</th>
          <th>Nama Produk</th>
          <th>Stok Produk</th>
          <th>Harga Produk</th>
          <th>Sub Total</th>
          <th></th>
        </tr>
        <?php 

        $i=1;
        foreach($isi_ker as $keranjang):?>
        <tr>
          
          <td><img style="width:75px" src="image/roti/<?= $keranjang['options']['gambar']?>"></img></td>
          <td><h1><?= $keranjang['name']?></h1></td>
          <?php echo form_open('admin/ubah_keranjang')?>
          <td><input type="number" min=1 max=<?= $keranjang['options']['stok']?> 
          name="qty<?= $i++?>" id="kuantitas"  class=" form-control" style="width:100px" placeholder="Masukkan jumlah barang" value="<?= $keranjang['qty']?>"></td>
          <td><h2><?= $keranjang['price']?></h2></td>
          <td><h2><?= $keranjang['subtotal']?></h2></td>
          <td><a href="<?= base_url('admin/hapus_keranjang/'.$keranjang['rowid'])?>"><i data-feather="trash"></i></a></td>
          
        </tr>
          <?php endforeach?>
          </table>
          
          <div class="total text-center">
            <h2>Total : <?= $total_harga; ?></h2>
            <button type="submit" class="btn btn-warning"><i data-feather="save"></i></button>
            <?php echo form_close()?>
            <a href="<?= base_url('admin/hapus_total_keranjang') ?>" class="btn btn-warning"><i class="bi bi-trash3-fill"></i></a>
          </div>
          </div>
          
          <div class="col-4 align-items-start text-center border border-warning mt-2">
            <h2>Total Pesanan</h2>
            <h2>Total jumlah barang : <?= $jumlah_item?></h2>
            <?= form_open('admin/tambah_pesanan')?>
            <label for="nama_pel">Nama Pelanggan</label>
            <input type="text" name="nama_pel" id="nama_pel" class="bg-secondary bg-opacity-10 form-control">
            <label for="tanggal">Tanggal</label>
            <input type="datetime" name="tanggal" id="tanggal" class="bg-secondary bg-opacity-10 form-control" value="<?= date('d-m-y H:i')?>">
            <label for="no_hp">No HP</label>
            <input type="text" name="no_hp" id="No_hp" class="bg-secondary bg-opacity-10 form-control">
            <button type="submit" class="btn btn-primary">Buat Pesanan</button>
          </div>
          <?=  
          form_close()?>
          <?php }?>
      </div>

      <hr>
      <br><br>
      
  </content>
  <!-- Footer Start -->
  <?php include($filePath . '\layout\footer.php') ?>
  <!-- Footer End -->
  <!-- Script feather-icons -->
  <script src="https://unpkg.com/feather-icons"></script>
  <script>
    feather.replace();
  </script>
  <!-- Script Manual -->
  <script src="<?= base_url('assets/js/script.js')?>" type="text/javascript"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

</body>

</html>