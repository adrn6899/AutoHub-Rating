<?php

namespace App\Http\Controllers;

use App\Models\System;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    protected $system;

    public function __construct(){
        $this->system = new System();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $page_title = "Systems";
        return view('admin.systems.system')->with(['page_title' => $page_title]);
    }

    public function fetchall(Request $request){
        $array_data['search_keyword']   =   $request->search['value'];
        if(empty($request->search_type)){
            $array_data['search_type']  =   "";
        } else {
            $array_data['search_type']  =   json_decode($request->search_type,true)[0];
        }
        // dd($array_data['search_type']);
        $array_data['sort'] = $request->order[0]['dir'];
        $array_data['order'] = $request->columns[$request->order[0]['column']]['data'];
        $array_data['offset'] = $request->start;
        $array_data['limit'] = $request->length;
        $array_data['offset_limit'] = " LIMIT {$array_data['offset']},{$array_data['limit']}";

        $array_data['sort'] = " ORDER BY {$array_data['order']} {$array_data['sort']} ";

        $array_data['search'] = "";

        // dd($request->search_type);
        if (!empty($array_data['search_keyword'])) {
        //     $array_data['search_keyword'] = "1";
        //     $array_data['search'] = " AND  ? ";
        // } else {
            switch ($array_data['search_type']) {
                case "ID":
                    $array_data['search'] = " AND id = {$array_data['search_keyword']} ";
                    break;
                case "Name":
                    $array_data['search'] = " AND system_name LIKE '%{$array_data['search_keyword']}%' ";
                    break;
            }
        }
        // dd($array_data['search']);

        $array_data['where'] = "";

        $data = $request->data;
        
        if(!empty($data['active'])){
            $array_data['where'] .= " AND active =  {$data['active']} ";
        }

        $results = $this->system->getSystems($array_data);
        // dd($results);
        $result['data'] = array();
        foreach($results as $row){
            // dd($row);
            $result['data'][] = array(
                "id"    =>  $row->id,
                "system_name"  =>  $row->system_name
            );
        }
        // dd($system);
        $result['draw'] = $request->draw;
        $result['recordsTotal'] =  $this->system->getSystemsCount($array_data)[0]->Count;
        $result['recordsFiltered'] =  $this->system->getSystemsFilteredCount($array_data)[0]->FilteredCount;
        // dd($result);
        return response()->json($result);
    }

    public function select2fetchAll(){
        $system = System::select('id','system_name')->get();
        $data['results'] = [];
            foreach($system as $row){
                $data['results'][] = [
                    "id"    =>  $row->id,
                    "text"  =>  $row->system_name
                ];
            }

        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = $this->system;
        $result->system_name = $request->name;
        $result->active = 1;
        $result->status = 1;
        $result->save();

        return response()->json(["message"=>"success","result"=>$result],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\System  $system
     * @return \Illuminate\Http\Response
     */
    public function show(System $system)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\System  $system
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $result = System::findOrFail($request->id);

        return response()->json($result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\System  $system
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $result = System::where('id',$request->id)
        ->update([
            'system_name'   =>  $request->name
        ]);

        return response()->json(["message"=>"success", "result"=>$result]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\System  $system
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $result = System::where('id',$request->id)
        ->update([
            'active'   =>  null,
            'status'    =>  null
        ]);

        return response()->json(["message"=>"success", "result"=>$result]);
    }
}
