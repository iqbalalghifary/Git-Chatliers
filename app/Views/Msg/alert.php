<?php
    if(session()->getFlashData('success')){
    ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= session()->getFlashData('success') ?>
</div>
<?php   }else if(session()->getFlashData('error')){ ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?= session()->getFlashData('error') ?>
</div>
<?php }?>