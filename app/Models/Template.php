<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Template extends Model
{
    use HasFactory;

    public function getTemplateQuery(){
        return "SELECT %s
        FROM templates
        WHERE 1
        AND `status` = 1
        AND `active` = 1
        %s
        %s
        %s
        %s
        ";
    }

    public function getTemplates($array_data){
        $fields = " * ";
        $query = sprintf(
            $this->getTemplateQuery(),
            $fields,
            $array_data['search'],
            $array_data['where'],
            $array_data['sort'],
            $array_data['offset_limit']
        );

        return DB::select($query);
    }

    public function getTemplatesCount($array_data){
        $fields = " COUNT(1) as Count ";
        $query = sprintf(
            $this->getTemplateQuery(),
            $fields,
            '',
            $array_data['where'],
            '',
            ''
        );
        return DB::select($query);
    }

    public function getTemplatesFilteredCount($array_data){
        $fields = " COUNT(1) as FilteredCount ";
        $query = sprintf(
            $this->getTemplateQuery(),
            $fields,
            $array_data['search'],
            $array_data['where'],
            '',
            ''
        );
        return DB::select($query);
    }

    public function getTemplatesReportQuery(){
        return "SELECT %s
        FROM templates 
        WHERE 1
        AND `status` = 1
        AND active = 1
        %s
        ";  
    }

    public function reports($array_data){
        $fields = " * ";
        $query = sprintf(
            $this->getTemplatesReportQuery(),
            $fields,
            $array_data['where']
        );

        return DB::select($query);
    }

    public function pdf($results){
        $data = [];

        $grpData = new \stdClass();

        $grpData->list = $results;
        $grpData->total = sizeOf($results);
        array_push($data,$grpData);

        $report_title = "Templates Masterfile";

        $reportData = [
            'data'  =>  $data,
            'webpage_title' =>  "Templates Report",
            'report_title'  =>  $report_title,
            'table_headers'  =>  ['No.', 'Title'],
            'table_body'    =>  ['title']
        ];

        return $reportData;
    }

    public function csv($results){
        $templates = [];
        $templates[] = ['No.','Title'];
        $inc = 0;
        foreach($results as $row){
            $templates[] = [
                $inc+=1,
                $row->title
            ];
        }
        $filename = "Templates Masterfile" . date('Y-m-d H-i-sA').'.csv';

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="'.$filename.'"');
        
        $f = fopen('php://output', 'wb');
        
        if ($f === false) {
            die('Error opening the file ' .$filename);
        }
        
        foreach ($templates as $row) {
            fputcsv($f, $row, ',');
        }
        
        fclose($f);
    }
}
