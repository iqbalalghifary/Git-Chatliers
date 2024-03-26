<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>

<div class="card">
    <div s class="card-img-top" style="height:200px; background-image: url('https://content.shopback.com/id/wp-content/uploads/2018/05/31224208/tips-jadi-penulis-pemula.jpg')
        ;background-repeat: repeat-y; background-size: cover;">
        <h3 class="text-white mt-3 ms-3"><?=$materi['nama_materi']?></h3>
        <h6 class="text-white mt-3 ms-3"><?= $materi['kelas'] .' '.$materi['jenjang']?></h6>
    </div>
    <div class="card-body">

        <div class="border border-3 rounded px-3 py-3">
            <h5 class="card-title">Materi Yang akan dipelajari</h5>
            <p class="card-text">
                <?= $materi['deskripsi'] ?>
            </p>



        </div>

        <h5 class="card-title mt-3 mb-3">Materi <a href="<?=base_url('/kurikulummateri/create/'.$materi['id'])?>"
                class="btn btn-sm btn-primary float-end"> <i class="ti ti-plus"></i> Tambah</a> </h5>


        <?php foreach($submateri as $sub):?>

        <div class="border border-1 border-warning rounded px-3 py-3 mb-1">
            <h5 class="card-title">
                <i class="ti ti-chevron-down"></i>
                <?=$sub['materi']?>
                <span class="float-end text-end"> [<small><?=$sub['type_materi']?></small>] 
                <a href="<?=base_url('kurikulummateri/edit/'.$sub['id'])?>" class="btn btn-sm btn-warning"><i class="ti ti-edit"></i> </a> 
                <a href="<?=base_url('kurikulummateri/delete/'.$sub['id'])?>" class="btn btn-sm btn-danger"><i class="ti ti-trash"></i> </a> 
                </span>
            </h5>

        </div>

        <?php endforeach ?>



        <h5 class="card-title mt-3 mb-3">Quiz Soal <a href="<?=base_url('/kurikulumquiz/create/'.$materi['id'])?>"
                class="btn btn-sm btn-primary float-end"> <i class="ti ti-plus"></i> Tambah</a> </h5>


        <?php foreach($quiz as $q):?>
        <div class="border border-1 border-danger rounded px-3 py-3 mb-1">
            <h5 class="card-title">
                <i class="ti ti-chevron-down"></i>
                <?=$q['judul']?>
                <span class="float-end text-end">
                <a href="<?=base_url('kurikulumquiz/edit/'.$q['id'])?>" class="btn btn-sm btn-warning"><i class="ti ti-edit"></i> </a> 
                <a href="<?=base_url('kurikulumquiz/delete/'.$q['id'])?>" class="btn btn-sm btn-danger"><i class="ti ti-trash"></i> </a> 
            </span>
            </h5>

        </div>
        <?php endforeach ?>



    </div>
</div>

<?= $this->endSection() ?>