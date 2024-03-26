<?= $this->extend('layouts/master') ?>
<?= $this->section('css') ?>

<link rel="stylesheet" href="<?= base_url('/template/richtexteditor/rte_theme_default.css')?>" />
<script type="text/javascript" src="<?= base_url('/template/richtexteditor/rte.js')?>"></script>
<script type="text/javascript" src="<?= base_url('/template/richtexteditor/plugins/all_plugins.js')?>"></script>
<style>
    .rte_command_insertvideo,.rte_command_insertimage{
        display: none !important;
    }
</style>

<?= $this->endSection() ?>


<?= $this->section('content') ?>


<div class="card">
    <div class="card-body">

        <h5 class="card-title fw-semibold mb-4">
            <i class="ti ti-bookmark"></i> Edit Kurikulum
        </h5>


        <form action="<?= base_url('kurikulum/'.$kurikulum['id'])?>" method="post" enctype="multipart/form-data">

            <div class="form-group mb-2">
                <label class="form-label" for="">Kelas</label>
                <select name="kelas_id" id="" class="form-control" required>
                    <?php foreach($kelas as $k):?>
                        <option value="<?=$k['id']?>" <?= $k['id']==$kurikulum['kelas_id'] ? 'selected' : '' ?>><?=$k['kelas'].' '.$k['jenjang']?></option>
                    <?php endforeach ?>
                </select>
            </div>

            
            <div class="form-group ms-3" id="media">
               <label for="">Pilih Pdf</label>
               <input class="form-control" name='kurikulum' id="kurikulum" type="file" 
                  accept="application/pdf">
            </div>
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
        showFloatImageToolBbar	:true,
    });
</script>

<?= $this->endSection() ?>