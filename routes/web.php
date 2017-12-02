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

Route::get('form-demo',[
    'uses'=>"HomeController@getContactForm", //call controller
    'as'=>'contact' //name route
]);

Route::post('form-demo',[
    'uses'=>"HomeController@postContactForm", //call controller
    'as'=>'contact' //name route
]);




Route::get('upload-file',[
    'uses'=>"HomeController@getUploadFile", //call controller
    'as'=>'upload-file' //name route
]);

Route::post('upload-file',[
    'uses'=>"HomeController@postUploadFile", //call controller
    'as'=>'upload-file' //name route
]);


Route::get('create-product-table',function(){
	Schema::create('product',function($table){
		$table->increments('id');
		$table->string('name',100);
		$table->date('date_create');
	});
	echo "created!";
});

Route::get('create-product-type-table',function(){
	Schema::create('product-type',function($table){
		$table->increments('id');
		$table->string('name',50);
		$table->date('date_create');
	});
	echo "table product-type created!";
});


Route::get('modify-product-table',function(){
	Schema::table('product',function($table){
		$table->float('price',5);
		$table->integer('id_type')->unsigned();
		$table->foreign('id_type')->references('id')->on('product-type');
	});
	echo "successfully!";
});

Route::get('modify-product-table-2',function(){
	Schema::table('product',function($table){
		//$table->string('name',50)->change();
		$table->dropColumn('date_create');
	});
	echo "successfully!";
});

Route::get('drop-table',function(){
	//Schema::drop('users');
	Schema::dropIfExists('users');
	echo "successfully!";
});


Route::group(['prefix'=>'query-builder'],function(){

	Route::get('select-product','HomeController@getAllProductss');

	Route::get('insert-bill-detail','HomeController@getInsertBillDetail');

	Route::get('update-bill-detail','HomeController@getUpdateBillDetail');

	Route::get('delete-bill-detail','HomeController@getDeleteBillDetail');

	Route::get('delete-bill-detail/{id}','HomeController@getDeleteBillDetailByID');
	Route::get('truncate-bill-detail','HomeController@getTruncateBillDetail');
});


Route::group(['prefix'=>'eloquent-model'],function(){

	Route::get('select-users','HomeController@getAllUsers');

	Route::get('select-foods','HomeController@getFoods');

	Route::get('select-bills','HomeController@getBills');


	Route::get('select-food-type','HomeController@getFoodType');

});

