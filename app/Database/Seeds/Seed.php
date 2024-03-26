<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Seed extends Seeder
{
    public function run()
    {
        $this->call('Kelas');
        $this->call('Sekolah');
        $this->call('Mapel');
        $this->call('Guru');
        $this->call('Materi');
        $this->call('SubMateri');
        $this->call('Quiz');
        $this->call('QuizPilihan');
        $this->call('Kurikulum');

    }
}
