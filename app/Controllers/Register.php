<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Sekolah;
use App\Models\Kelas;
use App\Models\User;

class Register extends BaseController
{
    public function index()
    {
        $sekolah = new Sekolah();
        $kelas = new Kelas();
        $user= new User();
        $data=[
            "sekolah"=>$sekolah->findAll(),
            "kelas"=>$kelas->findAll(),
        ];

        foreach($data["sekolah"] as $i=>$sekolah){
            $data["sekolah"][$i]["guru"]=$user->where('sekolah_id',$sekolah['id'])->findAll();
        }
        return view('Login/register',$data);
    }

    public function post()
    {
        // lakukan validasi
        $rules = [
            'nama' => 'required',
            'email'=>'required|valid_email|is_unique[users.email,id,{id}]',
            'password'=>'required',
            'kelas_id'=>'required',
            'sekolah_id'=>'required',
            'alamat'=>'required',
            'no_hp'=>'required',
        ];
        // jika data valid, simpan ke database
        if($this->validate($rules)){
            $user = new User();
            $user->insert([
                "nama" => $this->request->getPost('nama'),
                "email" => $this->request->getPost('email'),
                "password" =>password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                "no_hp" => $this->request->getPost('no_hp'),
                "kelas_id" => $this->request->getPost('kelas_id'),
                "alamat" => $this->request->getPost('alamat'),
                "sekolah_id" => $this->request->getPost('sekolah_id'),
                "guru_id" => $this->request->getPost('guru_id'),
                "role" =>'siswa',
            ]);
            session()->setFlashData("success", "Berhasil Mendaftar Silahkan Login");
            return redirect()->to(base_url('login'));
        }
		
        session()->setFlashData("failed", "Gagal Mendaftar Email Sudah digunakan!");
        return redirect()->to(base_url('register'));
    }
}
