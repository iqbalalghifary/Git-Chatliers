<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>

<?= $this->include('Msg/alert') ?>

<div class="card">
   <div class="card-body">

      <h5 class="card-title fw-semibold mb-4">
         <i class="ti ti-bookmark"></i> Buat Materi Baru
      </h5>


      <form action="<?= base_url('materikurikulum/'.$materi['id'])?>" method="post" enctype="multipart/form-data">

         <div class="form-group mb-2">
            <label class="form-label" for="">Judul</label>
            <input type="text" class="form-control" name="nama_materi" required value="<?= $materi['nama_materi'] ?>">
         </div>


         <div class="form-group mb-2">
            <label class="form-label" for="">Deskripsi </label>
            <textarea name="deskripsi" class="form-control" rows="10"><?= $materi['deskripsi'] ?></textarea>
         </div>

         <div class="form-group mb-2">
            <label class="form-label" for="">Kelas</label>
            <select name="kelas_id" id="" class="form-control" required>
               <?php foreach($kelas as $k):?>
               <option value="<?=$k['id']?>" <?= $materi['kelas_id'] == $k['id'] ? 'selected':'' ?> ><?=$k['kelas'].' '.$k['jenjang']?></option>
               <?php endforeach ?>
            </select>
         </div>
         <div class="form-group mb-2">
            <label class="form-label" for="">Mapel</label>
            <select name="mapel_id" id="" class="form-control" required>
               <?php foreach($mapel as $k):?>
               <option value="<?=$k['id']?>" <?= $materi['mapel_id'] == $k['id'] ? 'selected':'' ?> ><?=$k['mapel']?></option>
               <?php endforeach ?>
            </select>
         </div>




         <div class="mb-3">
            <label for="formFile" class="form-label">Sampul</label>
            <input class="form-control" type="file" id="formFile" name="sampul" accept="image/*">
         </div>

         <button class="btn btn-primary float-end mt-5" type="submit">Simpan</button>

      </form>

   </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>

</script>

<?= $this->endSection() ?>