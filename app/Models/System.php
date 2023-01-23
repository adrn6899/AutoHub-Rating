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

}
