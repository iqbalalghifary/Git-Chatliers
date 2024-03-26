<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>




<h5 class="card-title fw-semibold mb-4">
    <i class="ti ti-bookmark"></i> Kurikulum
    <a href="<?=base_url('kurikulum/create')?>" class="btn btn-sm btn-primary float-end"> <i class="ti ti-plus"></i>
        Buat Baru</a>
</h5>

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
            role="tab" aria-controls="home" aria-selected="true">Kurikulum Saya</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
            role="tab" aria-controls="profile" aria-selected="false">Semua Kurikulum</button>
    </li>

</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active py-3" id="home" role="tabpanel" aria-labelledby="home-tab">

    <div class="row">
            <?php foreach($kurikulum_saya as $k):?>
            <div class="col-sm-11  col-md-11 mx-auto">
                <div class="card overflow-hidden rounded-2">
                    <div class="card-header bg-success">
                        <h5 class="card-title text-white"><?= $k['kelas'].' '.$k['jenjang'] ?>
                    

                        <button class="btn btn-primary btn-sm float-end ms-3" type="button" data-bs-toggle="collapse" 
                        data-bs-target="#kurikulum-<?=$k['id']?>" aria-expanded="false" aria-controls="kurikulum-<?=$k['id']?>">
                            <i class="ti ti-arrow-down"></i>
                        </button>

                        <a href="<?=base_url('kurikulum/'.$k['id'])?>" class="btn btn-sm btn-warning float-end">
                            <i class="ti ti-edit"></i>
                        </a>

                        </h5>
                    </div>
                    <div class="card-body pt-3 p-4 collapse" id="kurikulum-<?=$k['id']?>">

                        <embed type="application/pdf" src="<?= base_url("media/kurikulum/".$k["kurikulum"]) ?>" width="100%" height="600"></embed>


                    </div>
                </div>
            </div>
            <?php endforeach ?>


        </div>

    </div>
    <div class="tab-pane fade py-3" id="profile" role="tabpanel" aria-labelledby="profile-tab">

        <div class="row">
            <?php foreach($kurikulum as $k):?>
            <div class="col-sm-11  col-md-11 mx-auto">
                <div class="card overflow-hidden rounded-2">
                    <div class="card-header bg-success">
                        <h5 class="card-title text-white"><?= $k['kelas'].' '.$k['jenjang'] ?>

                        <button class="btn btn-primary btn-sm float-end ms-3" type="button" data-bs-toggle="collapse" 
                        data-bs-target="#kurikulumall-<?=$k['id']?>" aria-expanded="false" aria-controls="kurikulumall-<?=$k['id']?>">
                            <i class="ti ti-arrow-down"></i>
                        </button>

                        <span class="float-end text-white"><?=$k['nama']?></span>
                        
                        </h5>
                    </div>
                    <div class="card-body pt-3 p-4 collapse" id="kurikulumall-<?=$k['id']?>">

                        
                        <embed type="application/pdf" src="<?= base_url("media/kurikulum/".$k["kurikulum"]) ?>" width="100%" height="600"></embed>

                    </div>
                </div>
            </div>
            <?php endforeach ?>


        </div>

    </div>
</div>




<?= $this->endSection() ?>