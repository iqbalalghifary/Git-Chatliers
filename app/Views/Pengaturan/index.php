<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>


<div class="card">
   <div class="card-body">

      <h5 class="card-title fw-semibold mb-4">
         <i class="ti ti-bookmark"></i> Pengatuan Password
      </h5>

      <form action="<?= base_url('pengaturan')?>" method="post">

         <div class="form-group">
            <label for="" class="form-label">Password Baru</label>
            <input type="password" class="form-control" name="password" required>
         </div>

         <button class="btn btn-primary float-end mt-5" type="submit">Simpan</button>

      </form>

   </div>
</div>

<?= $this->endSection() ?>