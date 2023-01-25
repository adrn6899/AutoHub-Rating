<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    protected $template;

    public function __construct()
    {
        $this->template = new Template();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.templates.index');
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
                case "Title":
                    $array_data['search'] = " AND title LIKE '%{$array_data['search_keyword']}%' ";
                    break;
            }
        }
        // dd($array_data['search']);

        $array_data['where'] = "";

        $data = $request->data;
        
        if(!empty($data['active'])){
            $array_data['where'] .= " AND active =  {$data['active']} ";
        }
        $results = $this->template->getTemplates($array_data);
        // dd($results);
        $result['data'] = array();
        foreach($results as $row){
            // dd($row);
            $result['data'][] = array(
                "id"    =>  $row->id,
                "title"  =>  $row->title
            );
        }
        // dd($system);
        $result['draw'] = $request->draw;
        $result['recordsTotal'] =  $this->template->getTemplatesCount($array_data)[0]->Count;
        $result['recordsFiltered'] =  $this->template->getTemplatesFilteredCount($array_data)[0]->FilteredCount;
        // dd($result);
        return response()->json($result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = $this->template;
        $result->title = $request->title;
        $result->active = 1;
        $result->status = 1;
        $result->save();

        return response()->json(["message"=>"success","result"=>$result],200);
    }

    public function select2fetchAll(){
        $template = Template::select('id','title')->get();
        $data['results'] = [];
        foreach($template as $row){
            $data['results'][] = [
                "id" => $row->id,
                "text"   =>   $row->title
            ];
        }

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function show(Template $template)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $result = Template::findOrFail($request->id);

        return response()->json($result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $result = Template::where('id', $request->id)
        ->update([
            'title' =>  $request->title
        ]);

        return response()->json(["message"=>"success", "result"=>$result],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function destroy(Template $template)
    {
        //
    }
}
