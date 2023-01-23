<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Questionnaire extends Model
{
    use HasFactory;

    public function getQuestionnaireQuery(){
        return "SELECT %s
        FROM questionnaires 
        WHERE 1
        AND `status` = 1
        AND `active` = 1
        %s
        %s
        %s
        %s
        ";
    }

    public function getQuestionnaires($array_data){
        // dd($array_data);
        $fields = " * ";
        $query = sprintf(
            $this->getQuestionnaireQuery(),
            $fields,
            $array_data['search'],
            $array_data['where'],
            $array_data['sort'],
            $array_data['offset_limit']
        );

        return DB::select($query);
    }

    public function getQuestionnairesCount($array_data){
        $fields = " COUNT(1) as Count ";
        $query = sprintf(
            $this->getQuestionnaireQuery(),
            $fields,
            '',
            $array_data['where'],
            '',
            ''
        );
        return DB::select($query);
    }

    public function getQuestionnairesFilteredCount($array_data){
        $fields = " COUNT(1) as FilteredCount ";
        $query = sprintf(
            $this->getQuestionnaireQuery(),
            $fields,
            $array_data['search'],
            $array_data['where'],
            '',
            ''
        );
        return DB::select($query);
    }
}
