<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\Questionnaire;
use App\Models\Questions;
use App\Models\Answer;
use App\Models\System;
use App\Models\Template;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function verify(Request $request){
        
        if(Auth::check()){
            $questionsArr = [];
            $url = $request->url();
            $url = explode("/",$url);
            // dd($url);
            $conditions = [
                ['sys_id',$url[5]],
                ['tmp_id',$url[7]]
            ];
            $conditions2 = [
                ['s_id',$url[5]],
                ['t_id',$url[7]],
                ['status',1],
                ['active',1]
            ];
            $check = Link::where($conditions)->get();
            if(!empty($check[0])){
                $questions = Template::select('q_id')->where('id',$url[7])->get();
                $questionnaire = array_map('intval',json_decode($questions[0]->q_id));
                $system_title = System::select('system_name')->where('id',"=",$url[5])->get();
                foreach($questionnaire as $row){
                    $questions = Questions::select('title')->where('id',$row)->get();
                    $questionsArr['questions'][] = [
                        'title' => $questions[0]->title,
                        'qst_id'    =>  $row
                    ];
                }
                $s_id = $url[5];
                $t_id = $url[7];
                return view('users.verify',compact('questionsArr','t_id','s_id','system_title'));
            }
            else {
                abort(404);
            }
        } else {
            session(['url.intended' =>  url()->current()]);
            return redirect('userlogin');
        }

    }

    public function getAnswer(Request $request){

        $arr = json_decode($request->stars);
        $result = [];

        foreach ($arr as $subArr) {
            $index0 = $subArr[0];
            if (!isset($result[$index0])) {
                $result[$index0] = $subArr;
            } else {
                $result[$index0] = $subArr;
            }
        }
        $result = array_values($result); 
        
        $qst = [];
        $ans = [];

        // dd($result);
        foreach($result as $row){
            $qsts = $row[0];
            $qst[] = $qsts;
        }
        foreach($result as $row){
            $ansr = $row[1];
            $ans[] = $ansr;
        }

        // foreach($result as $row){
            Answer::insert([
                'user_id'   =>  Auth::user()->id,
                'tmpt_id'   =>  $request->t_id,
                'syst_id'   =>  $request->s_id,
                'qst_id'    =>  json_encode($qst),
                'rating'    =>  json_encode($ans),
                'comment'   =>  $request->comment
            ]);
        // }

        return response()->json(["message"=>"success"],200);
    }

    public function employeeLogin(Request $request){
        
        $url = 'https://autohub.ph/connect/api/v1/asa/api.php';

        $params = [
            'id' => $request->id,
            'key' => "99799116300681216"
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $op = curl_exec ($ch);
        $err = curl_error($ch);  //if you need
        curl_close ($ch);
        $response = json_decode($op,true);

        // $url2 = 'https://autohub.ph/connect/api/v1/asa/api.php';
        // $parameters2 = array(
        //     'key'=>"99799116300681218",
        //     'company_id'=>$response['company'],
        // );
        // $ch2 = curl_init();
        // curl_setopt($ch2, CURLOPT_URL, $url2);
        // curl_setopt($ch2, CURLOPT_POST, 1);
        // curl_setopt($ch2, CURLOPT_POSTFIELDS, http_build_query($parameters2));
        // curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);

        // $op2 = curl_exec ($ch2);
        // $err2 = curl_error($ch2);  //if you need
        // curl_close ($ch2);
        // $response2 = json_decode($op2,true);
        
        if($response['status'] == 0){
            // dd($response['message']);
            return response()->json(["message"=>"no user"],403);
        } else {
            $user = User::select('id')->where([['f_name',"=",$response['u_fname']],['l_name',"=",$response['u_lname']],
            ['email',"=",$response['email']]])->first();

            if(empty($user)){
                $user = User::create([
                    
                        'f_name'  =>  $response['u_fname'],
                        'l_name' => $response['u_lname'],
                        'email' =>  $response['email'],
                        'password'  =>  bcrypt($response['u_password']),
                        'type'  =>  "ratee"
                    ]);
                    Auth::login($user);
            } else {
                // dd($user);
                Auth::login($user);
            }
            $rdr = explode("/",session('url.intended'));
            $link = "/".$rdr[3]."/".$rdr[4]."/".$rdr[5]."/".$rdr[6]."/".$rdr[7];
            return response()->json($link);
            // dd($user);
            // $login = User::findOrFail($user);

        }
        return response()->json(["message"=>"data not valid"],403);
    }
}
