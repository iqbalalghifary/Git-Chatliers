<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>

<h5 class="card-title fw-semibold mb-4">
    <i class="ti ti-bookmark"></i> Materi Kurikulum
    <a href="<?=base_url('materikurikulum/create')?>" class="btn btn-sm btn-primary float-end"> <i
            class="ti ti-plus"></i> Buat Baru</a>
</h5>

<div class="materi mb-5">

    <a href="<?= base_url('materikurikulum?mapel=1') ?>" type="button" class="btn btn-outline-warning m-1">
        <i class="ti ti-book"></i>
        <span>Matematika</span>
</a>

    <a href="<?= base_url('materikurikulum?mapel=2') ?>" type="button" class="btn btn-outline-success m-1">
        <i class="ti ti-book"></i>
        <span>Sains</span>
</a>

    <a href="<?= base_url('materikurikulum?mapel=3') ?>" type="button" class="btn btn-outline-danger m-1">
        <i class="ti ti-book"></i>
        <span>Bahasa</span>
</a>

    <a href="<?= base_url('materikurikulum?mapel=4') ?>" type="button" class="btn btn-outline-secondary m-1">
        <i class="ti ti-book"></i>
        <span>Sejarah</span>
</a>

    <a href="<?= base_url('materikurikulum?mapel=6') ?>" type="button" class="btn btn-outline-info m-1">
        <i class="ti ti-book"></i>
        <span>Umum</span>
</a>

<a href="<?= base_url('materikurikulum') ?>" type="button" class="btn btn-outline-success m-1">
        <i class="ti ti-book"></i>
        <span>All</span>
</a>



</div>

<div class="row">
    <?php foreach($materi as $m):?>
    <div class="col-sm-6 col-md-4 col-xl-3">
        <div class="card overflow-hidden rounded-2">
            <div class="position-relative">
                <a href="<?= base_url('/materikurikulum/'.$m['id']) ?>"><img
                        src="<?=base_url('media/sampul/'.$m['sampul'])?>" class="card-img-top rounded-0" height="260px"
                        alt="..."></a>
                <a href="<?=base_url('/materikurikulum/edit/'.$m['id'])?>"
                    class="bg-white rounded-circle p-2 text-black d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3 border"><i
                        class="ti ti-edit text-warning fs-4"></i></a> </div>
            <div class="card-body pt-3 p-4">


                <a href="<?= base_url('/materikurikulum/'.$m['id']) ?>">
                    <small><i class="ti ti-users"></i> Student <span
                            class="float-end"><?=$m['kelas'].' '.$m['jenjang']?></span></small>
                    <h6 class="fw-semibold fs-4 mb-3 mt-1"><?= $m['nama_materi'] ?></h6>
                    <div class="d-flex align-items-center justify-content-between mb-0">

                        <h6 class="fw-semibold fs-4 mb-0">
                            <img src="<?php echo base_url('/template//images/profile/user-1.jpg')?>" alt="" width="22"
                                height="22" class="rounded-circle">

                            <span class="ms-2 fw-normal fs-3"><?=$m['nama']?></span>
                        </h6>

                    </div>
                </a>

            </div>
        </div>
    </div>
    <?php endforeach ?>


</div>


<?= $this->endSection() ?>