<?php if(session()->getFlashdata('notif')){ ?>
    <div id="alert">
        <div class="alert alert-success justify-content-between d-flex fade show" role="alert"> 
            <h5><?= session()->getFlashdata('notif')?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
<?php }else if(session()->getFlashdata('error')){?>
  <div id="alert"> 
    <div class="alert alert-danger justify-content-between d-flex fade show" role="alert"> 
        <h5><?= session()->getFlashdata('error')?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
<?php } ?>
