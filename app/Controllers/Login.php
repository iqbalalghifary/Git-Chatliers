<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;


class Login extends BaseController
{
    public function index()
    {
        return view('Login/login');
    }

    public function login()
    {
        $users = new User();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $dataUser = $users->where([
            'email' => $email,
        ])->first();
        if ($dataUser) {
            if (password_verify($password, $dataUser['password'])) {
                // setUserSession($dataUser);
                $data = [
                    'id' => $dataUser['id'],
                    'nama' => $dataUser['nama'],
                    'email' => $dataUser['email'],
                    'no_hp' => $dataUser['no_hp'],
                    'kelas_id' => $dataUser['kelas_id'],
                    'kelas_id' => $dataUser['kelas_id'],
                    'alamat' => $dataUser['alamat'],
                    "role" => $dataUser['role'],
                    "isLoggedIn"=>true
                ];
                session()->set($data);
                
                if($dataUser['role'] == "guru"){
                    return redirect()->to(base_url('buka-kelas'));
                }else{
                    return redirect()->to(base_url('/'));
                }
            } else {
                session()->setFlashdata('error', 'Username & Password Salah');
                return redirect()->to(base_url('/login'));
            }
        } else {
            session()->setFlashdata('error', 'Username & Password Salah');
            return redirect()->to(base_url('/login'));
        }
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}
