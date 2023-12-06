<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Akun</title>
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
        <form action="<?= base_url('tambah_user') ?>" method="post" enctype="multipart/form-data" class="mt-4 d-flex justify-content-center">
            <div class=" bg-warning bg-opacity-25 rounded-4 ">
                <div class="row p-4">
                    <h1 class="bakery stroke  mb-4 text-center">Registrasi</h1>
                    <div class="col-md-6 col-xs-12 ">
                        <div class="form-floating mb-3 ">
                            <input type="text" name="nama_user" id="nama_user" class="bg-light form-control" required>
                            <label for="nama_user">Nama</label>
                        </div>
                        <div class="form-floating mb-3 ">
                            <input type="text" name="no_hp" id="no_hp" class="bg-light form-control" required>
                            <label for="no_hp">No HP</label>
                        </div>
                        <div class="form-floating mb-3 ">
                            <input type="password" name="password" id="password" class="bg-light form-control" required>
                            <label for="password">Password</label>
                        </div>
                        <div class="form-floating mb-3 ">
                            <textarea name="alamat" id="alamat" class="bg-light form-control" cols=50 rows=30 required></textarea>
                            <label for="alamat">Alamat</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <label for="ktp">Foto KTP</label>
                        <br>
                        <img id="gambarTampil1" src="#" style="max-width: 100%; max-height: 200px;">
                        <input type="file" name="ktp" id="ktp" class="bg-light form-control" accept=".jpeg,.jpg,.png,image" required>
                        <p>Note : KTP akan diverifikasi terlebih dahulu, kurang lebih 1-2 hari</p>
                        <div id="captcha-container">
                            <label for="captcha-input">Captcha</label>
                            <input type="hidden" id="captcha-result" name="captcha-result">
                            <input type="text" id="captcha-input" name="captcha-input" class="form-control" required>
                            <p>Note : Captcha wajib diisi untuk mencegah anti-spam</p>
                        </div>
                        <div class="d-flex mt-4 justify-content-around">
                            <a href="<?= base_url('login') ?>" class="btn btn-danger btn-lg">Kembali</a>
                            <button type="submit" name="sub" class="btn btn-success btn-lg">Buat Akun</button>
                        </div>

                    </div>

                    <!-- <div class="col-md-6 col-xs-12 justify-content-center d-flex">
                        <img src="<?= base_url('image/roti/pisang_coklat.jpeg') ?>" class="rounded-5" style="width: 460px;">

                    </div> -->
                </div>


            </div>



        </form>

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
    <script src="<?= base_url('assets/js/regis.js') ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/js/akun-detail.js') ?>" type="text/javascript"></script>
</body>

</html>