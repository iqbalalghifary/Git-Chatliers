<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>

<?= $this->include('Msg/alert') ?>

<div class="card">
   <div class="card-body">

      <h5 class="card-title fw-semibold mb-4">
         <i class="ti ti-bookmark"></i> Buat Materi
      </h5>


      <form action="<?= base_url('kurikulummateri')?>" method="post" enctype="multipart/form-data">

         <div class="form-group mb-2">
            <label class="form-label" for="">Judul</label>
            <input type="text" class="form-control" name="materi" required>
         </div>


         <div class="form-group mb-2">
            <label class="form-label" for="">Deskripsi </label>
            <textarea name="deskripsi" class="form-control" rows="10"></textarea>
         </div>

         <label for="" class="form-label">Pilih Video / Pdf</label>
         <div class="input-group border">
            <div class="input-group-text">
               <select name="type_materi" id="selectmedia" class="form-control ">
                  <option value="pdf">Pdf</option>
                  <option value="video">Video</option>
               </select>
            </div>

            <div class="form-group ms-3" id="media">
               <label for="">Pilih Pdf</label>
               <input class="form-control" onchange="getNumPages()" name='isi_materi' id="f-pdf" type="file" required
                  accept="application/pdf">
            </div>

            <input type="text" class='d-none' name='durasi' id='duration'>
            <input type="text" class='d-none'  value="<?= $materi_id ?>" name='materi_id'>

         </div>



         <button class="btn btn-primary float-end mt-5" type="submit">Simpan</button>

      </form>

   </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.min.js" integrity="sha512-Z8CqofpIcnJN80feS2uccz+pXWgZzeKxDsDNMD/dJ6997/LSRY+W4NmEt9acwR+Gt9OHN0kkI1CTianCwoqcjQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>

const loadVideo = file => new Promise((resolve, reject) => {
    try {
        let video = document.createElement('video')
        video.preload = 'metadata'

        video.onloadedmetadata = function () {
            resolve(this)
        }

        video.onerror = function () {
            reject("Invalid video. Please select a video file.")
        }

        video.src = window.URL.createObjectURL(file)
    } catch (e) {
        reject(e)
    }
})

let duration_video =async ()=>{
   let v = document.getElementById("f-video").files[0]
   let video = await loadVideo(v)
   let duration = Math.round(video.duration)
   console.log(duration)
   $("#duration").val(duration)
}




const getNumPages =async () => {
  let input = document.getElementById("f-pdf");
let reader = new FileReader();
reader.readAsBinaryString(input.files[0]);
reader.onloadend = function(){
   let count = reader.result.match(/\/Type[\s]*\/Page[^s]/g).length;
    console.log('Number of Pages:',count );
   $("#duration").val(count)
}
}


   $("#selectmedia").on('change', () => {
      let media = $("#selectmedia").val()
      $("#media").empty()
      if (media == "pdf") {
         $("#media").append(`
            <label for="">Pilih Pdf</label>
            <input class="form-control" onchange="getNumPages()" id="f-pdf" name='isi_materi' type="file" required accept="application/pdf">
            `)
      } else {
         $("#media").append(`
            <label for="">Pilih Video(mp4)</label>
            <input class="form-control" onchange="duration_video()"  id="f-video" name='isi_materi' type="file" required  accept="video/mp4">
            `)
      }
   })




</script>
<?= $this->endSection() ?>