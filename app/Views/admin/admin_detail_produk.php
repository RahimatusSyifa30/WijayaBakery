<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Produk</title>
    <link rel="shortcut icon" href="<?= base_url('image/logo/logo.png') ?>" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="<?= base_url('css/basic.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('css/detail_produk.css') ?>" />

</head>

<body>
    <!-- Header Start -->
    <?php
    $rootPath = ROOTPATH;
    $filePath = $rootPath . 'app\Views';
    include($filePath . '\layout\admin_header.php') ?>
    <!-- Header End -->
    <main>
        <?php
        include($filePath . '\layout\alert.php');
        ?>
        <section>
            <div class="container p-4 mt-md-4 mt-sm-0 bg-warning bg-opacity-25 rounded-4">
                <div class="row justify-content-center">
                    <div class="col-md-5 col-xs-12 text-center">
                        <img src="<?= base_url('image/roti/' . $pro[0]['gambar_produk']) ?>" class="img" alt="..." />

                    </div>
                    <div class="col-md-6 col-xs-12  align-self-">
                        <h1><?= $pro[0]['nama_produk'] ?></h1>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <h2 class="">Rp. <?= $pro[0]['harga_produk'] ?></h2>
                            <h4 class="" style="opacity: 0.8;"><?= $pro[0]['nama_kel'] ?></h4>
                        </div>
                        <h5 class="op mt-4"><?= $pro[0]['informasi_produk'] ?></h5>
                        <?php
                        echo form_open('admin/tambah_keranjang');
                        echo form_hidden('id', $pro[0]['id_produk']);
                        echo form_hidden('price', $pro[0]['harga_produk']);
                        echo form_hidden('modal', $pro[0]['modal_produk']);
                        echo form_hidden('name', $pro[0]['nama_produk']);
                        echo form_hidden('stok', $pro[0]['stok_produk']);
                        echo form_hidden('gambar', $pro[0]['gambar_produk']);
                        ?>
                        <div class="align-self-bottom text-end">
                            <button class="btn bg-btnhover-reverse round mt-4 btn-lg" type=" submit">
                                <i data-feather="shopping-cart"></i> Tambah ke Keranjang
                            </button>
                        </div>
                        <!-- -->
                        <?php echo form_close(); ?>
                    </div>

                </div>


            </div>

            </div>
        </section>
        <!-- Seluruh Produk End  -->
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
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
</body>

</html>