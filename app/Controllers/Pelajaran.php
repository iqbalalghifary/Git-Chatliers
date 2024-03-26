<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Quiz;
use App\Models\Materi;
use App\Models\SubMateri;
use App\Models\Step;
use App\Models\Exp;

class Pelajaran extends BaseController
{
    public function index($id)
    {
        $user_id = session()->get('id');
        $materi = new Materi();
        $quiz= new Quiz();
        $step= new Step();
        $submateri = new SubMateri();

        $data['materi']=$materi->select('materi.*,kelas.kelas,kelas.jenjang')->where('materi.id',$id)->join('kelas','kelas.id = materi.kelas_id')->first();
        $data['submateri']= $submateri->withStep($id);

        
        $data['quiz']=$quiz->where('materi_id',$id)->findAll();
        $data['step']=$step->where('materi_id',$id)->where('user_id',$user_id)->orderBy('id', 'DESC')->first();
        $mystep = false;
        if($data['step'] !=null){
            $sm = count($data['submateri']);
            $sub =$data["submateri"][$sm-1];
            $mystep = $data['step']['sub_materi_id'] == $sub['id'] ? true :false;
        }
        $data['mystep'] = $mystep;
        // dd($data['submateri']);
        return view('Pelajaran/index',$data);
    }

    public function step()
    {
        $step = new Step();
        $xp = new Exp();
        $id_user = session()->get('id');
        $myexp = $xp->where('user_id',$id_user)->first();
        if($myexp == null){
            $xp->insert([
                'exp'=>0,
                'user_id'=>$id_user
            ]);
        }
        $data =  $this->request->getPost();
        $cek_step = $step->where("materi_id",$data['materi_id'])
        ->where('sub_materi_id',$data['sub_materi_id'])->where('user_id',$id_user)->first();
        $data['user_id'] = $id_user;
        if($cek_step == null){
            $myexp = $xp->where('user_id',$id_user)->first();
            $step->insert($data);
            $xp->set([ "exp"=>$myexp["exp"] + 1 ])
            ->where('user_id',$id_user)->update();
        }
        echo json_encode( $cek_step );
    }
}
