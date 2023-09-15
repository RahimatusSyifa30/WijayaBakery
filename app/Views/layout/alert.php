<?php if (session()->getFlashdata('notif')) { ?>
  <script>
    $(document).ready(function() {
      iziToast.show({
        title: 'Sukses',
        message: '<?= session()->getFlashdata('notif') ?>',
        position: 'topRight',
      });
    });
  </script>
  <!-- <div id="alert">
    <div class="alert alert-success justify-content-between d-flex fade show" role="alert">
      <h5><?= session()->getFlashdata('notif') ?></h5>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div> -->
<?php } else if (session()->getFlashdata('error')) { ?>
  <script src="<?= base_url('assets/izitoast/js/iziToast.js') ?>" type="text/javascript">
    $(document).ready(function() {
      iziToast.warning({
        title: 'Gagal',
        message: '<?= session()->getFlashdata('error') ?>',
      });
    });
  </script>
  <!-- <div id="alert">
    <div class="alert alert-danger justify-content-between d-flex fade show" role="alert">
      <h5><?= session()->getFlashdata('error') ?></h5>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div> -->
<?php } ?>