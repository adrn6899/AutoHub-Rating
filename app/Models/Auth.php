<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auth extends Model
{
    use HasFactory;

    public function getQuestions(){
        return count(Questions::all());
    }
    
    public function getTemplates(){
        return count(Template::all());
    }

    public function getSystems(){
        return count(System::all());
    }

    public function getQuestionnaires(){
        
    }
}
