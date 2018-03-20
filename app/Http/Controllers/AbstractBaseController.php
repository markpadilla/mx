<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbstractBaseController extends Controller
{   
    private $id;
    protected $input;
    
    public function __construct()
    {
        
    } 
    
    public function index()
    {
        $data       = $this->model->paginate(50);
        $columns    = $this->model->columns;
        $title      = $this->model->title;
        
        return view('index', compact('data', 'columns', 'title'));
    }
    
    public function show($id)
    {
        $row        = $this->model->getById($id);
        $columns    = $this->model->columns;
        
        return view('show.main', compact('row', 'columns'));
    }
    
    public function edit($id)
    {
        $row        = $this->model->getById($id);
        $columns    = $this->model->columns;
        $route      = $this->route.'.update';
        $title      = $this->model->title;
        
        return view('edit', compact('row', 'columns', 'route', 'title'));
    }
    
    public function update(Request $request, $id)
    {
        $this->id       = $id;
        $this->input    = $request->all();
        
        $data = $this->model->init($this->id)->with($this->input);
        
        if ($data->save()){
            return redirect()->route($this->route);
        } else {
            return redirect()->route($this->route.'.edit', $this->id);
        }
        
    }

    public function import()
    {
        $route      = $this->route.'.parse';
        $title      = $this->model->title;
    
        return view('import', compact('route', 'title'));    
    }

    public function parse(Request $request)
    {
        $file   = $request->file('fileUpload');
        $xml    = simplexml_load_file($file) or die("Error: Cannot create object");
        
        $result = $xml->xpath('//vacancy');

        if (!$result){
            return false;
        }

        $array = json_decode(json_encode((array)$result),1);
    
        if (!$this->model->insert($array)){
            return false;
        }
        
        return redirect()->route($this->route);
    }

    public function export()
    {
        $data       = $this->model->all();
        $columns    = $this->model->columns;
        $title      = strtolower($this->model->title);

        return response()->streamDownload(function () use ($data, $columns, $title){
            $xml = '<?xml version="1.0"?><'.$title.'>';

            if(count($data)){
                foreach ($data as $row)
                {
                    $xml .= '<'.$this->model->class_name.'>';

                    foreach($columns as $column)
                    {
                        $xml .= '<'.$column['name'].'>';
                        $xml .= $row->{$column['name']} ;
                        $xml .= '</'.$column['name'].'>';
                    }
                    
                    $xml .= '</'.$this->model->class_name.'>';
                }
            }

            $xml .= '</'.$title.'>';
            echo $xml;
        }, strtolower($this->model->title).'.xml');
    }
}
