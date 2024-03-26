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

        <h5 class="card-title mt-3 mb-3">Materi </h5>



        <?php foreach($submateri as $no=> $sub):?>

            <?php if($no==0):?>
        <div class="border border-1 border-warning rounded px-3 py-3 mb-1">
            <a href="<?=base_url('pelajaranmateri/'.$sub['id'])?>">
                <h5 class="card-title">
                    <i class="ti ti-chevron-down"></i>
                    <?=$sub['materi']?>
                    <span class="float-end text-end"> [<small><?=$sub['type_materi']?></small>] </span>
                </h5>
            </a>
        </div>
        <?php else:
             ?>
             <?php if($submateri[$no-1]['step'] == null) :?>

        <div class="border border-1 border-warning rounded px-3 py-3 mb-1 bg-light">
            <h5 class="card-title">
                <i class="ti ti-chevron-down"></i>
                <?=$sub['materi']?>

                <span class="float-end text-end"> [<small><?=$sub['type_materi']?></small>] </span>
                <i class="ti ti-key"></i>
            </h5>

        </div>
        <?php else:?>
            <div class="border border-1 border-warning rounded px-3 py-3 mb-1">
            <a href="<?=base_url('pelajaranmateri/'.$sub['id'])?>">
                <h5 class="card-title">
                    <i class="ti ti-chevron-down"></i>
                    <?=$sub['materi']?>
                    <span class="float-end text-end"> [<small><?=$sub['type_materi']?></small>] </span>
                </h5>
            </a>
        </div>
        <?php  endif ?>

        <?php endif ?>


        <?php endforeach ?>


        <h5 class="card-title mt-3 mb-3">Quiz Soal </h5>

        <?php if($quiz != null): ?>
            <p>Selesaikan Materi untuk mengerjakan Quiz</p>
        <div class="border border-1 border-danger rounded px-3 py-3 mb-1 <?= $mystep ? '' : 'bg-light' ?> ">
            <a href="<?= $mystep ? base_url('/pelajaranquiz/'.$materi['id']) : ''?>">
                <h5 class="card-title">
                    <i class="ti ti-chevron-down"></i>
                    Quiz 1
                    <span class="float-end text-end">Pilih Ganda</span>
                    <?= $mystep ?'' : '<i class="ti ti-key"></i>' ?>
                </h5>
            </a>
        </div>
        <?php endif ?>



    </div>
</div>

<?= $this->endSection() ?>