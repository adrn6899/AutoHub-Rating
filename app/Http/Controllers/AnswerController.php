<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\Questionnaire;
use App\Models\Questions;

use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function verify(Request $request){
        $questionsArr = [];
        $url = $request->url();
        $url = explode("/",$url);
        $conditions = [
            ['sys_id',$url[5]],
            ['tmp_id',$url[7]]
        ];
        $conditions2 = [
            ['s_id',$url[5]],
            ['t_id',$url[7]]
        ];
        $check = Link::where($conditions)->get();
        if(!empty($check[0])){
            $questionnaire = Questionnaire::SELECT('id','q_id')->where($conditions2)->get();
            foreach($questionnaire as $row){
                // dd($row);
                $questions = Questions::select('title')->where('id',$row->q_id)->get();
                $questionsArr['questions'][] = [
                    'title' => $questions[0]->title,
                    'qst_id'    =>  $row->id
                ];
                // $questionsArr['questions']['qst_id'] = $row->id;
            }
            return view('users.verify',compact('questionsArr'));
        }
        else {
            abort(404);
        }
    }
}
