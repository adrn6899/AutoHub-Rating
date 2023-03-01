<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Questionnaire extends Model
{
    use HasFactory;

    protected $fillable = ['s_id','t_id','q_id','status','active'];

    public function getQuestionnaireQuery(){
        return " SELECT %s 
        FROM `templates` `tmp`
        INNER JOIN `questionnaires` `qst` ON
            `tmp`.`id` = `qst`.`t_id`
        INNER JOIN `systems` `sys` ON
            `qst`.`s_id` = `sys`.`id`
        WHERE
            1 AND `qst`.`status` = 1
        -- GROUP BY `tmp`.`id`
        %s
        %s
        %s
        %s
        ";
    }

    public function getQuestionnaires($array_data){
        // dd($array_data);
        $fields = " 
        `tmp`.`id` as `tmp_id`,
        `tmp`.`title` AS `title`,
        `sys`.`id` as `sys_id`,
        `sys`.`system_name` as `system_name` ";
        // ANY_VALUE(`tmp`.`id`) AS `tmp_id`,
        // ANY_VALUE(`tmp`.`title`) AS `title`,
        // ANY_VALUE(`qst`.`id`) AS `id`,
        // ANY_VALUE(`sys`.`id`) AS `sys_id`,
        // ANY_VALUE(`sys`.`system_name`) AS `system_name` ";
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
        // $fields = " tmp.id ";
        $fields = " COUNT(1) as Count ";
        $query = sprintf(
            $this->getQuestionnaireQuery(),
            $fields,
            '',
            $array_data['where'],
            '',
            ''
        );
        //dd($query);
        // return DB::select("SELECT COUNT(1) as Count FROM (".$query.") foo");
        return DB::select($query);
    }

    public function getQuestionnairesFilteredCount($array_data){
        // $fields = " tmp.id ";
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

    public function getQuestionnairesQuery(){
        return "SELECT %s
        FROM questionnaires 
        INNER JOIN templates ON questionnaires.t_id = templates.id
        INNER JOIN systems ON questionnaires.s_id = systems.id
        WHERE 1
        AND `questionnaires`.`status` = 1
        AND questionnaires.active = 1
        %s
        ";
    }

    public function reports($array_data){
        $fields = " templates.title,systems.system_name,questionnaires.* ";
        $query = sprintf(
            $this->getQuestionnairesQuery(),
            $fields,
            $array_data['where'],
        );
        // dd($query);
        return DB::select($query);
    }

    public function pdf($results, $type){
        $data = [];
        $grpData = new \stdClass();

        $grpData->list = $results;
        $grpData->total = sizeOf($results);
        array_push($data, $grpData);

        $report_title = "Questionnaires Masterfile";
        $reportData = [
            'data'  =>  $data,
            'webpage_title' =>  "Questionnaires Report",
            'report_title'  =>  $report_title,
            'table_headers' =>  ['Template','System'],
            'table_body'    =>  ['title','system_name']
        ];

        return $reportData;
    }
}
