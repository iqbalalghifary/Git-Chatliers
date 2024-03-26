<?= $this->extend('layouts/master') ?>


<?= $this->section('css') ?>

<?= $this->endSection()?>

<?= $this->section('content') ?>

<h5 class="card-title fw-semibold mb-4">
    <i class="ti ti-brand-discord"></i>
</h5>

<div class="card">
    <div class="card-body">
        <h1 class="title text-center">Quiz Selesai</h1>

        <div class="card mt-2 mx-5">
            <div class="card-body px-5">
                    <h1 class="border px-3">Benar <span class="float-end"><?= $benar ?></span> </h1>
                    <h1 class="border px-3">Salah <span class="float-end"><?= $salah ?></span> </h1>
                    <a href="<?=base_url('pelajaran/'.$id) ?>" class="btn mx-auto d-block mt-5 btn-success">Kembali</a>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection() ?>
