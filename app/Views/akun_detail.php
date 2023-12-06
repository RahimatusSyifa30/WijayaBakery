<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Akun</title>
    <link rel="shortcut icon" href="<?= base_url('image/logo/logo.png') ?>" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="<?= base_url('css/basic.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('css/index.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/izi/css/iziToast.min.css') ?>" />
    <script src="<?= base_url('assets/izi/js/iziToast.min.js') ?>" type="text/javascript"></script>
</head>

<body>
    <!-- Header Start -->
    <?php
    $rootPath = ROOTPATH;
    $filePath = $rootPath . 'app\Views';
    include($filePath . '\layout\header.php') ?>
    <!-- Header End -->
    <div class="top-0 position-absolute">
        <?php
        include($filePath . '\layout\alert.php') ?>
    </div>
    <main>
        <form action="<?= base_url('update_akun') ?>" method="post" enctype="multipart/form-data" class="mt-4 d-flex justify-content-center">
            <div class=" bg-warning bg-opacity-25 rounded-4 ">
                <div class="row p-4">
                    <h1 class="bakery stroke  mb-4 text-center">Akun</h1>
                    <div class="col-md-6 col-xs-12 ">
                        <div class="form-floating mb-3 ">
                            <input type="text" name="nama_user" id="nama_user" class="bg-light form-control" value="<?= $user['nama_user'] ?>" required>
                            <label for="nama_user">Nama</label>
                        </div>
                        <div class="form-floating mb-3 ">
                            <input type="text" name="no_hp" id="no_hp" class="bg-light form-control" value="<?= $user['no_hp_user'] ?>" required>
                            <label for="no_hp">No HP</label>
                        </div>
                        <div class="form-floating mb-3 ">
                            <input type="password" name="password" id="password" class="bg-light form-control" value="<?= $user['password'] ?>" required>
                            <label for="password">Password</label>
                        </div>
                        <div class="form-floating mb-3 ">
                            <textarea name="alamat" id="alamat" class="bg-light form-control" cols=50 rows=30><?= $user['alamat'] ?></textarea>
                            <label for="alamat">Alamat</label>
                        </div>

                        <div>
                            <label for="ktp">Foto KTP</label>
                            <br>
                            <div class="text-center">
                                <img src="<?= base_url('image/ktp/') ?><?= $user['ktp'] ?>" style="max-width: 100%; max-height: 200px;" id="gambarTampil1">
                            </div>
                            <?php if (session()->get('verif') == 'Belum') { ?>
                                <p>Note : KTP anda belum terverifikasi</p>
                                <input type="file" name="ktp" id="ktp" class="bg-light form-control" accept=".jpeg,.jpg,.png,image" value="">
                            <?php } else if (session()->get('verif') == 'Diterima') { ?>
                                <p>Note : KTP anda sudah terverifikasi</p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="">
                            <label for="foto-pro">Foto Profil</label>
                            <br>
                            <div class="text-center">
                                <img src="<?= base_url('image/prof/') ?><?= $user['foto_profil'] ?>" alt="" id="gambarTampil2" class="foto-prof ">
                            </div>
                            <input type="file" name="foto-pro" id="foto-pro" class="bg-light form-control" accept=".jpeg,.jpg,.png,image">
                        </div>
                        <br>
                        <?php if (session()->get('isLoggedInAdmin')) {
                        } else { ?>
                            <button href="#modalDelete" data-bs-toggle="modal" data-bs-target="#modalDelete" class="btn btn-danger">
                                <i data-feather="trash-2" class="text-light small-w"></i> Hapus Akun
                            </button>
                        <?php } ?>
                        <div class="d-flex mt-4 justify-content-around">
                            <a href="javascript:void(0)" onclick="history.back();" class="btn btn-danger btn-lg">Kembali</a>
                            <input type="submit" name="sub" class="btn btn-success btn-lg" value="Simpan"></input>
                        </div>

                    </div>

                </div>


            </div>



        </form>
        <!-- Modal Konfirmasi Delete Produk-->
        <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Akun</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Yakin untuk menghapus akun ini?
                    </div>
                    <div class="modal-footer">
                        <form id="formDelete" method="get" action="<?= base_url('hapus_akun') ?>">
                            <button type="button" class="btn bg-btnhover" data-bs-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer Start -->
    <?php include($filePath . '\layout\footer.php') ?>
    <!-- Footer End -->
    <!-- Script feather-icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        feather.replace();
    </script>
    <!-- Script Manual -->
    <script src="<?= base_url('assets/js/script.js') ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/js/akun-detail.js') ?>" type="text/javascript"></script>

</body>

</html>