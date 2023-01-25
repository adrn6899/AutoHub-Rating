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
}