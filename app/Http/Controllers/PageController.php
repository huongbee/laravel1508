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
        $productName = "Tên sản phẩm";
        return view('pages.detail',compact('productName'));
    }

    public function getThongtin($ten,$idSP){
        // echo $ten;
        // echo '<hr>';
        // echo $idSP;

        //return view('pages.thongtin',['name'=>$ten,'id'=>$idSP]);

        return view('pages.thongtin',compact('ten','idSP'));
    }

    public function getThongtin_C2(Request $request){
        echo $request->ten;
        echo '<br>';
        echo $request->id;
    }
    
}
