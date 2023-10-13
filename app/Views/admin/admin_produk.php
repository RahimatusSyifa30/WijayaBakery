<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Produk</title>
  <link rel="shortcut icon" href="<?= base_url('image/logo/logo.png') ?>" />
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  <link rel="stylesheet" href="<?= base_url('css/basic.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('css/index.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('css/produk.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('css/card-produk-admin.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/izi/css/iziToast.min.css') ?>" />
</head>

<body>
  <!-- Header Start -->
  <?php
  $rootPath = ROOTPATH;
  $filePath = $rootPath . 'app\Views';
  include($filePath . '\layout\admin_header.php') ?>
  <!-- Header End -->


  <!--  -->
  <main>
    <?php include($filePath . '\layout\alert.php') ?>
    <div class="mt-5">
      <div class="p-4">
        <h1 class="font-lg text-center bakery stroke">Produk Wijaya<span class="text-warning">Bakery.</span></h1>
        <hr class="hr-title">

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
            <div>
              <button href="#ModalTambahJenisProduk" data-bs-toggle="modal" data-bs-target="#ModalTambahJenisProduk" class="btn bg-btnhover-reverse " onclick="$('#ModalTambahJenisProduk #formTambahJenis').attr('action','<?= base_url('admin/tambah_kel_produk') ?>')">Tambah Jenis Produk +</button>
            </div>
            <div>
              <button class="btn mt-2 bg-btnhover-reverse  filter-btn  mb-3 border-0" id="basic-addon2" data-kategori="all" onclick="iziinfo('Menampilkan Semua Jenis Produk'); ">Reset Filter</button>
            </div>
          </div>
          <div class="col-xs-10 col-md-10">
            <div class="swiper mySwiper p-4 justify-content-center">
              <div class="swiper-wrapper">
                <?php foreach ($kel_produk as $jen_pro) : ?>
                  <div class="swiper-slide">
                    <div class="card card-jenis-pro border-warning">
                      <button class="filter-btn btn" data-kategori="<?= str_replace(" ", "", $jen_pro['id_kel']) ?>" onclick="iziinfo('Menampilkan filter Produk  <?= $jen_pro['nama_kel'] ?> ')" style="z-index: 50;">

                        <img src="<?= base_url('image/bg/jenis_produk/') ?><?= $jen_pro["gambar_kel"] ?>" class="card-img-top" alt="..." />

                      </button>
                      <div class="card-body text-center">
                        <h2 class="card-title"><?= $jen_pro["nama_kel"] ?></h2>
                        <div class="btn-group position-relative d-flex" role="group" style="z-index: 100;">
                          <a href="<?= base_url('admin/ubah_kel_produk/' . $jen_pro['id_kel']) ?>" class="btn bg-btnhover-reverse"><i data-feather="edit" class="small-w"></i> Edit</a>
                          <a href="#modalDelete" onclick="$('#modalDelete #formDelete').attr('action','<?= base_url('admin/delete_kel_produk/' . $jen_pro['id_kel']) ?>');" data-bs-toggle="modal" data-bs-target="#modalDelete" class="btn btn-danger">
                            <i data-feather="trash-2" class="small-w"></i> Hapus
                          </a>
                        </div>
                      </div>
                      <button class="bg-btnhover-reverse btn round filter-btn" data-kategori="<?= str_replace(" ", "", $jen_pro['id_kel']) ?>" onclick="iziinfo('Menampilkan filter Produk  <?= $jen_pro['nama_kel'] ?> ')">
                        Lihat Produk
                      </button>
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
      <div class="container jenis-pro p-4">
        <div class="d-flex justify-content-between">
          <p></p>
          <h1 id="bakery" class="text-center stroke p-3">Cari Produk Wijaya<span class="text-warning">Bakery.</span></h1>
          <p> </p>
        </div>
        <div class="text-center">
          <hr>
          <br>
          <input type="text" name="cari_produk" id="cari" onkeyup="myFunction()" class="form-control mb-3 bg-secondary bg-opacity-10" placeholder="Cari produk..." aria-label="Cari produk..." aria-describedby="basic-addon2">
          <a href="<?= base_url('admin/tambah_produk') ?>" class="btn btn-lg bg-btnhover-reverse">Tambah Produk +</a>
        
        </div>

        <!--  BUAT SELURUH PRODUK-->
        <div class="mt-4 d-flex flex-fill flex-wrap justify-content-center rounded-2" id="SelProduk">
          <?php $a = 0;
          foreach ($produk as $pro) : ?>
            <!-- <button> -->
            <div class="produk p-3" data-kategori="<?= str_replace(" ", "", $pro['jenis_produk']) ?>" data-stok=<?= $pro['stok_produk'] ?>>
              <?php
              echo form_open('admin/tambah_keranjang');
              echo form_hidden('id', $pro['id_produk']);
              echo form_hidden('price', $pro['harga_produk']);
              echo form_hidden('modal', $pro['modal_produk']);
              echo form_hidden('name', $pro['nama_produk']);
              echo form_hidden('stok', $pro['stok_produk']);
              echo form_hidden('gambar', $pro['gambar_produk']);
              ?>
              <div class="card card-pro border-warning">
                <a href="<?= base_url('admin/detail_produk/' . str_replace(" ", "-", $pro['nama_produk'])) ?>">
                  <img src="<?= base_url('image/roti/') ?><?= $pro["gambar_produk"] ?>" class="card-img-top" alt="..." />
                </a>
                <div class="card-body text-center">
                  <h2 class="card-title title-height align-self-center"><?= $pro["nama_produk"] ?></h2>
                  <h4 class="text-dark">Modal Rp. <?= $pro["modal_produk"] ?></h4>
                  <div class="body-card  d-flex justify-content-evenly justify-content-center align-items-center" style="opacity: 0.8;">
                    <h4 class="">Stok <?= $pro["stok_produk"] ?></h4>
                    <h4>|</h4>
                    <h4 class="">Rp. <?= $pro["harga_produk"] ?></h4>
                  </div>
                  <div class="btn-group align-self-end mt-2">
                    <a href="<?= base_url('admin/ubah_produk/' . $pro["id_produk"]) ?>" class="btn bg-btnhover-reverse">
                      <i data-feather="edit" class="small-w"></i> Edit
                    </a>
                    <a href="#modalDelete" onclick="$('#modalDelete #formDelete').attr('action','<?= base_url('admin/delete_produk/' . $pro['id_produk']) ?>');" data-bs-toggle="modal" data-bs-target="#modalDelete" class="btn btn-danger">
                      <i data-feather="trash-2" class="text-light small-w"></i> Hapus
                    </a>
                  </div>
                </div>
                <!-- card footer -->
                <button id="add<?= $a ?>" class="btn bg-btnhover-reverse round position-relative" type="submit">
                  <i data-feather="shopping-cart" class="small-w"></i> Tambah ke Keranjang
                </button>
                <!-- -->
              </div>
            </div>
          <?php echo form_close();
            $a++;
          endforeach ?>
          <!-- </button> -->
        </div>

      </div>
    </section>
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
              <input type="file" name="gambar_kel_pro" id="gambar_pro" class="bg-secondary bg-opacity-10 form-control" accept=".jpeg,.jpg,.png,image" placeholder="Masukkan Gambar Produk" required style="width: 100%;">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
            <button type="submit" class="btn bg-btnhover">Selesai</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Modal Notif Ketika button dipencet -->
    <div class="modal fade" id="ModalNotif" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
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
              <button type="button" class="btn bg-btnhover" data-bs-dismiss="modal">Kembali</button>
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
  <?php include($filePath . '\layout\footer.php') ?>
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
          slidesPerView: 2,
          spaceBetween: 20,
        },
        450: {
          slidesPerView: 2,
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
  <script src="<?= base_url('assets/js/produk.js') ?>" type="text/javascript"></script>
  <script src="<?= base_url('assets/js/onkeyup.js') ?>"></script>
  <script src="<?= base_url('assets/js/script.js') ?>" type="text/javascript"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
  <!-- <script src="<?= base_url('assets/izi/js/iziToast.js') ?>" type="text/javascript"></script> -->
  <script src="<?= base_url('assets/izi/js/iziToast.min.js') ?>" type="text/javascript"></script>

</body>

</html>