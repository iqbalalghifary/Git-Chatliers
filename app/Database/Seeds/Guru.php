<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Guru extends Seeder
{
        public function run()
        {
            $data = [
                [
                    'id'=>1,
                    'nama'  =>  "Madim Nakarim",
                    'email'=>"guru@gmail.com",
                    'password'=>password_hash("12345", PASSWORD_DEFAULT),
                    'role'=>"guru",
                    'no_hp'=>"083009542987",
                    'alamat'=>"JLn Lingkar Surabaya no 67 Surabaya",
                    'sekolah_id'=>1,
                    'kelas_id'=>NULL,
                    'guru_id'=>NULL
                ],
                [
                    'id'=>2,
                    'nama'  =>  "Budi Santoso",
                    'email'=>"budi@gmail.com",
                    'password'=>password_hash("12345", PASSWORD_DEFAULT),
                    'role'=>"siswa",
                    'no_hp'=>"081551984721",
                    'alamat'=>"JLn Lingkar Surabaya no 67 Surabaya",
                    'sekolah_id'=>1,
                    'kelas_id'=>1,
                    'guru_id'=>1
                ],
     
            ];
            $this->db->table('users')->insertBatch($data);
        }
    }
    