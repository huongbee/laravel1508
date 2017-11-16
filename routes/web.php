<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('trang-chu', function () {
	echo "Hello World!";
    //return view('welcome');
});


Route::get('login',function(){
	echo "Đây là trang login";
});

// Route::get('san-pham?ten="huong"',function(){
// 	echo $_GET['ten'];
// }); //sai

Route::get('san-pham-{ten}-{id}',function($ten,$maSV){
	//echo $_GET['ten'];//sai
	echo $ten;
	echo "<br>";
	echo $maSV;
}); 
