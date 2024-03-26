<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class QuizPilihan extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id'=>1,
                'pilihan'=>"10",
                "quiz_id"=>1
            ],
            [
                'id'=>2,
                'pilihan'=>"15",
                "quiz_id"=>1
            ],
            [
                'id'=>3,
                'pilihan'=>"7",
                "quiz_id"=>1
            ],
            [
                'id'=>4,
                'pilihan'=>"16",
                "quiz_id"=>1
            ],

            [
                'id'=>5,
                'pilihan'=>"2",
                "quiz_id"=>2
            ],
            [
                'id'=>6,
                'pilihan'=>"3",
                "quiz_id"=>2
            ],
            [
                'id'=>7,
                'pilihan'=>"5",
                "quiz_id"=>2
            ],
            [
                'id'=>8,
                'pilihan'=>"1",
                "quiz_id"=>2
            ],


            [
                'id'=>9,
                'pilihan'=>"3",
                "quiz_id"=>3
            ],
            [
                'id'=>10,
                'pilihan'=>"6",
                "quiz_id"=>3
            ],
            [
                'id'=>11,
                'pilihan'=>"5",
                "quiz_id"=>3
            ],
            [
                'id'=>12,
                'pilihan'=>"7",
                "quiz_id"=>3
            ],

            [
                'id'=>13,
                'pilihan'=>"1",
                "quiz_id"=>4
            ],
            [
                'id'=>14,
                'pilihan'=>"5",
                "quiz_id"=>4
            ],
            [
                'id'=>15,
                'pilihan'=>"2",
                "quiz_id"=>4
            ],
            [
                'id'=>16,
                'pilihan'=>"3",
                "quiz_id"=>4
            ],
            [
                'id'=>17,
                'pilihan'=>"49",
                "quiz_id"=>5
            ],
            [
                'id'=>18,
                'pilihan'=>"37",
                "quiz_id"=>5
            ],
            [
                'id'=>19,
                'pilihan'=>"59",
                "quiz_id"=>5
            ],
            [
                'id'=>20,
                'pilihan'=>"47",
                "quiz_id"=>5
            ],
        ];
        $this->db->table('quiz_pilihan')->insertBatch($data);
    }
}