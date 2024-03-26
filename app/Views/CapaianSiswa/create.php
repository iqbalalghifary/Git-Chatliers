<?= $this->extend('layouts/master') ?>
<?= $this->section('css') ?>


<?= $this->endSection() ?>


<?= $this->section('content') ?>


<div class="card">
    <div class="card-body">

        <h5 class="card-title fw-semibold mb-4">
            <i class="ti ti-bookmark"></i> Insert Nilai
        </h5>


        <form action="<?= base_url('capaiansiswa/'.$id)?>" method="post">

            <div class="form-group">
                <label for="" class="form-label">Nama Pelajaran</label>
                <input type="text" class="form-control" name="mata_pelajaran"  required>
            </div>

            <div class="form-group">
                <label for="" class="form-label">Nilai</label>
                <input type="number" class="form-control" name="nilai"  required>
            </div>

            <button class="btn btn-sm btn-primary float-end mt-3">Simpan</button>

        </form>

    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('js') ?>


<?= $this->endSection() ?>