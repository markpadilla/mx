<?php

namespace App\Mark\Repositories;

abstract class AbstractRepo
{
    protected $model;
    protected $instance;
    public $columns = [];
    
    abstract function with($input);
    
    public function paginate($limit)
    {
        return $this->model->paginate($limit);
    }

    public function save()
    {
        return $this->instance->save();
    }

    public function make(array $with = array())
    {
        return $this->model->with($with);
    }

    public function getById($id, array $with = array())
    {
        $query = $this->make($with);

        return $query->find($id);
    }

    public function setProperties($vars)
    {
        extract($this->input);
        
        foreach ($vars as $_val){
            if(isset(${$_val})){
                $this->instance->$_val = $$_val;
            }
        }
        
        return $this;
    }

    public function init($id = null)
    {
        if ($id){
            $this->instance = $this->model->find($id);
        } else {
            $this->instance = $this->model->newInstance();
        }
        
        return $this;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function insert($data)
    {
        return $this->model->insert($data);
    }
}

