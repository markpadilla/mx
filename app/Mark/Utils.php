<?php

namespace App\Mark;

class Utils
{
    
    public static function htmlAttributes(array $attributes): string
    {
        $result = '';
        
        foreach ($attributes as $key => $value){
            $result .= $key.' = "'.$value.'" ';
        }
        
        return $result;
    }
    
}