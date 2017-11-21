<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function getHomePage(){
        return view('pages/home');
    }
    
    public function getDetail(){
        return view('pages.detail');
    }

    public function getThongtin($ten,$idSP){
        // echo $ten;
        // echo '<hr>';
        // echo $idSP;

        return view('pages.thongtin',[
            'name'=>$ten,
            'id'=>$idSP
        ]);
    }

    public function getThongtin_C2(Request $request){
        echo $request->ten;
        echo '<br>';
        echo $request->id;
    }
    
}
