<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    protected $table = "bill_detail";

    //thuộc về 1
    public function Bills(){
    	return $this->belongsTo('App\Bills','id_bill','id'); // ,khoa ngoai, khoa chinh của bảng bills
    }
}
