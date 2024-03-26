<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Quiz;
use App\Models\Materi;
use App\Models\Notif;
use App\Models\QuizPilihan;
use App\Models\StepQuiz;
use App\Models\Exp;
class PelajaranQuiz extends BaseController
{
    public function index($id)
    {
        $stepquiz= new StepQuiz();
        $quiz = new Quiz();
        $all_quiz = $quiz->where('materi_id',$id)->findAll();
        $user_id = session()->get('id');
        $user_step = $stepquiz->where('user_id',$user_id)->where('materi_id',$id)->orderBy('id','DESC')->first();
        if($user_step == null){
            $id_quiz = $all_quiz[0]['id'];
            $data['quiz'] = $quiz->withPilihan($id_quiz);
        }else{

            $l = count($all_quiz)-1;
            $ls = $all_quiz[$l];
            if($user_step['quiz_id'] == $ls['id'] ){
                $data['id'] = $id;

                $aq = $quiz->join('step_quiz','step_quiz.quiz_id = quiz.id')
                ->where('step_quiz.user_id',$user_id)
                ->where('step_quiz.materi_id',$id)
                ->findAll();
                $data['benar'] = 0;
                $data['salah'] = 0;
                foreach($aq as $q){
                    if($q['pilihan_id'] == $q['jawaban_benar']){
                        $data['benar'] = $data['benar']+1;
                    }else{
                        $data['salah'] = $data['salah']+1;
                    }
                }

                return  view('PelajaranQuiz/finish',$data);
                die;
            }

            foreach($all_quiz as $i=>$q){
                if($q['id'] == $user_step['quiz_id']){
                    $next =$i+1;
                }
            }
            $ns = $all_quiz[$next];
            $data['quiz'] = $quiz->withPilihan($ns['id']);
        }
        return view('PelajaranQuiz/index',$data);
    }

    public function store($id)
    {
        $data =  $this->request->getPost();
        $user_id = session()->get('id');
        $quiz = new Quiz();
        $exp = new Exp();
        $stepquiz = new StepQuiz();

        $jawab = $quiz->where("id",$data['id'])->first();
        $user_step = $stepquiz->where('user_id',$user_id)
        ->where('quiz_id',$data['id'])->where('materi_id',$id)->first();
        if($user_step == null){
            $stepquiz->insert([
                "user_id"=>$user_id,
                "quiz_id"=>$data['id'],
                "materi_id"=>$id,
                "pilihan_id"=>$data["jawaban"]
            ]);

            $myexp = $exp->where('user_id',$user_id)->first();
            if($jawab['jawaban_benar'] == $data['jawaban'] ){
                $exp->set([ "exp"=>$myexp["exp"] + 1 ])
                ->where('user_id',$user_id)->update();
            }

            $lq = $quiz->where("materi_id",$id)->orderBy("id","DESC")->first();
            if($lq["id"] == $data["id"]){
                $mq = new Materi();
                $nt = new Notif();
                $qz = $mq->where("id",$lq["materi_id"])->first();
                $nt->insert([
                    "user_id"=>$user_id,
                    "notif"=>"Telah Menyelesaikan Materi dan Quiz ".$qz["nama_materi"]
                ]);

            }


        }
        
        return redirect()->to(base_url('/pelajaranquiz/'.$id));
    }
}
