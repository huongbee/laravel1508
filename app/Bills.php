<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    //
    protected $table = "bills";

    
    //có nhiều
    public function BillDetail(){
    	return $this->hasMany('App\BillDetail','id_bill','id'); // ,khoa ngoai, khoa chinh của bill
    }



}
