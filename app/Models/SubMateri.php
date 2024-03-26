<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\Step;

class SubMateri extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'sub_materi';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'isi_materi',
        'materi',
        'deskripsi',
        'materi_id',
        'user_id',
        'type_materi',
        'durasi',
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

    public function withStep($id)
    {
        $data = $this->select('sub_materi.*')->join('materi','materi.id = sub_materi.materi_id')
        ->where('sub_materi.materi_id',$id)
        ->findAll();
        $step = new Step();
        $user_id = session()->get('id');
        foreach($data as $i=> $d){
            $s = $step->where('sub_materi_id',$d['id'])->where('user_id',$user_id)->first();
            $data[$i]["step"] = $s;
        }
        return $data;
    }
}
