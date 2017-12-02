<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodType extends Model
{
    //
    protected $table = "food_type";

    //có nhiều
    public function Foods(){
    	return $this->hasMany('App\Foods','id_type','id'); 
    }

    public function MenuDetail(){
    	return $this->hasManyThrough(
            'App\MenuDetail',
            'App\Foods',
            'id_type', // Foreign key on Foods table...
            'id_food', // Foreign key on menu_detail table...
            'id', // Local key on FoodType table...
            'id' // Local key on Foods table...
        );
    }
}
