<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Sekolah extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_sekolah'  =>"SD Ahmad Yani Surabaya",
                'alamat_sekolah'  =>  "Jl. Gubeng Airlangga III No.41, Airlangga, Kec. Gubeng, Surabaya, Jawa Timur 60286"
            ],
            [
                'nama_sekolah'  =>"SD Rahmat (Plus)",
                'alamat_sekolah'  =>  "Jl. Kembang Kuning No.2, Pakis, Kec. Sawahan, Surabaya, Jawa Timur 60256"
            ],
            [
                'nama_sekolah'  =>"SMP Negeri 10 Surabaya",
                'alamat_sekolah'  =>  "jl. kupang panjaan v no.2 surabaya"
            ],
            [
                'nama_sekolah'  =>"SMP Negeri 11 Surabaya",
                'alamat_sekolah'  =>  "sawah pulo no. 1"
            ],
            [
                'nama_sekolah'  =>"SMA Negeri 1 Surabaya",
                'alamat_sekolah'  =>  "Jl. Wijaya Kusuma No.48, Ketabang, Kec. Genteng, Surabaya, Jawa Timur 60272"
            ],
            [
                'nama_sekolah'  =>"SMA Negeri 2 Surabaya",
                'alamat_sekolah'  =>  "Jl. Wijaya Kusuma No.48, Ketabang, Kec. Genteng, Surabaya, Jawa Timur 60272"
            ],
 
        ];
        $this->db->table('sekolah')->insertBatch($data);
    }
}
