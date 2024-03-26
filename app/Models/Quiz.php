<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\QuizPilihan;

class Quiz extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'quiz';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'jawaban_benar',
        'judul',
        'soal',
        'materi_id'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function withPilihan($id)
    {
        $data = $this->where('id',$id)->first();
        $pilihan = new QuizPilihan();
        $pilihan = $pilihan->where('quiz_id',$id)->orderBy('rand()')->findAll();
        $data['pilihan_ganda'] = $pilihan;
        return $data;
    }


}
