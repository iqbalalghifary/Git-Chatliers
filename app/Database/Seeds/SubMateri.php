<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SubMateri extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id'=>1,
                'materi'=>"Materi 1 Belajar Penjumlahan",
                "deskripsi"=>"Pada materi ini siswa mampu menjumlahkan bilangan",
                "isi_materi"=>"sample.pdf",
                "type_materi"=>"pdf",
                "durasi"=>2,
                "materi_id"=>1
            ],
            [
                'id'=>2,
                'materi'=>"Materi 2 Belajar Pengurangan",
                "deskripsi"=>"Pada materi ini siswa mampu menjumlahkan bilangan",
                "isi_materi"=>"sample1.mp4",
                "type_materi"=>"video",
                "durasi"=>2,
                "materi_id"=>1
            ],
        ];
        $this->db->table('sub_materi')->insertBatch($data);
    }
}
