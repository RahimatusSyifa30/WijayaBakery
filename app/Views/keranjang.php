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
  <!-- <link rel="stylesheet" href="<?= base_url('css/basic.css')?>" /> -->
  <link rel="stylesheet" href="<?= base_url('css/cart.css')?>" />
</head>

<body>
  <!-- Header Start -->
  <?php
  $rootPath = ROOTPATH;
  $filePath = $rootPath . 'app\Views';
  include($filePath . '\layout\admin_header.php') ?>
  <!-- Header End -->
  <main>
  <?php include($filePath.'\layout\alert.php') ?>
  <section class="h-100 h-custom" >
  <?php if(empty($jumlah_item)){?>
          <div class="col-12 text-center align-items-center p-5" style="height: 320px;">  
          <h1 class="">Keranjang kosong</h1>
          </div>
          <?php }else{?>
  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card shopping-cart" style="border-radius: 15px;">
          <div class="card-body text-black">

            <div class="row">
              <div class="col-lg-6 px-5 py-4">

                <h3 class="mb-5 pt-2 text-center fw-bold text-uppercase">Produk Anda</h3>
                <?php 
                $i=1;
                foreach($isi_ker as $keranjang):?>
                <div class="d-flex align-items-center mb-5">
                  <div class="flex-shrink-0">
                    <img src="<?= base_url('image/roti/').$keranjang['options']['gambar']?>"
                      class="img-fluid" style="width: 150px;" alt="Generic placeholder image">
                  </div>
                  <div class="flex-grow-1 ms-3">
                    <a href="#!" class="float-end text-black"><i class="fas fa-times"></i></a>
                    <h5 class="text-primary"><?= $keranjang['name']?></h5>
                    <?php echo form_open('admin/ubah_keranjang')?>
                    <div class="d-flex align-items-center">
                      <p class="fw-bold mb-0 me-5 pe-3">Rp <?= $keranjang['price']?></p>
                      <div class="def-number-input number-input safari_only">
                        <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
                        <input class="quantity fw-bold text-black" min="0" max=<?= $keranjang['options']['stok']?> name="qty<?= $i++?>" value="<?= $keranjang['qty']?>"
                          type="number">
                        <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="mb-4 text-warning" style="height: 2px; opacity: 1;">
<?php endforeach ?>
                <div class="d-flex justify-content-between px-x">
                  <p class="fw-bold">Rp <?= $keranjang['subtotal']?></p>
                  <a href="<?= base_url('admin/hapus_total_keranjang') ?>" class="btn btn-warning"><i data-feather="trash"></i></a>
                </div>
                <div class="d-flex justify-content-between p-2 mb-2" style="background-color: #e1f5fe;">
                  <h5 class="fw-bold mb-0">Total:</h5>
                  <h5 class="fw-bold mb-0">Rp <?= $total_harga?></h5>
                </div>
                <div class="total text-center">
            <?php echo form_close()?>
            
          </div>

              </div>
              <div class="col-lg-6 px-5 py-4">

                <h3 class="mb-5 pt-2 text-center fw-bold text-uppercase">Pembayaran</h3>
                <?= form_open('admin/tambah_pesanan')?>
            <div class="form-floating mb-3">
            <input type="text" name="nama_pel" id="nama_pel" class="bg-secondary bg-opacity-10 form-control" placeholder="Masukkan nama anda" title="Masukkan nama pelanggan">
            <label for="nama_pel">Nama Pelanggan</label>
          </div>
<div class="form-floating mb-3">
<input type="datetime" name="tanggal" id="tanggal" class="bg-secondary bg-opacity-10 form-control" value="<?= date('d-m-y H:i')?>"  title="Tanggal pemesanan" disabled>
  <label for="tanggal">Tanggal</label>
</div>

<div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">+62</span>
              <div class="form-floating">
              <input type="text" name="no_hp" id="no_hp" class="bg-secondary bg-opacity-10 form-control" placeholder="sdah" title="Masukkan No HP atau No WA">
              <label for="no_hp">No HP/WA</label>
            </div>
</div>
<?= form_close()?>
<?= form_open('admin/tambah_pesanan')?>
                  
           <div class="justify-content-center text-center">
                  <button type="button" class="btn btn-primary btn-block btn-lg mb-3">Buat Pesanan</button>
                  <button type="button" class="btn btn-lg  btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambahkan ke pesanan yang sudah ada
            </button>
            </div>
                  

                  <?= form_close()?>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
</section>
<button onclick="topFunction()" id="btntotop" title="Go to top"><i data-feather="chevron-up"></i></button>
      
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Nama Pelanggan</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="<?= base_url('admin/tambah_detail_pesanan')?>" method="post">
                <select name="nama_pel" id="nama_pel" class="form-control">
                  <?php foreach($pesanan as $pesan):?>
                  <option value="<?= $pesan['nama_pelanggan']?>"><?= $pesan['nama_pelanggan']?></option>
                  <?php endforeach ?>
                </select>
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
                
              </div>
            </div>
          </div>
          
      </div>

      <hr>
      <br><br>
      
                  </main>
                  <button onclick="topFunction()" id="btntotop" title="Go to top"><i data-feather="chevron-up"></i></button>

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