<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use App\Models\Sekolah;
use App\Models\Kelas;

class Akun extends BaseController
{
    public function index()
    {
        $id = session()->get('id');
        $user =new User();
        $sekolah =new Sekolah();
        $kelas =new Kelas();
        $data['user'] =  $user->find($id);
        $data['sekolah'] = $sekolah->findAll();
        $data['kelas'] = $kelas->findAll();
        return view('Akun/index',$data);
    }

    public function store()
    {
        $id = session()->get('id');
        $user = new User();
        $data = [
            "nama" => $this->request->getPost('nama'),
            "no_hp" => $this->request->getPost('no_hp'),
            "alamat" => $this->request->getPost('alamat'),
        ];

        $user->set($data);
        $user->where('id', $id);
        $user->update();
        
        session()->set($data);

        session()->setFlashData("success", "Berhasil Update data");
        return redirect()->to(base_url('/akun'));
    }
}
