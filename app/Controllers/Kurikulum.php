<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kelas;
use App\Models\Kurikulum as KurikulumModel;

class Kurikulum extends BaseController
{
    public function index()
    {
        $kurikulum =new KurikulumModel();
        $data['kurikulum'] = $kurikulum->join('users','users.id = kurikulum.user_id')->join('kelas','kelas.id = kurikulum.kelas_id')->findAll();
        $data['kurikulum_saya'] = $kurikulum->select("kurikulum.*,users.nama,kelas.kelas,kelas.jenjang")
        ->join('users','users.id = kurikulum.user_id')
        ->join('kelas','kelas.id = kurikulum.kelas_id')
        ->where("kurikulum.user_id",session()->get('id'))
        ->findAll();
        return view("Kurikulum/index",$data);
    }

    public function create()
    {   
        $kelas = new Kelas();

        $data['kelas'] = $kelas->findAll();

        return view("Kurikulum/create",$data);
    }

    public function edit($id)
    {   
        $kelas = new Kelas();

        $kelas = new Kelas();
        $kurikulum= new KurikulumModel();
        $data['kelas'] = $kelas->findAll();
        $data['kurikulum'] = $kurikulum->find($id);
        return view("Kurikulum/edit",$data);    
    }

    public function store()
    {
        $kurikulum =new KurikulumModel();
        $data = $this->request->getPost();
        $data["user_id"]=session()->get('id');
        $cek = $kurikulum->where('user_id', session()->get('id'))->where("kelas_id",$data["kelas_id"])->findAll();
        if($cek){
            session()->setFlashData("error", "Kurikulum Kelas Ini Sudah dibuat silahkan buat kurikulum kelas lain");
            return redirect()->to(base_url('/kurikulum/create'));
        }

        $kurikulumfile = $this->request->getFile('kurikulum');
        if($kurikulumfile->isValid()){
            $fileName = $kurikulumfile->getRandomName();
            $kurikulumfile->move('media/kurikulum', $fileName);
            $data["kurikulum"] = $fileName;
        }

        $kurikulum->insert($data);
         session()->setFlashData("success", "Kurikulum Berhasil dibuat");
        return redirect()->to(base_url('/kurikulum'));
    }

    public function update($id)
    {   
        $kurikulum =new KurikulumModel();
        $data = $this->request->getPost();
        $kurikulumfile = $this->request->getFile('kurikulum');
        if($kurikulumfile->isValid()){
            $fileName = $kurikulumfile->getRandomName();
            $kurikulumfile->move('media/kurikulum', $fileName);
            $data["kurikulum"] = $fileName;
        }
        $kurikulum->set($data)->where('id',$id)->update();
        session()->setFlashData("success", "Kurikulum Berhasil diedit");
        return redirect()->to(base_url('/kurikulum'));
    }
}
