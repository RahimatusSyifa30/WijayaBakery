 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Produk</title>
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
    <link rel="stylesheet" href="<?= base_url('css/index.css')?>" />
    <link rel="stylesheet" href="<?= base_url('css/pesanan.css')?>" />
  </head>
  
  <body>
  <!-- ModalTambahJenisProduk -->
  
  <div class="modal fade" id="ModalTambahJenisProduk" tabindex="-1" aria-labelledby="tambahjenis" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="tambahjenis">Tambah Jenis Produk</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">
      <form id="formTambahJenis" method="post" enctype="multipart/form-data">
      <label for="nama_kel_pro">Nama Jenis Produk</label>
      <input type="text" name="nama_kel_pro" id="nama_kel_pro" class="bg-secondary bg-opacity-10 form-control" placeholder="Masukkan Nama Produk" required>
      <label for="gambar_pro">Gambar Produk</label>
      <input type="file" name="gambar_kel_pro" id="gambar_pro" class="bg-secondary bg-opacity-10 form-control" accept=".jpeg,.jpg,.png,image" placeholder="Masukkan Gambar Produk" required>    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Selesai</button>
      </div>
      </form>
    </div>
  </div>
  </div>
  
  <!--  -->
  <!-- Header Start -->
    <?php 
    $rootPath = ROOTPATH;
    $filePath = $rootPath . 'app\Views';
    include($filePath.'\layout\admin_header.php') ?>
    <!-- Header End -->
      <content>
      
          <?php 
          if(session()->getFlashdata('notif')){ 
            echo '<div class="col-12">';
            echo '<div class="alert alert-success justify-content-between d-flex fade show" role="alert">';
              echo '<h5>'.session()->getFlashdata('notif').'</h5>';
              echo '
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
              echo '</div>';
          }else if(session()->getFlashdata('error')){
            echo '<div class="col-12">'; 
            echo '<div class="alert alert-danger justify-content-between d-flex fade show" role="alert">';
              echo '<h5>'.session()->getFlashdata('error').'</h5>';
              echo '
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
              echo '</div>';
          }
          ?>
        
        <!-- Jenis Produk  Start  -->
        <section>
          
        <div class="container-fluid p-5">
         <h1 id="bakery" class="text-center stroke">Produk Wijaya<span class="text-warning">Bakery.</span></h1>
            <div class="row border border-warning">
              <div class="col-xs-12 col-md-2 align-self-center text-center p-2">
                <h1 id="bakery" class="stroke">Jenis Produk</h1>
                <button href="#ModalTambahJenisProduk" data-bs-toggle="modal" data-bs-target="#ModalTambahJenisProduk" class="btn btn-success" onclick="$('#ModalTambahJenisProduk #formTambahJenis').attr('action','<?= base_url('admin/tambah_kel_produk') ?>')">Tambah Jenis Produk +</button>
                </div>
              <div class="col-xs-12 col-md-10">
                  <div class="swiper mySwiper p-4">
                    <div class="swiper-wrapper">
                    <?php foreach ($kel_produk as $jen_pro) : ?>
                      <div class="swiper-slide">
                        <div class="card border-warning" >
                          <img
                            src="<?= base_url('image/bg/jenis_produk/')?><?= $jen_pro["gambar_kel"]?>"
                            class="card-img-top"
                            alt="..."
                            
                          />
                          <div class="card-body">
                            <h2 class="card-title"><?= $jen_pro["nama_kel"]?></h2>
                                <div class="btn-group">
                                    <a href="<?= base_url('admin/ubah_kel_produk/'.$jen_pro['nama_kel']) ?>"  class="btn btn-warning"><i data-feather="edit"></i> Edit</a>
                                    <a href="<?= base_url('admin/delete_kel_produk/'.$jen_pro['nama_kel']) ?>"  class="btn btn-danger"><i data-feather="trash-2"></i> Hapus</a>
                                </div>
                                <div class="buttonCon">
                                  <button class="filter-btn btn btn-primary" data-kategori="<?= str_replace(" ","", $jen_pro['nama_kel'])?>" onclick="alert('Jenis Produk Terpilih')">Lihat Produk</button>
                                </div>
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
        
          <div class="container-fluid p-5 m-2 border border-warning">
            <div class="col-12 text-center">
              <h1 id="bakery" class="text-center stroke">Cari Produk Wijaya<span class="text-warning">Bakery.</span></h1>
              <input type="text" name="cari_produk" id="cari" onkeyup="myFunction()" class="form-control mb-3 bg-secondary bg-opacity-10" placeholder="Cari produk...">
              <a href="<?= base_url('admin/tambah_produk')?>" class="btn btn-lg btn-success">Tambah Produk +</a>
            </div>
          
            <!--  BUAT SELURUH PRODUK-->
            <div class="container flex-wrap justify-content-center" id="SelProduk" >
            <div class="row">

            
              <button class="form-control btn btn-primary filter-btn active" data-kategori="all" onclick="alert('Menampilkan Semua Jenis Produk'); ">Reset</button>
            <?php foreach ($produk as $pro) :?>
              <div class="col-md-3 col-xs-12">
              <div class="produk" data-kategori="<?= str_replace(" ","", $pro['jenis_produk'])?>">
              <?php 
            
                 echo form_open('admin/tambah_keranjang');
                 echo form_hidden('id',$pro['id_produk']);
                 echo form_hidden('price',$pro['harga_produk']);
                 echo form_hidden('name',$pro['nama_produk']);
                 echo form_hidden('stok',$pro['stok_produk']);
                 echo form_hidden('gambar',$pro['gambar_produk']);
              ?>
              <div class="card border-warning m-2 " style="width: 100%;">
                <img
                src="<?= base_url('image/roti/')?><?= $pro["gambar_produk"]?>"
                class=""
                alt="..."              
                />
                <div class="card-body text-center" >
                  <h2 class="card-title"><?= $pro["nama_produk"]?></h2>
                  <p><?= $pro["informasi_produk"]?></p>
                  <h3 id="bakery">Modal Rp. <?= $pro["modal_produk"]?></h3>
                  <h3>Rp. <?= $pro["harga_produk"]?></h3>
                  <h3>Stok : <?= $pro["stok_produk"]?></h3>
                  <div class="btn-group align-self-end">
                    <a href="<?= base_url('admin/ubah_produk/'.$pro["id_produk"]) ?>" class="btn btn-warning">
                      <i data-feather="edit"></i> Edit
                    </a>
                    <a href="#modalDelete" onclick="$('#modalDelete #formDelete').attr('action','<?= base_url('admin/delete_produk/'.$pro['id_produk']) ?>');" data-bs-toggle="modal" data-bs-target="#modalDelete" class="btn btn-danger">
                      <i data-feather="trash-2" class="text-light"></i> Hapus
                    </a>
                  </div>
                  <div>
                  <button class="btn btn-primary text-wrap" type="submit" onclick="handleClick(this,<?= $pro['stok_produk']?>)">
                    <i data-feather="shopping-cart"></i> Tambah ke Keranjang
                  </button>                 
                 </div>
                </div>
              </div>
              </div>
              </div>
              
            <?php 
            echo form_close(); 
            endforeach ?>
            </div>
          </div>
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
        </section>
        <!-- Seluruh Produk  Start  -->          
      </content>
      <!-- Footer Start -->
      <?php include($filePath.'\layout\footer.php') ?>
      <!-- Footer End -->
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
      <script src="<?= base_url('assets/js/pesanan.js')?>" type="text/javascript"></script>
      <script src="<?= base_url('assets/js/onkeyup.js')?>"></script>

      <script src="<?= base_url('assets/js/script.js')?>" type="text/javascript"></script>
      <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
  
  </body>
</html>
