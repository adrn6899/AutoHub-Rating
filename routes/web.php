<?php

use App\Http\Controllers\SystemController;
use App\Http\Controllers\QuestionsController;
use Illuminate\Support\Facades\Route;

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
    return view('layouts.master');
});
Route::get('/systems',[SystemController::class,'index'])->name('system.index');
Route::get('systems/fetchall',[SystemController::class, 'fetchall'])->name('system.fetch');
Route::post('systems/store',[SystemController::class, 'store'])->name('system.store');
Route::post('systems/get',[SystemController::class, 'edit'])->name('system.get');
Route::post('systems/update',[SystemController::class, 'update'])->name('system.update');
Route::post('systems/destroy',[SystemController::class,'destroy'])->name('system.destory');
Route::get('/questions',[QuestionsController::class, 'index'])->name('question.index');
Route::get('questions/fetchall',[QuestionsController::class, 'fetchall'])->name('question.fetch');