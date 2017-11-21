<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

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

    public function getDemoRequest(Request $req){
        echo $req->path(); //demo-request
        echo "<hr>";
        echo $req->url();

        echo "<hr>";
        if($req->is('admin*')){ //kiểm tra trong url có tồn tại admin hay ko
            echo "có tồn tại admin bên trong url";
        }
        else {
            echo "không tồn tại admin bên trong url";
        }
            
        echo "<hr>";
        if($req->isMethod('POST')){
            echo "using method POST";
        }
        else{
            echo "not method POST";
        }
    }

    public function setCookie(Response $res){
        echo '1212';
        return $res->withCookie('username','khoapham',2);  
    }

    public function getCookie(Request $req){
        echo $req->cookie('username');
    }

    public function setSession(Request $request){
        $request->session()->put('password', 'admin123');
        echo "Đã setup session";
    }
    
    public function getSession(Request $request){
        //echo $request->session()->get('password','chưa có session này');

        //c2
        if ($request->session()->has('password')) {
           //echo  $request->session()->get('password');
           $request->session()->forget('password'); //unset('password)
           $request->session()->flush(); //delete all session_destroy()
           echo "Deleted!";
        }
        else{
            echo 'chưa có session này';
        }
    }
}
