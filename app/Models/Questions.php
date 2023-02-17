<?php

namespace App\Models;

use App\Http\Controllers\AuthController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PDF;
// use Dompdf;
use Illuminate\Support\Facades\App;

class Questions extends Model
{
    use HasFactory;

    public function getQuestionsQuery(){
        return "SELECT %s
        FROM questions 
        WHERE 1
        AND `status` = 1
        AND active = 1
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

    public function getQuestionsReportQuery(){
        return "SELECT %s
        FROM questions 
        WHERE 1
        AND `status` = 1
        AND active = 1
        %s
        ";
    }

    public function reports($array_data){
        $fields = " * ";
        $query = sprintf(
            $this->getQuestionsReportQuery(),
            $fields,
            $array_data['where'],
        );
        // dd($query);
        return DB::select($query);
    }

    public function pdf($results,$type){
            // $img = url('../../../public/files/img/AGC_TRANSPARENT.png');
            // $type = pathinfo($img,PATHINFO_EXTENSION);
            // $data = file_get_contents($img);
            // $base64 = 'data:image/'.$type.';base64'.base64_encode($data);

            $data = [];

            $grpData = new \stdClass();

            $grpData->list = $results;
            $grpData->total = sizeOf($results);
            array_push($data, $grpData);

            $report_title = "Questions Masterfile";
            $reportData = [
                'data'  =>  $data,
                'webpage_title' =>  "Questions Report",
                'report_title'  =>  $report_title,
                'table_headers' =>  ['No.','Title'],
                'table_body'    =>  ['title'],
                // 'img'           =>  $base64
            ];

            // dd($reportData['img']);

            return $reportData;
    }

    public function csv($results){
        // dd($results);
        $questions = [];
        $questions[] = ['No.','Title'];
        $inc = 0;
        foreach ($results as $row) {
            $questions[] = [
                $inc+=1,
                $row->title
            ];
        }
        $filename = "Questions_Masterfile"."-". date('Y-m-d').'.csv';
        // dd($questions);
        
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
            foreach ($questions as $row) {
                fputcsv($f, $row, ',');
            }
        }
        
        fclose($f);
    }
}
