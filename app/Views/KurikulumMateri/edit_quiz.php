<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('/template/richtexteditor/rte_theme_default.css')?>" />
<script type="text/javascript" src="<?= base_url('/template/richtexteditor/rte.js')?>"></script>
<script type="text/javascript" src="<?= base_url('/template/richtexteditor/plugins/all_plugins.js')?>"></script>
<?= $this->endSection() ?>


<?= $this->section('content') ?>

<?= $this->include('Msg/alert') ?>

<div class="card">
    <div class="card-body">

        <h5 class="card-title fw-semibold mb-4">
            <i class="ti ti-bookmark"></i> Buat Quiz
        </h5>


        <form action="<?= base_url('kurikulumquiz/update/'.$quiz['id'])?>" method="post">
            <div class="form-group mb-2">
                <label class="form-label" for="">Judul</label>
                <input type="text" class="form-control" name="judul" value="<?=$quiz['judul']?>" required>
            </div>

            <label for="" class="form-label">Soal</label>
            <textarea id="inp_editor1" name='soal' required><?=$quiz['soal']?></textarea>

            <div class="form-group mt-3 mb-3">
                <label for="" class="form-label">Jawaban Benar</label>
                <input type="text" class="form-control" name='jl1' value="<?=$jawaban[0]['pilihan']?>" required>
            </div>

            <label for="" class="form-label">Jawaban Lain</label>
            <div class="form-group">
                <label for="" class="form-label">1</label>
                <input type="text" class="form-control" name='jl2' value="<?=$jawaban[1]['pilihan']?>"  required>
            </div>
            <div class="form-group">
                <label for="" class="form-label">2</label>
                <input type="text" class="form-control" name='jl3' value="<?=$jawaban[2]['pilihan']?>"  required>
            </div>
            <div class="form-group">
                <label for="" class="form-label">3</label>
                <input type="text" class="form-control" name='jl4' value="<?=$jawaban[3]['pilihan']?>"  required>
            </div>

            <button class="btn btn-primary float-end mt-5" type="submit">Simpan</button>

        </form>

    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>
    var editor1 = new RichTextEditor("#inp_editor1", {
        toolbar: "basic",
        galleryImages: [

        ],
    });
</script>

<?= $this->endSection() ?>