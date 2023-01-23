<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Questions extends Model
{
    use HasFactory;

    public function getQuestionsQuery(){
        return "SELECT %s
        FROM questions 
        WHERE 1
        AND `status` = 1
        %s
        %s
        %s
        %s
        ";
    }

    public function getQuestions($array_data){
        // dd($array_data);
        $fields = " * ";
        $query = sprintf(
            $this->getQuestionsQuery(),
            $fields,
            $array_data['search'],
            $array_data['where'],
            $array_data['sort'],
            $array_data['offset_limit']
        );

        return DB::select($query);
    }

    public function getQuestionsCount($array_data){
        $fields = " COUNT(1) as Count ";
        $query = sprintf(
            $this->getQuestionsQuery(),
            $fields,
            '',
            $array_data['where'],
            '',
            ''
        );
        return DB::select($query);
    }

    public function getQuestionsFilteredCount($array_data){
        $fields = " COUNT(1) as FilteredCount ";
        $query = sprintf(
            $this->getQuestionsQuery(),
            $fields,
            $array_data['search'],
            $array_data['where'],
            '',
            ''
        );
        return DB::select($query);
    }
}
