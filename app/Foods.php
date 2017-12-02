<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foods extends Model
{
    //
    protected $table = "foods";

    //thuộc về 1 FoodType
    public function FoodType(){
    	return $this->belongsTo('App\FoodType','id_type','id'); 
    }

    //chỉ có 1 PageUrl
    public function PageUrl(){
    	return $this->hasOne('App\PageUrl','id_url','id'); // ,khoa ngoai, khoa chinh của bảng foods
    }

    public function Menu(){
    	return $this->belongsToMany('App\Menu','menu_detail','id_food','id_menu');
    }
}
