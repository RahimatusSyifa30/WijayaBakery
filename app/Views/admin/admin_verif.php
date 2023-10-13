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
    <link rel="stylesheet" href="<?= base_url('css/pesanan.css') ?>">
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
        <div class="container mt-md-4 mt-sm-0 p-4 text-center bg-warning bg-opacity-25 rounded-4">
            <h1 class="bakery stroke">Daftar User</h1>
            <div class="row justify-content-center">
                <div class="mb-2 col-md-12 col-xs-12 ">
                    <div class="position-relative">
                        <form action="" method="post">
                            <div class="input-group mt-2 mb-3">
                                <input type="text" name="cari" id="cariBelum" class="form-control mb-3 bg-white " placeholder="Cari no HP...">
                                <div class="input-group-append">
                                    <button type="submit" class="btn bg-btnhover" id="button-addon2">Cari</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php if (empty($user)) { ?>
                <div class="container-fluid mt-4">
                    <div class="row ">
                        <div class="offset-lg-3 col-lg-6 col-md-12 col-12 text-center bg-light p-4 rounded-4">
                            <h2 class="bakery">Tidak ada User.😁</h2>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="">
                    <table class="table table-responsive table-borderless rounded-2 table-warning table-hover bakery" id="pesanan_belum" aria-disabled="">
                        <thead>
                            <tr class="bg-light">
                                <th scope="col" width="10%">No HP</th>
                                <th scope="col" width="20%">Nama Pelanggan</th>
                                <th scope="col" width="20%">Alamat</th>
                                <th scope="col" width="10%">Verifikasi</th>
                                <th scope="col" width="5%"></th>
                                <th scope="col" width="5%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $counter = 0;
                            foreach ($user as $pesan) : ?>
                                <tr>
                                    <td class="fw-bolder"><?= $pesan['no_hp_user'] ?></td>
                                    <td class="fw-bolder"><?= $pesan['nama_user'] ?></td>
                                    <td><?= $pesan['alamat'] ?></td>
                                    <td class="fw-bolder"><?= $pesan['verifikasi'] ?></td>
                                    <td class="fw-bolder"><i data-feather="x" class="featherr"></td>
                                    <td class="fw-bolder"><i data-feather="check-circle" class="featherr"></td>
                                </tr>
                            <?php $counter++;
                            endforeach ?>

                        </tbody>
                    </table>
                </div>

                <div class="pagination justify-content-end">
                    <?= $pager->links('user', 'pagination') ?>
                </div>
            <?php } ?>
            <div class="mt-4 text-start">
                <a href="<?= base_url('admin/view_verif') ?>" class="btn btn-danger btn-lg">Kembali</a>
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