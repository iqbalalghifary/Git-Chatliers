<?= $this->extend('layouts/master') ?>


<?= $this->section('css') ?>
<style>
    .input-group {
        cursor: pointer;
    }
</style>

<?= $this->endSection()?>

<?= $this->section('content') ?>

<h5 class="card-title fw-semibold mb-4">
    <i class="ti ti-brand-discord"></i> <?= $quiz['judul'] ?>
</h5>

<div class="card">
    <div class="card-body">
        <h5 class="title">Soal</h5>
        <div class="mt-2">
            <?= $quiz['soal'] ?>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">

        <form action="<?=base_url('pelajaranquiz/'.$quiz['materi_id']) ?>" method="post">
        <input type="text" class="d-none" name='id' value="<?= $quiz['id'] ?>">
        <h5 class="title">Jawaban</h5>

            <?php $pi = ["A","B","C","D"] ?>
            <?php foreach( $quiz['pilihan_ganda'] as $no=>$p) : ?>
            <div class="input-group border alert">
                <div class="input-group-text">
                    <label for="" class="form-label mt-2 me-2"><?= $pi[$no] ?></label>
                    <input class="form-check-input mt-0" type="radio" name="jawaban" value="<?= $p['id'] ?>">
                </div>
                <div class="ms-3 mt-2 jawab">
                    <?= $p['pilihan'] ?>
                </div>
            </div>
            <?php endforeach ?>


            <button type="submit" id="simpan-jawaban" class="btn btn-success mt-3 float-end" disabled>Simpan
                Jawaban</button>

        </form>


    </div>


</div>



<?= $this->endSection() ?>
<?= $this->section('js') ?>
<script>
    $(".input-group").on('click', (e) => {
        $(e.target).find("input").click()
        $(e.target).parent().find(".border-primary").removeClass("border-primary")
        $(e.target).addClass("border-primary")
        $("#simpan-jawaban").prop("disabled", false)
    })
</script>
<?= $this->endSection() ?>