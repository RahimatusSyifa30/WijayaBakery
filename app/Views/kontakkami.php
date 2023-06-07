<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wijaya Bakery - Kontak Kami</title>
    <link rel="shortcut icon" href="image/logo/logo.png" />
  
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="<?= base_url('css/basic.css')?>">
    <link rel="stylesheet" href="<?= base_url('css/tentangkami.css')?>" />
</head>
<body>
    <!-- Header Start -->
    <?php include("layout/header.php") ?>
    <!-- Header End -->

    <section id="about">
      <div class="about-1">
      <h1 id="bakery" class="text-center stroke">Kontak Wijaya<span class="text-warning">Bakery.</span></h1>
        <img
                src="image/logo/logo.png"
                class="rounded mx-auto d-block"
                alt="..."
              />
        <hr>
      </div><br><br>
      <fieldset style="margin-left: 8%; margin-right: 8%;">
            <legend style="background-color: rgb(255, 97, 179);">Kirim Sebuah Pesan Kepada Kami</legend><br>
            <form action="<?= base_url('kirim_pesan')?>" method="post" style="margin-left: 10%;">
                <table>
                <tr>
                        <td>Nama </td>
                        <td>:</td>
                        <td><input type="text" name="nama" placeholder="masukan nama Anda"></td>
                    </tr>
                    <tr>
                        <td>No Telepon</td>
                        <td>:</td>
                        <td><input type="text" name="no_telp_costumer" placeholder="masukan nomor telepon Anda"></td>
                    </tr>
                    <tr>
                        <td>Subjek</td>
                        <td>:</td>
                        <td><input type="text" name="subjek_costumer" placeholder="masukan judul/tema dari pertanyaan/pesan Anda"></td>
                    </tr>
                    <tr>
                        <td>Pesan</td>
                        <td>:</td>
                        <td><input type="textarea" name="pesan" placeholder="masukan nama kota"></td>
                    </tr>
                    <tr>
                    <td></td>
                    <td></td>
                    <td><input type="submit" name="tambahK" value="Tambah"> <input type="reset" name="resetK" value="Reset"></td>
                    </tr>
                </table>
            </form>         
       </fieldset><br>
    </section>

    <!-- Footer Start -->
    <?php include("layout/footer.php") ?>
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
    <script src="assets/js/script.js" type="text/javascript"></script>
    
</body>
</html>