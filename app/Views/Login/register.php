<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Learnify</title>
    <link rel="stylesheet" href="<?= base_url('template/css/styles.min.css')?>" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-4">
                    <?php
                            if(session()->getFlashData('failed')){
                            ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= session()->getFlashData('failed') ?>
                        </div>
                        <?php }?>
                        <div class="card mt-3 mb-5">
                            <div class="card-body">
                                <a href="#" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <h2 class="text-primary">LEARNIFY</h2>
                                </a>
                                <p class="text-center">Belajar Online</p>
                                <form action="<?= base_url('register') ?>" method='post'>
                                    <div class="mb-3">
                                        <label class="form-label">Nama</label>
                                        <input type="text" class="form-control" name='nama' required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">No Hp</label>
                                        <input type="text" class="form-control"  name='no_hp' required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Alamat</label>
                                        <textarea name="alamat" required  class="form-control"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Kelas</label>
                                        <select name="kelas_id" class="form-control">
                                            <?php foreach($kelas as $kel): ?>
                                                <option value="<?= $kel['id'] ?>"><?= $kel['kelas'].' ('.$kel['jenjang'].')' ?></option>
                                           <?php endforeach ?>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Sekolah</label>
                                        <select name="sekolah_id" class="form-control">
                                            <?php foreach($sekolah as $sek): ?>
                                                <option value="<?= $sek['id'] ?>"><?= $sek['nama_sekolah'] ?></option>
                                           <?php endforeach ?>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Guru</label>
                                        <select name="guru_id" class="form-control" required>
                                           <option value="" selected disabled>Tidak Ada Guru</option>
                                        </select>
                                    </div>

                                 

                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email</label>
                                        <input type="email" class="form-control" name='email' required id="exampleInputEmail1"
                                            aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" name='password' required class="form-control" id="exampleInputPassword1">
                                    </div>
                                    
                                    <button type='submit' class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Register</button>

                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-bold">Sudah Punya Akun?</p>
                                        <a class="text-primary fw-bold ms-2"
                                            href="<?= base_url('login')?>">Masuk</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url('template/libs/jquery/dist/jquery.min.js')?>"></script>
    <script src="<?= base_url('template/libs/bootstrap/dist/js/bootstrap.bundle.min.js')?>"></script>
    <script>
        var guru = <?= json_encode($sekolah)?>

        $(document).ready(()=>{
            cek_guru()
        })

        const cek_guru = ()=>{
               let sekolah = $("[name='sekolah_id']").val();
               let s =guru.find(el => el.id == sekolah);
               $("[name='guru_id']").empty()
               if(s.guru.length == 0){
                $("[name='guru_id']").append(`  <option value="" selected disabled>Tidak Ada Guru</option>`)
               }else{
                    s.guru.forEach(gr=>{
                            $("[name='guru_id']").append(`  <option value="${gr.id}">${gr.nama}</option>`)
                    })
               }
        }

        $("[name='sekolah_id']").on('change',cek_guru)


    </script>
</body>

</html>