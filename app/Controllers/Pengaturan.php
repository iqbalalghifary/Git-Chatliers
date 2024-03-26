<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class Pengaturan extends BaseController
{
    public function index()
    {
        return view('Pengaturan/index');
    }

    public function store()
    {
        $id = session()->get('id');
        $user = new User();
        $data = [
            "password" => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];

        $user->set($data);
        $user->where('id', $id);
        $user->update();
        

        session()->setFlashData("success", "Berhasil Update password");
        return redirect()->to(base_url('/pengaturan'));
    }
}
