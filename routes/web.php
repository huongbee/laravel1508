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
// */

// Route::get('trang-chu', function () {
// 	echo "Hello World!";
//     //return view('welcome');
// });


// Route::get('login',function(){
// 	echo "Đây là trang login";
// });

// // Route::get('san-pham?ten="huong"',function(){
// // 	echo $_GET['ten'];
// // }); //sai

// Route::get('san-pham-{ten}-{id?}',function($ten, $maSP=12){
// 	//echo $_GET['ten'];//sai
// 	echo $ten;
// 	echo "<br>";
// 	echo $maSP;
// }); 

// // Route::get('{ten}-{id?}',function($ten, $maSP=12){
// // 	//echo $_GET['ten'];//sai
// // 	echo $ten;
// // 	echo "<br>";
// // 	echo $maSP;
// // 	//echo 1234;
// // });//->where([
// // 	'id'=>'[0-9]+',
// // 	'ten'=>'[a-z]*'
// // ]);
// //->where('id','[0-9]+'); 

// Route::get('/home',function(){
// 	//echo "Đây là trang chủ";
// 	return view('home');
// })->name('home-page');


// Route::get('/detail1132323',function(){


// 	return view('detail');
// })->name('detail-page');


// // Route::get('/call-route',function(){
// // 	return redirect()->route('home-page');
// // });



// Route::group(['prefix'=>'admin'],function(){

// 	//     admin/login
// 	Route::get('login',function(){
// 		echo "Đây là trang login vào trang admin";
// 	});
// 	Route::get('logout',function(){
// 		echo "Đây là trang logout ra khỏi trang admin";
// 	});
// });

// Route::view('trang-chu.html','home');




Route::get('/','PageController@getHomePage');

Route::get('/detail','PageController@getDetail')->name('detail-page');

Route::get('san-pham-{ten}-{id?}','PageController@getThongtin');
//Route::get('san-pham-{ten}-{id?}','PageController@getThongtin_C2');


Route::get('demo-request','PageController@getDemoRequest');

Route::get('set-cookie','PageController@setCookie');
Route::get('get-cookie','PageController@getCookie');

Route::get('set-session','PageController@setSession');
Route::get('get-session','PageController@getSession');


//form
//input
//upload file