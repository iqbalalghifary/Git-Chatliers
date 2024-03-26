<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>

<h5 class="card-title fw-semibold mb-4">
   <i class="ti ti-bookmark"></i>Kelas
   <!-- <button class="btn btn-sm btn-primary float-end"> <i class="ti ti-plus"></i> Buka Kelas</button> -->
</h5>

<div class="row">

<?php $bgc=["bg-primary", "bg-secondary","bg-info","bg-warning","bg-danger","bg-success"] ?>

<?php foreach($kelas as $k):?>
   <div class="col-md-3">
      <div class="card <?= $bgc[rand(0,5)] ?>">
         <div class="card-body">
            <h3 class="text-center text-white">
               <i class="ti ti-school"></i>
               <?= $k['kelas'].' '.$k['jenjang'] ?>
            </h3>
         </div>
      </div>
   </div>
   <?php endforeach ?>

   <!-- <h6 class="text-center">
      Belum ada kelas
   </h6> -->


</div>

<?= $this->endSection() ?>