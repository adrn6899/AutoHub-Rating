<?php

namespace App\Http\Controllers;

// use App\Models\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\System;
use App\Models\Answer;
use App\Models\Auth as ModelsAuth;
use App\Models\Questions;
use App\Models\Template;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use PDF;

class AuthController extends Controller
{
    private $auth,$quest,$tmp,$sys;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->auth = new ModelsAuth;
        $this->quest = new Questions;
        $this->tmp = new Template;
        $this->sys = new System;
    }

    public function dashBoard(){
        
        $questions = $this->auth->getQuestions();
        $templates = $this->auth->getTemplates();
        $system = $this->auth->getSystems();
        
        $rating = [];

        $conditions = [
            ['status',"=",1],
            ['active',"=",1]
        ];
        $systems = System::select('id')->where($conditions)->get();
        foreach($systems as $row){
            // $avg = Answer::
            $answer = DB::table('answers')->where('qst_id',$row['id'])->avg('rating');
            // $answer = DB::table('answers')->select('s_id')->where('qst_id',$row['id'])->get();
            $rating['average'][] = [
                'id'    =>  $row['id'],
                'average'   =>  $answer
            ];
        }
        $rating = json_encode($rating);
        return view('index')->with(['questions'=>$questions,'templates'=>$templates,'systems'=>$system]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Auth  $auth
     * @return \Illuminate\Http\Response
     */
    public function show(Auth $auth)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Auth  $auth
     * @return \Illuminate\Http\Response
     */
    public function edit(Auth $auth)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Auth  $auth
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Auth $auth)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Auth  $auth
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auth $auth)
    {
        //
    }

    public function login(Request $request){
        $request->validate([
            'email' =>  'required',
            'password'  =>  'required'
        ]);

        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
            return response()->json(["message"=>"success"],200);
        }

        return redirect('signup')->withSuccess('Data not valid');
    }

    public function register(Request $request){

        $validator = Validator::make($request->all(),[
            'name'  =>  'required',
            'email' =>  'required|email|unique:App\Models\User,email',
            'password'  =>  'required|confirmed|min:8',
        ]);

        if ($validator->passes()) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->type = "admin";
            $user->save();

            Auth::login($user);
            
            return response()->json(["message"=>"success"],200);
        }
        return response()->json(["message"=>$validator->errors()],500);
    }

    public function reportDashboard(){
        return view('admin.reports.blank');
    }

    public function qstDashboard(){
        return view('admin.reports.qst_masterfile');
    }

    public function qstnDashboard(){
        return view('admin.reports.qstn_masterfile');
    }

    public function sysDashboard(){
        return view('admin.reports.sys_masterfile');
    }

    public function tmpDashboard(){
        return view('admin.reports.tmp_masterfile');
    }

    public function qstReport(Request $request){

        $array_data['search'] = "";
        $array_data['where'] = "";

    }
    public function qstnReport(Request $request){
        $array_data['type'] = $request->type;
        $array_data['search'] = "";
        $array_data['where'] = "";
        
        if(!empty($from) && !empty($to)){
            $from = Carbon::parse($request->from_date);
            $to = Carbon::parse($request->to_date);
            $fromdate = $from->toDateString();
            $todate = $to->toDateString();
            $array_data['where'] .= " AND DATE(`created_at`) BETWEEN '$fromdate' AND '$todate' ";
        }

        $results = $this->quest->reports($array_data);

        $response = $this->quest->pdf($results,'view');
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('layouts.reports.questions',$response);

        switch($array_data['type']){
            case('view'):
                return $pdf->stream();
                break;
            case('pdf'):
                return $pdf->download("questions-masterfile.pdf");
                break;
            case('csv'):
                $this->quest->csv($results);
                break;
        }

    }

    public function sysReport(Request $request){

        $array_data['type'] = $request->type;
        $array_data['search'] = "";
        $array_data['where'] = "";

        if(!empty($from) && !empty($to)){
            $from = Carbon::parse($request->from_date);
            $to = Carbon::parse($request->to_date);
            $fromdate = $from->toDateString();
            $todate = $to->toDateString();
            $array_data['where'] .= " AND DATE(`created_at`) BETWEEN '$fromdate' AND '$todate' ";
        }

        $results = $this->sys->reports($array_data);

        $response = $this->sys->pdf($results);
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('layouts.reports.systems',$response);

        switch($array_data['type']){
            case('view'):
                return $pdf->stream();
                break;
            case('pdf'):
                return $pdf->download("systems-masterfile.pdf");
                break;
            case('csv'):
                $this->sys->csv($results);
                break;
        }

    }
    
    public function tmpReport(Request $request){
        // dd($request->all());
        $array_data['type'] = $request->type;
        $array_data['search'] = "";
        $array_data['where'] = "";

        if(!empty($from) && !empty($to)){
            $from = Carbon::parse($request->from_date);
            $to = Carbon::parse($request->to_date);
            $fromdate = $from->toDateString();
            $todate = $to->toDateString();
            $array_data['where'] .= " AND DATE(`created_at`) BETWEEN '$fromdate' AND '$todate' ";
        }

        $results = $this->tmp->reports($array_data);

        $response = $this->tmp->pdf($results);
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('layouts.reports.templates',$response);

        switch($array_data['type']){
            case('view'):
                return $pdf->stream();
                break;
            case('pdf'):
                return $pdf->download("questions-masterfile.pdf");
                break;
            case('csv'):
                $this->tmp->csv($results);
                break;
        }
    }
}
