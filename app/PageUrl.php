<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageUrl extends Model
{
    //
    protected $table = "page_url";

    //chỉ có 1 PageUrl
    public function Foods(){
    	return $this->hasOne('App\Foods','id_url','id'); // ,khoa ngoai, khoa chinh của bảng foods
    }
}
