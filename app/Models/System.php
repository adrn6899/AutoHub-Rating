<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class System extends Model
{
    use HasFactory;

    public function getSystemQuery(){
        return "SELECT %s
        FROM systems 
        WHERE 1
        AND `status` = 1
        AND `active` = 1
        %s
        %s
        %s
        %s
        ";
    }

    public function getSystems($array_data){
        // dd($array_data);
        $fields = " * ";
        $query = sprintf(
            $this->getSystemQuery(),
            $fields,
            $array_data['search'],
            $array_data['where'],
            $array_data['sort'],
            $array_data['offset_limit']
        );

        return DB::select($query);
    }

    public function getSystemsCount($array_data){
        $fields = " COUNT(1) as Count ";
        $query = sprintf(
            $this->getSystemQuery(),
            $fields,
            '',
            $array_data['where'],
            '',
            ''
        );
        return DB::select($query);
    }

    public function getSystemsFilteredCount($array_data){
        $fields = " COUNT(1) as FilteredCount ";
        $query = sprintf(
            $this->getSystemQuery(),
            $fields,
            $array_data['search'],
            $array_data['where'],
            '',
            ''
        );
        return DB::select($query);
    }

    public function getSystemsReportQuery(){
        return "SELECT %s
        FROM systems 
        WHERE 1
        AND `status` = 1
        AND active = 1
        %s
        ";
    }

    public function reports($array_data){
        $fields = " * ";
        $query = sprintf(
            $this->getSystemsReportQuery(),
            $fields,
            $array_data['where'],
        );
        // dd($query);
        return DB::select($query);
    }

    public function pdf($results){
        $data = [];

        $grpData = new \stdClass();

        $grpData->list = $results;
        $grpData->total = sizeOf($results);
        array_push($data, $grpData);

        $report_title = "Systems Masterfile";

        $reportData = [
            'data'  =>  $data,
            'webpage_title' =>  "Systems Report",
            'report_title'  =>  $report_title,
            'table_headers' =>  ['No.','Title'],
            'table_body'    =>  ['system_name']
        ];

        return $reportData;
    }

    public function csv($results){
        $systems = [];
        $systems[] = ['No.','Title'];
        $inc = 0;
        foreach($results as $row){
            $systems[] = [
                $inc+=1,
                $row->title
            ];
        }
        $filename = "Systems_Masterfile"."-". date('Y-m-d').'.csv';

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="'.$filename.'"');
        
        $f = fopen('php://output', 'wb');
        
        if ($f === false) {
            die('Error opening the file ' .$filename);
        }

        if(empty($questions[1])){
            $arr = [
                "No data to show"
            ];
            fputcsv($f, $arr);
        } else {
            foreach ($systems as $row) {
                fputcsv($f, $row, ',');
            }
        }        
        
        fclose($f);    
    }

}
