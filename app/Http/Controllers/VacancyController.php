<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VacancyController extends AbstractBaseController
{   
    protected $route = 'vacancies';
    
    public function __construct(\App\Mark\Repositories\VacancyRepo $vacancy)
    {
        $this->model = $vacancy;
    } 
    
    
}
