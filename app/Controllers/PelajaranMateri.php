<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SubMateri;

class PelajaranMateri extends BaseController
{
    public function index($id)
    {
        $sub = new SubMateri();
        $data['materi'] = $sub->find($id);

        $all_materi = $sub->where('materi_id',$data['materi']['materi_id'])->findAll();

        foreach($all_materi as $i=>$m){
            if($m['id']== $data['materi']['id']){
                $next = $i+1;
            }
        }

        $next_materi =empty( $all_materi[$next]) ? 'finish' : $all_materi[$next]['id'];
        $data['materi']['next_materi'] = $next_materi;
        return view('PelajaranMateri/index',$data);
    }
}
