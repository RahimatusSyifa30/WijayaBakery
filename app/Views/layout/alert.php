<?php if (session()->getFlashdata('notif')) { ?>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var flashMessage = "<?= session()->getFlashdata('notif') ?>"; // Contoh dengan CodeIgniter
      if (flashMessage) {
        iziToast.success({
          title: 'Berhasil',
          message: flashMessage,
          position: 'topRight',
          // titleSize: 16,
          // messageSize: 16,
          backgroundColor: 'rgba(124, 253, 124, 1)',
          timeout: 10000,
        });
      }
    });
  </script>
<?php } else if (session()->getFlashdata('error')) { ?>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var flashMessage = "<?= session()->getFlashdata('error') ?>"; // Contoh dengan CodeIgniter
      if (flashMessage) {
        iziToast.warning({
          title: 'Gagal',
          message: flashMessage,
          position: 'topRight',
          // titleSize: 16,
          // messageSize: 16,
          // titleColor: 'white',
          // messageColor: 'white',
          backgroundColor: 'rgba(228, 103, 112, 1)',
          timeout: 10000,
        });
      }
    });
  </script>
<?php } ?>