<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Mapel extends Seeder
{
    public function run()
    {
        $data = [
            [
                'mapel'  =>  "MATEMATIKA"
            ],
            [
                'mapel'  =>  "SAINS"
            ],
            [
                'mapel'  =>  "BAHASA"
            ],
            [
                'mapel'  =>  "SEJARAH"
            ],
            [
                'mapel'  =>  "SENI"
            ],
            [
                'mapel'  =>  "UMUM"
            ],
 
        ];
        $this->db->table('mapel')->insertBatch($data);
    }
}
