<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    public $timestamps = false;
	
    # FIELD CONF
    public function getPostedConfAttribute()
    {
        return ['tag' => 'input', 'attributes' => ['name' => 'posted', 'type' => 'text',
            'placeholder'=> 'Input', 'id' => 'posted`', 'value' => $this->posted, 'required' => true,
            'pattern'=>"number", 'maxlength' => 4], 'error_msg' => 'Numeric input is required'];
    }

    public function getDescriptionConfAttribute()
    {
        return ['tag' => 'textarea', 'attributes' => ['name' => 'description', 
            'placeholder'=> 'Input', 'id' => 'posted`', 'value' => $this->description, 'required' => true],
            'error_msg' => 'Input is required'];
    }

    public function getLocationConfAttribute()
    {
        return ['tag' => 'input', 'attributes' => ['name' => 'location', 'type' => 'text',
            'placeholder'=> 'Input', 'id' => 'location`', 'value' => $this->location, 'required' => true],
            'error_msg' => 'Input is required'];
    }
}
