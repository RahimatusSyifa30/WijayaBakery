<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login Administrator | Wijaya Bakery</title>
  <link rel="shortcut icon" href="<?= base_url('image/logo/logo.png') ?>" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="<?= base_url('css/basic.css') ?>">
  <link rel="stylesheet" href="<?= base_url('css/login.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/izi/css/iziToast.min.css') ?>" />
  <script src="<?= base_url('assets/izi/js/iziToast.min.js') ?>" type="text/javascript"></script>

</head>


<body>
  <?php
  $rootPath = ROOTPATH;
  $filePath = $rootPath . 'app\Views';
  include($filePath . '\layout\header.php') ?>
  <div class="top-0 position-absolute">
    <?php
    include($filePath . '\layout\alert.php') ?>
  </div>
  <div class="bg">
  </div>
  <main>
    <div class="cont">
      <div class="login-panel panel panel-default p-4 bg-warning-subtle">
        <div class="panel-heading text-center m-2">
          <h1 class="font-lg text-center bakery stroke">Login Wijaya<span class="text-warning">Bakery.</span></h1>
        </div>
        <div class="panel-body m-3">
          <form role="form" action="<?= base_url('login'); ?>" method="POST">
            <fieldset>
              <div class="form-floating m-3">
                <input type="username" name="no_hp" class="form-control" id="floatingInput" placeholder="No HP" required>
                <label for="floatingInput">No HP</label>
              </div>
              <div class="form-floating m-3">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
              </div>
              <button type="submit" class="btn bg-btnhover btn-lg">
                Login
              </button>
            </fieldset>
            <br>
            <a href="<?= base_url('registrasi') ?>" class="text-decoration-none btnhover">Belum punya akun?</a>
          </form>
        </div>
      </div>
    </div>
  </main>
  <script src="https://unpkg.com/feather-icons"></script>
  <script>
    feather.replace();
  </script>
  <script src="<?= base_url("assets/js/script.js") ?>" type="text/javascript"></script>

</body>

</html>