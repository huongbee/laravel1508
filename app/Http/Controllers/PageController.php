<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function getHomePage(){
        return view('home');
    }
    
    public function getDetail(){
        return view('detail');
    }

    public function getThongtin($ten,$idSP){
        echo $ten;
        echo '<hr>';
        echo $idSP;
    }

    public function getThongtin_C2(Request $request){
        echo $request->ten;
        echo '<br>';
        echo $request->id;
    }
    
}
