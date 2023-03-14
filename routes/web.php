<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\TemplateController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.index');
});
Route::group(['middleware'  =>  'auth'],function(){
    Route::get('/systems',[SystemController::class,'index'])->name('system.index');
    Route::get('/dashboard',[AuthController::class,'dashBoard'])->name('admin.dashboard');
    Route::get('systems/fetchall',[SystemController::class, 'fetchall'])->name('system.fetch');
    Route::post('systems/store',[SystemController::class, 'store'])->name('system.store');
    Route::post('systems/get',[SystemController::class, 'edit'])->name('system.get');
    Route::post('systems/update',[SystemController::class, 'update'])->name('system.update');
    Route::post('systems/destroy',[SystemController::class,'destroy'])->name('system.destory');
    Route::get('systems/select2',[SystemController::class,'select2fetchAll'])->name('system.select2');
    Route::get('/questions',[QuestionsController::class, 'index'])->name('question.index');
    Route::get('questions/fetchall',[QuestionsController::class, 'fetchall'])->name('question.fetch');
    Route::post('questions/store',[QuestionsController::class, 'store'])->name('question.store');
    Route::post('questions/get',[QuestionsController::class, 'edit'])->name('question.get');
    Route::post('questions/update',[QuestionsController::class, 'update'])->name('question.update');
    Route::post('questions/destroy',[QuestionsController::class,'destroy'])->name('question.destory');
    Route::get('questionnaires',[QuestionnaireController::class,'index'])->name('questionnaires.index');
    Route::get('questionnaires/fetchall',[QuestionnaireController::class,'fetchall'])->name('questionnaires.fetch');
    Route::get('questionnaires/create',[QuestionnaireController::class,'create'])->name('questionnaires.create');
    Route::post('questionnaires/store',[QuestionnaireController::class,'store'])->name('questionnaires.store');
    Route::get('questionnaires/view/{tmp_id}/{sys_id}',[QuestionnaireController::class,'edit'])->name('questionnaires.edit');
    Route::post('questionnaires/destroy',[QuestionnaireController::class,'destroy'])->name('questionnaires.destroy');
    Route::post('questionnaires/update',[QuestionnaireController::class,'update'])->name('questionnaires.update');
    Route::post('questionnaires/getQuestions',[QuestionnaireController::class,'getQuestions'])->name('questionnaires.getQuestions');
    Route::get('/templates',[TemplateController::class,'index'])->name('templates.index');
    Route::get('templates/fetchall',[TemplateController::class,'fetchall'])->name('templates.fetch');
    Route::get('/templates/create',[TemplateController::class,'create'])->name('templates.create');
    Route::post('templates/store',[TemplateController::class,'store'])->name('templates.store');
    // Route::post('templates/get',[TemplateController::class, 'edit'])->name('templates.get');
    Route::get('templates/{id}',[TemplateController::class,'edit'])->name('templates.edit');
    Route::post('templates/update',[TemplateController::class, 'update'])->name('templates.update');
    Route::post('templates/destroy',[TemplateController::class, 'destroy'])->name('templates.destroy');
    Route::get('templates/select2',[TemplateController::class,'select2fetchAll'])->name('templates.select2');
    Route::get('questionnaires/getQs',[QuestionnaireController::class,'getQs'])->name('questionnaires.getqs');
    Route::get('reports', function(){
        return view('admin.reports.index');
    });
    Route::get('blank',[AuthController::class, 'reportDashboard'])->name('dashboard.blank');
    Route::get('questionnaires_masterfile',[AuthController::class, 'qstDashboard'])->name('dashboard.qst');
    Route::get('get/questionnaires_masterfile',[AuthController::class, 'qstReport'])->name('report.qst');
    Route::get('questions_masterfile',[AuthController::class, 'qstnDashboard'])->name('dashboard.qstn');
    Route::get('get/questions_masterfile',[AuthController::class, 'qstnReport'])->name('report.qstn');
    Route::get('templates_masterfile',[AuthController::class, 'tmpDashboard'])->name('dashboard.tmp');
    Route::get('get/templates_masterfile',[AuthController::class, 'tmpReport'])->name('report.tmp');
    Route::get('systems_masterfile',[AuthController::class, 'sysDashboard'])->name('dashboard.sys');
    Route::get('get/systems_masterfile',[AuthController::class, 'sysReport'])->name('report.sys');
    Route::get('fetchTmp',[AuthController::class,'fetchTMP']);
    
    Route::get('default',[AuthController::class, 'default'])->name('dashboard.default');
    Route::get('getTopFive',[AuthController::class, 'show'])->name('dashboard.show');

    Route::any('customLogout',[AuthController::class, 'customLogout'])->name('customLogout');
});

Route::get('/',function(){
    if(Auth::check()){
        return redirect()->route('admin.dashboard');
    } else {
        return view('auth.index');
    }
})->name('auth.index');

Route::get('signup', function(){
    if(Auth::check()){
        return redirect()->route('admin.dashboard');
    } else {
        return view('auth.registration');
    }
})->name('auth.signup');

Route::post('login',[AuthController::class,'login'])->name('auth.login');
Route::post('register',[AuthController::class,'register'])->name('auth.register');
Route::get('/search/s/{s}/tid/{tid}',[AnswerController::class,'verify'])->name('users.verify');
Route::post('response',[AnswerController::class,'getAnswer'])->name('user.response');
Route::get('userlogin',function(){
    return view('users.login');
})->name('users.login');
Route::post('employeeLogin',[AnswerController::class,'employeeLogin'])->name('employee.login');
Route::get('/thankyou', function(){
    return view()->make('message.message',['message' => '<center>
    <h1>Thank you for your response!</h1></br>
    <h6>This will help us identify which areas to improve</h6>
    </center>']);
});