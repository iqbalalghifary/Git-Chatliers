<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Quiz extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id'=>1,
                'judul'=>"Quiz 1",
                'soal'=>"5 + 5 = .....",
                'jawaban_benar'=>1,
                'materi_id'=>1
            ],
            [
                'id'=>2,
                'judul'=>"Quiz 2",
                'soal'=>"7 - 5 = .....",
                'jawaban_benar'=>5,
                'materi_id'=>1
            ],
            [
                'id'=>3,
                'judul'=>"Quiz 3",
                'soal'=>"4 - 1 = .....",
                'jawaban_benar'=>9,
                'materi_id'=>1
            ],
            [
                'id'=>4,
                'judul'=>"Quiz 4",
                'soal'=>"10 - 11 = .....",
                'jawaban_benar'=>13,
                'materi_id'=>1
            ],
            [
                'id'=>5,
                'judul'=>"Quiz 4",
                'soal'=>"18 + 31 = .....",
                'jawaban_benar'=>17,
                'materi_id'=>1
            ],
        ];
        $this->db->table('quiz')->insertBatch($data);
    }
}