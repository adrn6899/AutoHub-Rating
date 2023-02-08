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
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    private $auth;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->auth = new ModelsAuth;
    }

    public function dashBoard(){
        
        $questions = $this->auth->getQuestions();
        $templates = $this->auth->getTemplates();
        $system = $this->auth->getSystems();
        

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
        // $rating = json_encode($rating);
        // dd($rating);
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
}
