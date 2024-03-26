<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class Capaian extends BaseController
{
    public function index()
    {

        $user = new User();
        $data['capaian'] = $user->select('users.nama, exp.*')->where('users.role','siswa')->join('exp','exp.user_id = users.id','left')
        ->orderBy('exp.exp','DESC')
        ->findAll();
        return view('Capaian/index',$data);
    }
}
