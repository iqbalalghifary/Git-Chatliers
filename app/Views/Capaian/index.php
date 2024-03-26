<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>
<style>

</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h5 class="card-title fw-semibold mb-4">
   <i class="ti ti-bookmark"></i> Hasil Capaian
</h5>

<div class="row capaian" >

   <?php foreach($capaian as $i=>$c) : ?>
   <div class="col-md-12 cp">
      <div class="card">
         <div class="card-body">
           <div class="row">
            <div class="col-1">
               <h1><?= $i+1 ?></h1>
            </div>
            <div class="col-2">
            <img src="<?php echo base_url('/template//images/profile/user-1.jpg')?>" alt="" width="45" height="45"
                     class="rounded-circle">
            </div>
            <div class="col-6">
               <h1><?= $c['nama'] ?></h1>
            </div>
            <div class="col-2">
                  <div class="float-end">
                     <h3 class=" fw-semibold text-end">
                        <span style="font-size:12px;">Lvl.</span> <?= $c['exp'] == null ? 0 : $c['exp']  ?>
                     </h3>
                  </div>
            </div>

           </div>
         </div>
      </div>
   </div>
<?php endforeach ?>
   
</div>

<?= $this->endSection() ?>