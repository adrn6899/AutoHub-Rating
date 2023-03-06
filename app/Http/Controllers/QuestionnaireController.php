<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\Questionnaire;
use App\Models\Questions;
use App\Models\System;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class QuestionnaireController extends Controller
{
    protected $questionnaire;

    public function __construct(){
        $this->questionnaire = new Questionnaire();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.questionnaires.index');
    }

    public function getQs(Request $request){
        // $array = [];
        $id = $request->id;
        $tmp = Template::select('q_id')->where('id',$id)->get();
        // dd($tmp[0]->q_id);
        if(!empty($tmp[0]->q_id)){
            $q_id = array_map('intval',json_decode($tmp[0]->q_id));
            foreach($q_id as $row){
                $result = (new QuestionsController)->getQs($row);
                // if(){
    
                // }
                // dd($result[0]->title);
                $array['questions'][] = [
                    $result[0]->title
                ];
            }
            // dd($array);
            return response()->json($array);
        }

    }

    public function fetchall(Request $request){
        $array_data['search_keyword']   =   $request->search['value'];
        if(empty($request->search_type)){
            $array_data['search_type']  =   "";
        } else {
            $array_data['search_type']  =   json_decode($request->search_type,true)[0];
        }
        // dd($array_data['search_type']);
        $array_data['sort'] = $request->order[0]['dir'];
        $array_data['order'] = $request->columns[$request->order[0]['column']]['data'];
        $array_data['offset'] = $request->start;
        $array_data['limit'] = $request->length;
        $array_data['offset_limit'] = " LIMIT {$array_data['offset']},{$array_data['limit']}";

        $array_data['sort'] = " ORDER BY {$array_data['order']} {$array_data['sort']} ";

        $array_data['search'] = "";

        // dd($request->search_type);
        if (!empty($array_data['search_keyword'])) {
        //     $array_data['search_keyword'] = "1";
        //     $array_data['search'] = " AND  ? ";
        // } else {
            switch ($array_data['search_type']) {
                case "ID":
                    $array_data['search'] = " AND `tmp_id` = {$array_data['search_keyword']} ";
                    break;
                case "Title":
                    $array_data['search'] = " AND ANY_VALUE(`tmp`.`title`) LIKE '%{$array_data['search_keyword']}%' ";
                    break;
            }
        }
        // dd($array_data['search']);

        $array_data['where'] = "";

        $data = $request->data;
        
        if(!empty($data['active'])){
            $array_data['where'] .= " AND active =  {$data['active']} ";
        }
        $results = $this->questionnaire->getQuestionnaires($array_data);
        // dd($results);
        $result['data'] = array();
        $count = 0;
        foreach($results as $row){
            // dd($row);
            $result['data'][] = array(
                // "count" =>  $count+=1,
                "tmp_id"    =>  $row->tmp_id,
                "title"  =>  $row->title,
                "sys_id"    =>  $row->sys_id,
                "system"    =>$row->system_name
            );
        }
        // dd($system);
        $result['draw'] = $request->draw;
        $result['recordsTotal'] =  $this->questionnaire->getQuestionnairesCount($array_data)[0]->Count;
        $result['recordsFiltered'] =  $this->questionnaire->getQuestionnairesFilteredCount($array_data)[0]->FilteredCount;
        // dd($result);
        return response()->json($result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $questions = Questions::where([
        //     ['active',"=",1],
        //     ['status',"=",1]
        // ])->get();
        return view('admin.questionnaires.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $url = $request->url();
        $base_url = explode("/",$url);
        
        if($request->t_id == "null"){
            return response()->json(["message"=>"Please provide a template name"],402);
        }
        if($request->s_id == "null"){
            return response()->json(["message"=>"Please choose a system"],402);
        }
        // if(empty($request->questionArr)){
        //     return response()->json(["message"=>"No questions selected"],402);
        // }

        // $template = Template::create([
        //     "title" =>  $request->t_id,
        //     "active"    =>  1,
        //     "status"    =>  1
        // ]);
        // dd($template->id);
            
            // $questions = explode(",",$request->questionArr);
            // dd($questions);
            $check = Questionnaire::select('id')
            ->where([['s_id',"=",$request->s_id],['t_id',"=",$request->t_id]])
            // ->orWhere()
            ->get();
            // dd($check);
            if(empty($check[0])){
                // dd("going here");
                // dd($template->id);   
                // foreach($questions as $item){
                    DB::table('questionnaires')
                    ->insert([
                        's_id'  =>  $request->s_id,
                        't_id'  =>  $request->t_id,
                        'status'    =>  1,
                        'active'    =>  1
                    ]);
                    // dd("done");
                // }    
                
                $link = new Link;
                $link->sys_id = $request->s_id;
                $link->tmp_id = $request->t_id;
                $link->link = url('/')."/search/s/".$request->s_id."/tid/".$request->t_id;
                $link->active = 1;
                $link->status = 1;
                $link->save();
    
                return response()->json(["message"=>"success"],200);
    
    
            } else {
                return response()->json(["message"=>"Either template or system is already in use. \n Please edit the template or create new one"],403);
            }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Questionnaire  $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function show(Questionnaire $questionnaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Questionnaire  $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function edit($tmp_id,$sys_id)
    {   
        return view('admin.questionnaires.edit',compact('tmp_id','sys_id'));
    }

    public function getQuestions(Request $request){
        $q_title = [];
        // $questions = Questions::get()->all();
        $t_name = Template::select('title','q_id')
        ->where('id',"=",$request->t_id)
        ->get();
        $s_name = System::select('system_name')
        ->where('id',"=",$request->s_id)
        ->get();
        $questions = array_map('intval',json_decode($t_name[0]->q_id));
        foreach($questions as $row){
            $q = Questions::select('title')->where('id',$row)->get();
            $q_title[] = [
                $q[0]->title,
            ];
        }
        $link = Link::select('link')->where([
            ['tmp_id',"=",$request->t_id],
            ['sys_id',"=",$request->s_id],
        ])->get();

        return response()->json([
        // "result"=>$result,
        "questions"=>$q_title,
        "template"=>$t_name[0]->title,
        "system"=>$s_name,
        "link"=>$link]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Questionnaire  $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request->all());
        $question = explode(",",$request->questionArr);
        $result = Questionnaire::where([
                ['t_id',"=",$request->t_id],
                ['s_id',"=",$request->s_id]
                ])->get();
                // dd($result[0]->id);
        // $result = Questionnaire::where([
        //     ['t_id',"=",$request->t_id],
        //     ['s_id',"=",$request->s_id]
        //     ])->update([
        //     'status'    =>  null,
        //     'active'    =>  null
        //     ]);
        $questionnaire = Questionnaire::findOrFail($result[0]->id);
        $questionnaire->q_id = json_encode($question);
        $questionnaire->save();
        // Questionnaire::upsert([
        //     'id'    =>  $result[0]->id,
        //     't_id'  =>  $request->t_id,
        //     's_id'  =>  $request->s_id,
        //     'q_id'  =>  json_encode($question),
        //     'status'    =>  1,
        //     'active'    =>  1
        // ],['id','t_id','s_id'],['q_id','status','active']);
        // foreach($question as $row){
        //     Questionnaire::upsert([
        //         [
        //             't_id'  =>  $request->t_id,
        //             's_id'  =>  $request->s_id,
        //             'q_id'  =>  $row,
        //             'status'    =>  1,
        //             'active'    =>  1
        //         ]
        //     ],['t_id','s_id','q_id'],['status','active']);
        // }

        return response()->json(["message"=>"success"],200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Questionnaire  $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // dd($request->all());
        $result = Questionnaire::where([
            ['t_id',"=",$request->tmp_id],
            ['s_id',"=",$request->sys_id]
            ])->update([
            'status'    =>  null,
            // 'active'    =>  null
            ]);
            // ->get();
            // dd($result);
            

        return response()->json(["message"=>"success"],200);
    }
}
