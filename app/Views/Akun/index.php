<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>


<div class="card">
   <div class="card-body">
   
<h5 class="card-title fw-semibold mb-4">
   <i class="ti ti-bookmark"></i> Informasi Pribadi
</h5>


<form action="<?= base_url('akun')?>" method="post">

<div class="form-group mb-2">
   <label class="form-label" for="">Nama</label>
   <input type="text" class="form-control" name="nama" required value="<?= $user["nama"] ?>">
</div>

<div class="form-group mb-2">
   <label class="form-label" for="">Email</label>
   <input type="email" class="form-control" name="email" required value="<?= $user["email"] ?>" disabled>
</div>


<div class="form-group mb-2">
   <label class="form-label" for="">No Hp</label>
   <input type="text" class="form-control" name="no_hp" required value="<?= $user["no_hp"] ?>">
</div>


<div class="form-group mb-2">
   <label class="form-label" for="">Alamat</label>
  <textarea name="alamat"  class="form-control"><?= $user['alamat'] ?></textarea>
</div>

<div class="form-group mb-2">
   <label class="form-label" for="">Sekolah</label>
   <select  class="form-control" disabled>
  <?php  foreach($sekolah as $s):?>
   <option value="<?= $s['id'] ?>" <?= $user['sekolah_id'] == $s['id'] ? 'selected': '' ?> ><?=$s['nama_sekolah']?></option>
   <?php endforeach ?>

   </select>
</div>

<?php if($user["role"] == "siswa"){ ?>

   <div class="form-group mb-2">
   <label class="form-label" for="">Kelas</label>
   <select  class="form-control" disabled>
  <?php  foreach($kelas as $s):?>
   <option value="<?= $s['id'] ?>" <?= $user['kelas_id'] == $s['id'] ? 'selected': '' ?> ><?=$s['kelas'] .' '.$s['jenjang'] ?></option>
   <?php endforeach ?>

   </select>
</div>

<?php } ?>

<button class="btn btn-primary float-end mt-5" type="submit">Simpan</button>

</form>

   </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>

</script>

<?= $this->endSection() ?>
