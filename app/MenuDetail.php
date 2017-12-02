<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuDetail extends Model
{
    //
    protected $table = "menu_detail";

    //thuộc về 1
    public function Menu(){
    	return $this->belongsTo('App\Menu','id_menu','id'); // ,khoa ngoai, khoa chinh của bảng bills
    }
}
