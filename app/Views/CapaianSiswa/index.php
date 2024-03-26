<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>
<h5 class="card-title fw-semibold mb-4">
  <i class="ti ti-bookmark"></i> Hasil Capaian Siswa
</h5>

<div class="card w-100">
  <div class="card-body p-4">
    <div class="table-responsive">
      <table class="table text-nowrap mb-0 align-middle">
        <thead class="text-dark fs-4">
          <tr>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">No</h6>
            </th>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Nama</h6>
            </th>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Skor Learn & Quiz</h6>
            </th>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Nilai</h6>
            </th>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Rank</h6>
            </th>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Add</h6>
            </th>

          </tr>
        </thead>
        <tbody>

        <?php foreach($siswa as $no=>$capaian): ?>
          <tr>
            <td class="border-bottom-0">
              <h6 class="fw-semibold mb-0"><?= $no+1 ?></h6>
            </td>
            <td class="border-bottom-0">
              <h6 class="fw-semibold mb-1"><?= $capaian['nama'] ?></h6>
            </td>
            <td class="border-bottom-0">
              <p class="mb-0 fw-normal"><?= $capaian['exp'] == null ? 0 : $capaian['exp'] ?> Exp</p>
            </td>
            <td class="border-bottom-0">
              <div class=" align-items-center ">

              <?php foreach($capaian['nilai'] as $n):?>

              <p class="mb-0 fw-normal">
                  <?= $n['mata_pelajaran'] . ' : '.$n['nilai'] ?>
                </p>
                <?php endforeach ?>
                
              </div>
            </td>
            <td class="border-bottom-0">
              <?= $no+1 ?>
            </td>
            <td class="border-bottom-0">
              <a href="<?= base_url('capaiansiswa/'.$capaian['id']) ?>" class="btn btn-primary btn-sm">
                InsertNilai
              </a>
            </td>
          </tr>
          <?php endforeach ?>

        </tbody>
      </table>
    </div>
  </div>
</div>

<?= $this->endSection() ?>