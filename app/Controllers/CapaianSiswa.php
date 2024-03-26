<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use App\Models\Nilai;

class CapaianSiswa extends BaseController
{
    public function index()
    {
        $user = new User();
        $nilai = new Nilai();
        $user_id = session()->get('id');
        $siswa = $user
        ->select("users.*,exp.exp")
        ->where('users.role','siswa')->where('users.guru_id',$user_id)
        ->orderBy('exp.exp','DESC')
        ->join('exp','exp.user_id = users.id','left')
        ->findAll();
        $data['siswa'] = $siswa;

        foreach($siswa as $n=>$s){
            $data['siswa'][$n]["nilai"]= $nilai->where('user_id',$s['id'])->findAll();
            $nli= $nilai->select("sum(nilai) as total")->where('user_id',$s['id'])->first();
            $data['siswa'][$n]["nilai_total"] = $nli['total'];
            $data['siswa'][$n]["gabungan"] = $nli['total']+$s['exp'];
        }

        $volume = array_column($data["siswa"], 'gabungan');

        array_multisort($volume, SORT_DESC, $data["siswa"]);
        return view('CapaianSiswa/index',$data);
    }

    public function create($id)
    {
        $data['id'] = $id;
        return view('CapaianSiswa/create',$data);
    }

    public function store($id)
    {
        $data = $this->request->getPost();
        $nilai = new Nilai();
        $data['user_id'] = $id;
        $nilai->insert($data);
        session()->setFlashData("success", "Nilai Berhasil dimasukan");
        return redirect()->to(base_url('/capaiansiswa'));
    }
}
