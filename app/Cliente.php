<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public function getCelAttribute($value)
    {
        if(strlen($value) == 10){
            $novo = substr_replace($value, '(', 0, 0);
            $novo = substr_replace($novo, '9', 3, 0);
            $novo = substr_replace($novo, ') ', 3, 0);
            $novo = substr_replace($novo, '-', 10, 0);
        }else{
            $novo = substr_replace($value, '(', 0, 0);
            $novo = substr_replace($novo, ') ', 3, 0);
            $novo = substr_replace($novo, '-', 10, 0);
        }
        return $novo;
    }

    public function getPhoneAttribute($value)
    {
            $novo = substr_replace($value, '(', 0, 0);
            $novo = substr_replace($novo, ') ', 3, 0);
            $novo = substr_replace($novo, '-', 9, 0);
        return $novo;
    }
}
