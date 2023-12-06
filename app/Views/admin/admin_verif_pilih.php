<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar User - Wijaya Bakery</title>
    <link rel="shortcut icon" href="<?= base_url('image/logo/logo.png') ?>" />
    <!-- Bootstrap Start -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <!-- Bootstrap End -->
    <link rel="stylesheet" href="<?= base_url('css/basic.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/verif.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/izi/css/iziToast.min.css') ?>" />
    <script src="<?= base_url('assets/izi/js/iziToast.min.js') ?>" type="text/javascript"></script>
</head>

<body>
    <!-- Header Start -->
    <?php
    $rootPath = ROOTPATH;
    $filePath = $rootPath . 'app\Views';
    include($filePath . '\layout\admin_header.php') ?>
    <!-- Header End -->
    <main>
        <?php include($filePath . '\layout\alert.php') ?>
        <div class="container con mt-md-4 mt-sm-0 p-4 text-center bg-warning bg-opacity-25 rounded-4">
            <h1 class="bakery stroke">Daftar User</h1>
            <br>
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <a href="<?= base_url('admin/view_belum') ?>" class="btn bg-btnhover btn-gede">Belum Verifikasi KTP</a>
                </div>
                <div class="col-md-6 col-xs-12">
                    <a href="<?= base_url('admin/view_sudah') ?>" class="btn bg-btnhover btn-gede">Sudah Verifikasi KTP</a>
                </div>
            </div>

        </div>
    </main>
    <!-- Footer Start -->
    <?php include($filePath . '\layout\footer.php') ?>
    <!-- Footer End -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        feather.replace();
    </script>
    <script src="<?= base_url('assets/js/script.js') ?>"></script>
</body>

</html>