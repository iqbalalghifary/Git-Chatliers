<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>
<link href="https://vjs.zencdn.net/8.3.0/video-js.css" rel="stylesheet" />
<?= $this->endSection()?>

<?= $this->section('content') ?>


<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="modal-materi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Materi Selesai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" onclick="next()" class="btn btn-success">
                <?= $materi['next_materi'] == 'finish' ? 'Finish' : 'Materi Selanjutnya' ?>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h1 class="card-title"><?= $materi['materi'] ?>
            <button onclick="next()" class="float-end btn btn-sm btn-success" id="next-materi" disabled><i class="ti ti-next"></i>
            <?= $materi['next_materi'] == 'finish' ? 'Finish' : 'Materi Selanjutnya' ?>
            </button>
        </h1>
        <p class='border px-4 py-3 mt-3'>
            <?= $materi['deskripsi'] ?>
        </p>
    </div>
</div>

<div class="card">
    <div class="card-body">

        <?php if($materi['type_materi'] == "pdf"):?>
        <div id="pdf-view">
        <iframe src="<?=base_url('media/pdf/'.$materi['isi_materi'])?>" class="w-100" height="650px" id="my-pdf"></iframe>
        </div>
            <?php else: ?>
        <div id="video-view">

            <h6 class="mb-4 text-danger">*Selesaikan video untuk lanjut materi</h6>

            <video id="my-video" class="video-js w-100" controls preload="auto" data-setup="{}">
                <source src="<?=base_url('media/video/'.$materi['isi_materi'])?>" type="video/mp4" />
                <p class="vjs-no-js">

                    <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                </p>
            </video>

        </div>

        <?php endif ?>

    </div>
</div>

<?= $this->endSection() ?>
<?= $this->section('js') ?>
<script src="https://vjs.zencdn.net/8.3.0/video.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js" integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(() => {
   
        <?php if($materi['type_materi'] == "video"):?>
            videoPlayer()
        <?php else: ?>
            nextStep()
        <?php endif ?>
        
    })

    const nextStep = async ()=>{
        var bodyFormData = new FormData();
        bodyFormData.append('materi_id', <?= $materi['materi_id'] ?>);
        bodyFormData.append('sub_materi_id', <?= $materi['id'] ?>);
        await axios.post("<?= base_url('pelajaranstep') ?>",bodyFormData)
        .then(res=>{
            console.log(res.data)
            $("#next-materi").prop('disabled',false)
        })
    }

    const next = ()=>{
        let next_url = "<?= $materi['next_materi'] == 'finish' ? base_url('pelajaran/'.$materi['materi_id']) : base_url('pelajaranmateri/'.$materi['next_materi'])  ?>"
        window.location.href = next_url;
    }

    const videoPlayer = () => {
        let player = videojs('my-video');

        player.on('ended', function () {
            nextStep()
            $("#modal-materi").modal('show')
        });
    }
</script>
<?= $this->endSection() ?>