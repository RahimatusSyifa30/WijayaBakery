 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Produk</title>
    <link rel="shortcut icon" href="<?= base_url('image/logo/logo.png')?>" />
    <!-- Bootstrap -->
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
    <!-- Link Swiper's CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="<?= base_url('css/basic.css')?>" />
    <link rel="stylesheet" href="<?= base_url('css/produk.css')?>"/>
  </head>
  
  <body>
    <!-- Header Start -->
  <?php 
    $rootPath = ROOTPATH;
    $filePath = $rootPath . 'app\Views';
    include($filePath.'\layout\header.php') ?>
    <!-- Header End -->
      <main>
        <?php include($filePath.'\layout\alert.php') ?>
        <div class="con">
          <div class="title">
            <h1 class="font-lg text-center bakery stroke-wt">Produk Wijaya<span class="text-warning">Bakery.</span></h1>
          </div>
        </div>
        
      <!-- Jenis Produk  Start  -->
      <section>
        <div class="container jenis-pro">
           <div class="row">
              <div class="col-xs-12 col-md-2 align-self-center text-center p-2">
                <h1 class="stroke">Jenis Produk</h1>
                <hr>
                <br>
                </div>
                <div class="col-xs-10 col-md-10">
                  <div class="swiper mySwiper p-4 justify-content-center">
                    <div class="swiper-wrapper">
                    <?php foreach ($kel_produk as $jen_pro) : ?>
                      <div class="swiper-slide ">
                        <div class="card card-pro" >
                          <img
                            src="<?= base_url('image/bg/jenis_produk/')?><?= $jen_pro["gambar_kel"]?>"
                            class="card-img-top"
                            alt="..."
                            
                          />
                          <div class="card-body ">
                            <h2 class="card-title"><?= $jen_pro["nama_kel"]?></h2>
                                
                          </div>
                          <div class="card-footer buttonCon">
                                  <button class="filter-btn btn btn-primary " data-kategori="<?= str_replace(" ","", $jen_pro['id_kel'])?>" onclick="alert('Jenis Produk Terpilih')">Lihat Produk</button>
                                </div>
                        </div>
                      </div>
                      <?php endforeach ?>
                    </div>
                    <br>
                    <br>
                    <div class="swiper-pagination"></div>
                  </div>
                </div>
              </div>
            </div>
 
        
      </section>
      <!-- Jenis Produk  End  --> 
      
      <!-- Seluruh Produk  Start  -->
      <section>
      
        <div class="container jenis-pro">
          <div class="text-center title">
            <h1 id="bakery" class="text-center stroke">Cari Produk Wijaya<span class="text-warning">Bakery.</span></h1>
            <hr>
            <br>
            <input type="text" name="cari_produk" id="cari" onkeyup="myFunction()" class="form-control mb-3 bg-secondary bg-opacity-10" placeholder="Cari produk...">
            <button class="form-control btn btn-primary filter-btn active" data-kategori="all" onclick="alert('Menampilkan Semua Jenis Produk'); ">Reset</button>
          </div>
        
          <!--  BUAT SELURUH PRODUK-->
          <div class="d-flex flex-wrap justify-content-around" id="SelProduk" >
            <?php foreach ($produk as $pro) :?>
            <div class="produk card-pro" data-kategori="<?= str_replace(" ","", $pro['jenis_produk'])?>" data-stok=<?= $pro['stok_produk']?>>
            <?php 
               echo form_open('admin/tambah_keranjang');
               echo form_hidden('id',$pro['id_produk']);
               echo form_hidden('price',$pro['harga_produk']);
               echo form_hidden('name',$pro['nama_produk']);
               echo form_hidden('stok',$pro['stok_produk']);
               echo form_hidden('gambar',$pro['gambar_produk']);
            ?>
            <div class="card ">
              <img
              src="<?= base_url('image/roti/')?><?= $pro["gambar_produk"]?>"
              class="card-img-top"
              alt="..."              
              />
              <div class="card-body text-center" >
                <h2 class="card-title"><?= $pro["nama_produk"]?></h2>
                <!-- <p><?= $pro["informasi_produk"]?></p> -->
                <h3>Modal Rp. <?= $pro["modal_produk"]?></h3>
                <h3>Rp. <?= $pro["harga_produk"]?></h3>
                <h3>Stok : <?= $pro["stok_produk"]?></h3>
                <div class="card-footer buttonCon">
                <button class="btn btn-primary text-wrap tambah" type="submit">
                  <i data-feather="shopping-cart"></i> Tambah ke Keranjang
                </button>                 
               </div>
              </div>
            </div>
            </div>
            
          <?php echo form_close(); 
          endforeach ?>
          </div>
        
          </div>
      </section>
      <!-- Modal Konfirmasi Delete Produk-->
      <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Yakin untuk menghapus ini?
                      </div>
                      <div class="modal-footer">
                        <form id="formDelete" method="post">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                          <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!--  -->
      <!-- Seluruh Produk  Start  -->          
            </main>
      <!-- Footer Start -->
      <?php include($filePath.'\layout\footer.php') ?>
      <!-- Footer End -->
      <button onclick="topFunction()" id="btntotop" title="Go to top"><i data-feather="chevron-up"></i></button>
      <!-- Script Swiper -->
      <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
      <script>
        var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 20,
        freeMode: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
      breakpoints: {
        360: {
          slidesPerView: 1,
          spaceBetween: 20,
        },
        450: {
          slidesPerView: 1,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
      },
      });
      </script>
      <!-- Script feather-icons -->
      <script src="https://unpkg.com/feather-icons"></script>
      <script>
        feather.replace();
      </script>
      <!-- Script Manual -->
      <script src="<?= base_url('assets/js/produk.js')?>" type="text/javascript"></script>
      <script src="<?= base_url('assets/js/onkeyup.js')?>"></script>
      <script src="<?= base_url('assets/js/script.js')?>" type="text/javascript"></script>
      <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
  </body>
</html>
