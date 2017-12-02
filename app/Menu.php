<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $table = "menu";

    //có nhiều
    public function MenuDetail(){
    	return $this->hasMany('App\MenuDetail','id_menu','id'); // ,khoa ngoai, khoa chinh của bill
    }

    public function Foods(){
    	return $this->belongsToMany('App\Foods','menu_detail','id_menu','id_food');
    }
}
