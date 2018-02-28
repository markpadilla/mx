<?php

namespace App\Mark\Repositories;

use App\Vacancy;

class VacancyRepo extends AbstractRepo
{
    public $title = 'Vacancies';
    
    public function __construct(Vacancy $model)
    {
        $this->model = $model;
        $this->setColumns();
    }

    private function setColumns()
    {
        $this->columns = [
            ['name' => 'id', 'label' => __('labels.id')],
            ['name' => 'posted', 'label' => __('labels.posted')],
            ['name' => 'description', 'label' => __('labels.description')],
            
            ['name' => 'location', 'label' => __('labels.location')],
        ];
        
        return $this;
    }
    
    public function with($input)
    {
        $this->input = $input;
        
        extract($this->input);        
        
        $vars = ['posted','description', 'location'];
        $this->setProperties($vars);    
        
        return $this;
    }
    
}
