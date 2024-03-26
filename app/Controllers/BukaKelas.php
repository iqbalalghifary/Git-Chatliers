<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kelas;

class BukaKelas extends BaseController
{
    public function index()
    {
        $kelas = new Kelas();
        $data=[
            "kelas"=>$kelas->findAll(),
        ];
       
        return redirect()->to(base_url('materikurikulum'));
        // return view('BukaKelas/index',$data);
    }
}
