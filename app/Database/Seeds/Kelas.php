<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Kelas extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kelas'  =>1,
                'jenjang'  =>  "SD/MI"
            ],
            [
                'kelas'  =>2,
                'jenjang'  =>  "SD/MI"
            ],
            [
                'kelas'  =>3,
                'jenjang'  =>  "SD/MI"
            ],
            [
                'kelas'  =>4,
                'jenjang'  =>  "SD/MI"
            ],
            [
                'kelas'  =>5,
                'jenjang'  =>  "SD/MI"
            ],
            [
                'kelas'  =>6,
                'jenjang'  =>  "SD/MI"
            ],
            [
                'kelas'  =>7,
                'jenjang'  =>  "SMP"
            ],
            [
                'kelas'  =>8,
                'jenjang'  =>  "SMP"
            ],
            [
                'kelas'  =>9,
                'jenjang'  =>  "SMP"
            ],
            [
                'kelas'  =>10,
                'jenjang'  =>  "SMA"
            ],
            [
                'kelas'  =>11,
                'jenjang'  =>  "SMA"
            ],
            [
                'kelas'  =>12,
                'jenjang'  =>  "SMA"
            ],
 
        ];
        $this->db->table('kelas')->insertBatch($data);
    }
}
