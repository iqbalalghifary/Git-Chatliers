<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Kurikulum extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id'=>1,
                'kurikulum'  =>  "sample.pdf",
                'user_id'=>1,
                'kelas_id'=>1,
            ],
        ];
        $this->db->table('kurikulum')->insertBatch($data);
    }
}
