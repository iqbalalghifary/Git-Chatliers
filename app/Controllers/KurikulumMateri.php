<?php
namespace App\Controllers;
helper('text');

use App\Controllers\BaseController;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Materi;
use App\Models\SubMateri;
use App\Models\Step;
use App\Models\StepQuiz;
use App\Models\Quiz;
use App\Models\QuizPilihan;

class KurikulumMateri extends BaseController
{
    public function index()
    {
        $mapel = $this->request->getVar('mapel');

        $materi= new Materi();
        $data['materi']=$materi->select('materi.*,users.nama,kelas.kelas,kelas.jenjang')
        ->join('kelas','kelas.id = materi.kelas_id')
        ->join('users','users.id = materi.user_id')->findAll();

        if($mapel){
            $data['materi']=$materi->select('materi.*,users.nama,kelas.kelas,kelas.jenjang')
            ->join('kelas','kelas.id = materi.kelas_id')
            ->join('users','users.id = materi.user_id')
            ->where('materi.mapel_id',$mapel)
            ->findAll();
        }

        return view('KurikulumMateri/index',$data);
    }
    public function create()
    {
        $kelas = new Kelas();
        $mapel= new Mapel();
        $data['kelas']=$kelas->findAll();
        $data['mapel']=$mapel->findAll();
        return view('KurikulumMateri/create',$data);
    }

    public function edit($id)
    {
        $kelas = new Kelas();
        $mapel= new Mapel();
        $materi= new Materi();
        $data['kelas']=$kelas->findAll();
        $data['mapel']=$mapel->findAll();
        $data['materi']=$materi->find($id);
        return view('KurikulumMateri/edit',$data);
    }


    public function store()
    {
        $data =  $this->request->getPost();
        $sampul = $this->request->getFile('sampul');
        if($sampul->isValid()){
            $fileName = $sampul->getRandomName();
            $sampul->move('media/sampul', $fileName);
            $data["sampul"] = $fileName;
        }
        $data['user_id']=session()->get('id');
        $materi = new Materi();
        $materi->insert($data);
        session()->setFlashData("success", "Materi Berhasil dibuat");
        return redirect()->to(base_url('/materikurikulum'));
    }

    public function update($id)
    {   
        $data =  $this->request->getPost();
        $sampul = $this->request->getFile('sampul');
        if($sampul->isValid()){
            $fileName = $sampul->getRandomName();
            $sampul->move('media/sampul', $fileName);
            $data["sampul"] = $fileName;
        }
        $materi = new Materi();
        $materi->where('id',$id)->set($data)->update();
        session()->setFlashData("success", "Materi Berhasil diupdate");
        return redirect()->to(base_url('/materikurikulum'));
    }

    public function view($id)
    {
        $id_guru = session()->get('id');
        $materi = new Materi();
        $quiz= new Quiz();
        $submateri = new SubMateri();
        $data['materi']=$materi->select('materi.*,kelas.kelas,kelas.jenjang')->where('materi.id',$id)->join('kelas','kelas.id = materi.kelas_id')->first();
        $data['submateri']=$submateri->select('sub_materi.*')->join('materi','materi.id = sub_materi.materi_id')
        ->where('sub_materi.materi_id',$id)->findAll();
        $data['quiz']=$quiz->where('materi_id',$id)->findAll();
        return view('KurikulumMateri/view',$data);
    }


    public function create_materi($id)
    {
        $data['materi_id'] = $id;
        return view('KurikulumMateri/create_materi',$data);
    }

    public function edit_materi($id)
    {
        $materi = new SubMateri();
        $data['materi'] = $materi->find($id);
        return view('KurikulumMateri/edit_materi',$data);
    }



    public function store_materi()
    {
        $data =  $this->request->getPost();
        $media_materi = $this->request->getFile('isi_materi');
        $fileName = $media_materi->getRandomName();
        if($data['type_materi']=='video'){
            $media_materi->move('media/video', $fileName);
        }else{
            $media_materi->move('media/pdf', $fileName);
        }
        $data["isi_materi"] = $fileName;
        $submateri = new SubMateri();
        $submateri->insert($data);
        session()->setFlashData("success", "Materi Berhasil dibuat");
        return redirect()->to(base_url('/materikurikulum/'.$data['materi_id']));
    }

    public function create_quiz($id)
    {
        $data['materi_id'] = $id;
        return view('KurikulumMateri/create_quiz',$data);
    }

    public function update_materi($id)
    {
        $reqdata =  $this->request->getPost();
        $data["materi"] = $reqdata['materi'];
        $data["deskripsi"] = $reqdata['deskripsi'];
        $media_materi = $this->request->getFile('isi_materi');
        if($media_materi->isValid()){
            $fileName = $media_materi->getRandomName();
            if($data['type_materi']=='video'){
                $media_materi->move('media/video', $fileName);
            }else{
                $media_materi->move('media/pdf', $fileName);
            }
            $data["isi_materi"] = $fileName;
            $data["durasi"] = $reqdata['durasi'];
            $data["type_materi"] = $reqdata['type_materi'];
        }

        $materi = new SubMateri();
        $sm = $materi->find($id);
        $materi->set($data)->where('id',$id)->update();
        session()->setFlashData("success", "Materi Berhasil diedit");
        return redirect()->to(base_url('/materikurikulum/'.$sm['materi_id']));
    }

    public function delete_materi($id)
    {
        $materi = new SubMateri();
        $step= new Step();
        $sm = $materi->find($id);
        $materi->where('id',$id)->delete();
        $step->where('sub_materi_id',$id)->delete();
        session()->setFlashData("success", "Materi Berhasil dihapus");
        return redirect()->to(base_url('/materikurikulum/'.$sm['materi_id']));
    }

    public function store_quiz()
    {
        $data_quiz =  $this->request->getPost();
        $content = $data_quiz['soal'];
        $dom = new \DomDocument();
        libxml_use_internal_errors(true);
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();
        $imageFile = $dom->getElementsByTagName('img');

        foreach($imageFile as $item => $image){
            $data = $image->getAttribute('src');
            if(substr($data, 0, 10) == "data:image"){
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $imgeData = base64_decode($data);
            
            $fileName = random_string('alnum', 16).'.png';
            file_put_contents('media/quiz/'.$fileName, $imgeData);
            $image->removeAttribute('src');
            $image->setAttribute('src', base_url('media/quiz/'.$fileName));
            }
        }

        $quiz_jawaban = new QuizPilihan();
        $quiz = new Quiz();
        $data_quiz['soal']= $dom->saveHTML();
        $quiz->insert($data_quiz);
        $quiz_id = $quiz->getInsertID();
        $quiz_jawaban->insert([
            'pilihan'=>$data_quiz['jb'],
            'quiz_id'=>$quiz_id
        ]);
        $quiz->where('id',$quiz_id)->set(['jawaban_benar'=>$quiz_jawaban->getInsertID()])->update();
        for($i=1;$i<=3;$i++){
            $quiz_jawaban->insert([
                'pilihan'=>$data_quiz['jl'.$i],
                'quiz_id'=>$quiz_id
            ]);
        }

        session()->setFlashData("success", "Quiz Berhasil dibuat");
        return redirect()->to(base_url('/materikurikulum/'.$data_quiz['materi_id']));
   
    }

    public function edit_quiz($id)
    {
        $quiz = new Quiz();
        $quiz_pilihan = new QuizPilihan();
        $data['quiz'] = $quiz->find($id);
        $data['jawaban'] = $quiz_pilihan->where('quiz_id',$id)->findAll();
        return view('KurikulumMateri/edit_quiz',$data);
    }

    public function update_quiz($id)
    {
        $data_quiz =  $this->request->getPost();
        $content = $data_quiz['soal'];
        $dom = new \DomDocument();
        libxml_use_internal_errors(true);
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();
        $imageFile = $dom->getElementsByTagName('img');

        if($imageFile->count() > 0){
            foreach($imageFile as $item => $image){
                $data = $image->getAttribute('src');
                if(substr($data, 0, 10) == "data:image"){
                    list($type, $data) = explode(';', $data);
                    list(, $data)      = explode(',', $data);
                    $imgeData = base64_decode($data);
                    
                    $fileName = random_string('alnum', 16).'.png';
                    file_put_contents('media/quiz/'.$fileName, $imgeData);
                    $image->removeAttribute('src');
                    $image->setAttribute('src', base_url('media/quiz/'.$fileName));
                }
            }
        }

        $quiz_jawaban = new QuizPilihan();
        $quiz = new Quiz();
        $data_quiz['soal']= $dom->saveHTML();

        $quiz->set($data_quiz)->where('id',$id)->update();
        $jwbn = $quiz_jawaban->where('quiz_id',$id)->findAll();
        foreach($jwbn as $no=> $jb){
            $quiz_jawaban->set([
                        'pilihan'=>$data_quiz['jl'.$no+1],
                    ])->where('id',$jb['id'])->update();
        }

        $qz = $quiz->find($id);
        session()->setFlashData("success", "Quiz Berhasil diedit");
        return redirect()->to(base_url('/materikurikulum/'.$qz['materi_id']));
    }

    public function delete_quiz($id)
    {
        $quiz = new Quiz();
        $step_quiz = new StepQuiz();
        $quiz_pilihan = new QuizPilihan();
        $sm = $quiz->find($id);

        $quiz_pilihan->where('quiz_id',$id)->delete();
        $step_quiz->where('quiz_id',$id)->delete();
        $quiz->where('id',$id)->delete();
        session()->setFlashData("success", "Quiz Berhasil dihapus");
        return redirect()->to(base_url('/materikurikulum/'.$sm['materi_id']));
    }

}
