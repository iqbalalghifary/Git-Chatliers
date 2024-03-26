<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Materi extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id'=>1,
                'nama_materi'  =>  "Belajar Berhitung",
                'deskripsi'  =>  "Belajar Berhitung Bersama",
                'user_id'=>1,
                'kelas_id'=>1,
                'mapel_id'=>1
            ],
        ];
        $this->db->table('materi')->insertBatch($data);
    }
}
