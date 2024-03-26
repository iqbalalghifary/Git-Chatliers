<?php

namespace App\Controllers;
use App\Models\Materi;
use App\Models\User;
class Home extends BaseController
{
    public function index()
    {
        $mapel = $this->request->getVar('mapel');

        $materi = new Materi();
        $user = new User();
        $data['learns'] = $materi->select("materi.*,users.nama as guru")->join('users','users.id = materi.user_id')->findAll();
        if($mapel){
            $data['learns'] = $materi->select("materi.*,users.nama as guru")
            ->where("materi.mapel_id",$mapel)
            ->join('users','users.id = materi.user_id')->findAll();
        }
        
        foreach($data['learns'] as $i=>$siswa){
            $jumlah = $user->select('users.id')
            ->join('materi','materi.id = materi.user_id')
            ->where('users.role','siswa')
            ->where('users.guru_id',$siswa['user_id'])
            ->countAllResults();
            $data['learns'][$i]['jumlah_siswa']= $jumlah;
        }

    
        return view('Dashboard/index',$data);
    }
}
