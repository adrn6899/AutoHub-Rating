<?php

namespace App\Http\Controllers;

use App\Models\Questionnaire;
use App\Models\Questions;
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
                    $array_data['search'] = " AND id = {$array_data['search_keyword']} ";
                    break;
                case "Title":
                    $array_data['search'] = " AND template_name LIKE '%{$array_data['search_keyword']}%' ";
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
        dd($results);
        $result['data'] = array();
        foreach($results as $row){
            // dd($row);
            $result['data'][] = array(
                "id"    =>  $row->id,
                "title"  =>  $row->template_name
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
        $questions = Questions::where([
            ['active',"=",1],
            ['status',"=",1]
        ])->get();
        return view('admin.questionnaires.create',compact('questions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            's_id'  =>  'required',
            't_id'  =>  'required'
        ]);

        $questions = explode(",",$request->questionArr);

        $check = Questionnaire::select('id')
        ->where('s_id',"=",$request->s_id)
        ->where('t_id',"=",$request->t_id)
        ->get();
        // ->where([
        //     ['s_id',"=",$data['system']],
        //     ['t_id',"=",$data['template']]
        // ])->get();
        if(empty($check[0])){
            foreach($questions as $item){
                DB::table('questionnaires')
                ->insert([
                    's_id'  =>  $request->s_id,
                    't_id'  =>  $request->t_id,
                    'q_id'  =>  $item,
                    'status'    =>  1,
                    'active'    =>  1
                ]);
            }    
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
    public function edit($id)
    {    
        return view('admin.questionnaires.edit');
    }

    public function getQuestions($id){
        $var = Questionnaire::findOrFail($id);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Questionnaire  $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Questionnaire $questionnaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Questionnaire  $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Questionnaire $questionnaire)
    {
        //
    }
}
