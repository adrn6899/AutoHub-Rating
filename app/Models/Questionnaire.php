<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Questionnaire extends Model
{
    use HasFactory;

    protected $fillable = ['q_id'];

    public function getQuestionnaireQuery(){
        return " SELECT %s 
        FROM `templates` `tmp`
        INNER JOIN `questionnaires` `qst` ON
            `tmp`.`id` = `qst`.`t_id`
        INNER JOIN `systems` `sys` ON
            `qst`.`s_id` = `sys`.`id`
        WHERE
            1 AND `qst`.`status` = 1 AND `qst`.`active` = 1
        GROUP BY `tmp`.`id`
        %s
        %s
        %s
        %s
        ";
    }

    public function getQuestionnaires($array_data){
        // dd($array_data);
        $fields = " `tmp`.`id` AS `tmp_id`,
        `tmp`.`title`,
        ANY_VALUE(`qst`.`id`),
        ANY_VALUE(`sys`.`id`) AS `sys_id`,
        ANY_VALUE(`sys`.`system_name`) AS `system_name` ";
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
        // dd($query);
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
