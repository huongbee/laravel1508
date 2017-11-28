<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function getContactForm(){
        return view('form.contact');
    }


    public function postContactForm(Request $req){
        //required: bắt buộc phải nhập

        $req->validate([
            'fullname'=>'required|min:10|max:50',
            'email'=>'required|email',
            'title'=>'required|min:10|max:50',
            'hinhanh'=>'required',
            'age'=>'required|numeric'
        ],[
            'fullname.required'=>'Vui lòng nhập họ tên',
            'fullname.min'=>'Vui lòng nhập tên ít nhất 10 kí tự',
            'age.numeric'=>'Vui lòng tuổi là số'

        ]);

    	echo $_POST['fullname']; 
    	echo '<hr>';

    	echo $req->fullname;
    	echo '<hr>';

    	echo $req->email;
    	echo '<hr>';

    	echo $req->title;

    	echo '<hr>';
    	echo $req->message;

    	echo '<hr>';
    	echo $req->hinhanh; //không lấy thông tin của ảnh bằng cách này

    	echo '<hr>';
    	echo "<pre>";
    	print_r($req->all());
    	echo "</pre>";

    	echo $req->input('name',"KPT"); //tương đương với line 40-45

    	// echo '<hr>';
    	// if(isset($req->name) ){
    	// 	echo $req->name;
    	// }
    	// else{
    	// 	echo 'KPT';
    	// }
    }




    public function getUploadFile(){
        return view('form.file-upload');
    }

    public function postUploadFile(Request $req){
        
    	if($req->hasFile('hinhanh')){
    		$file = $req->file('hinhanh');

	       // $file = $req->hinhanh;

	        // echo "<pre>";
	        // print_r($file);
	        // echo "</pre>";

	        //upload file

	        $name = $file->getClientOriginalName();
	        echo $ext = $file->extension();
	        $size = $file->getClientSize();
	        $arrExt = ['png','jpg','gif','jpeg'];

	        if(in_array($ext, $arrExt)){

	        	if($size <=102400){ //10kb
	        	
		        	$newName = time().'-'.$name;

		        	$file->move('images',$newName); //đường dẫn lưu file, tên file
		        	echo 'Uploaded!';
		        }
		        else{
		        	echo "file quá lớn";
		        }
	        }
	        else{
	        	echo "File không được phép chọn";
	        }

	        

	        // echo '<hr>';
	        // echo $ext = $file->getClientOriginalExtension();


	        
    	}
    	else{
    		echo "Bạn chưa chọn ảnh";
    	}

       

    }



    public function getAllProductss(){
        //$products = DB::table('foods')->get(); //select * from foods

        //select * from foods where id<=10
        //$products = DB::table('foods')->where('id','<=',10)->get();

        //select * from foods where id<=10 and price < 50000
        /*$products = DB::table('foods')->where([
            ['id','<=',10],
            ['price','<',50000]
        ])->get();*/


        //select * from foods where id<=10 or id=60
         // $products = DB::table('foods')
         //            ->where('id','<=',10)
         //            ->orWhere('id',60)
         //            ->get();
        //select * from foods where id<=10 or name like 'Ngô'

        /*$products = DB::table('foods')
                    ->where('id','<=',10)
                    ->orWhere('name','like','%ngô%')
                    ->get();*/

        //select * from foods where id<=10 or name like 'Ngô' order by name DESC LIMIT 0,5
        /*$products = DB::table('foods')
                    ->where('id','<=',10)
                    ->orWhere('name','like','%ngô%')
                    ->orderBy('name','DESC')
                    ->limit(5)
                    ->get();*/
        //select * from foods where id<=10 or name like 'Ngô' order by name DESC LIMIT 2,5
        /*$products = DB::table('foods')
                    ->where('id','<=',10)
                    ->orWhere('name','like','%ngô%')
                    ->orderBy('name','DESC')
                    ->offset(2)
                    ->limit(5)
                    ->get();*/

        //select * from foods where 'price','=','promotion_price'
        /*$products = DB::table('foods')
                    ->whereColumn('price','=','promotion_price')
                    ->get();*/

        //join
        // select t.name as 'ten_loai', f.name as "tensp", f.price from foods f INNER JOIN food_type  t ON ... WHERE...
        //c1
        /*$products = DB::table('foods')
                    ->join('food_type','food_type.id','=','foods.id_type')
                    //->select('description','foods.name','price')
                    ->select('food_type.name as ten_loai','foods.name  as ten_monan','price')
                    ->where('foods.id','<=',10)
                    ->get();*/

        //c2
        /*$products = DB::table('foods')
                    ->select('food_type.id as idLoai',
                            'food_type.name as ten_loai',
                            'foods.name  as ten_monan',
                            'price')
                    ->join('food_type',function($join){
                        $join->on('food_type.id','=','foods.id_type');
                        $join->where('food_type.id','=',5);
                    })
                    ->get();*/


        //đếm số sp theo từng loại:
        //select food_type.name as ten_loai, count(foods.id) as tongSP
        //FROM foods f
        //INNER JOIN food_type  t ON ...
        //GROUP BY food_type.name

        /*$products = DB::table('foods')
                    ->selectRaw('food_type.name as ten_loai , count(foods.id) as tongSP')
                    ->join('food_type',function($join){
                        $join->on('food_type.id','=','foods.id_type');
                    })
                    ->groupBy('food_type.name')
                    ->get();*/


        //thống kê sp có giá thấp nhất theo loại
        $products = DB::table('foods')
                    ->selectRaw('food_type.name as ten_loai , min(foods.price) as GiaThapNhat')
                    ->join('food_type',function($join){
                        $join->on('food_type.id','=','foods.id_type');
                    })
                    ->groupBy('food_type.name')
                    ->get();

        //thống kê sp có giá thấp nhất theo loại chỉ lấy loại đầu tiên
        /*$products = DB::table('foods')
                    ->selectRaw('food_type.name as ten_loai , min(foods.price) as GiaThapNhat')
                    ->join('food_type',function($join){
                        $join->on('food_type.id','=','foods.id_type');
                    })
                    ->groupBy('food_type.name')
                    ->first();*/


        foreach ($products as  $loai) {
            echo $loai->ten_loai;
            echo " : ";
            echo $loai->GiaThapNhat;
            echo "<hr>";
        }

        //liệt kê danh sách sp theo từng loại
        //7
        //tên loại, ds sp
        /*
            cơm         1, cơm 1, ...
                        2, cơm 2, 
                        3, cơm 3...


        */
        $products = DB::table('foods')
                    ->selectRaw('food_type.name as ten_loai , group_concat(foods.id,":",foods.name separator "---") as dssp')
                    ->join('food_type',function($join){
                        $join->on('food_type.id','=','foods.id_type');
                    })
                    ->groupBy('food_type.name')
                    ->get();





        dd($products);

    }

    public function getInsertBillDetail(){
        DB::table('bill_detail')->insert([
            'id_bill'=>7,
            'id_food'=>25,
            'quantity'=>50,
            'price'=>10000
        ]);
        echo 'inserted!';
    }

    public function getUpdateBillDetail(){
        /*DB::table('bill_detail')
        ->where('id',30)
        ->update([
            'id_bill'=>7,
            'id_food'=>25,
            'quantity'=>50,
            'price'=>50000
        ]);*/

        DB::table('bill_detail')
        ->where('id',31)
        ->update([
            'id_bill'=>6
        ]);
        echo 'updated!';
    }

    function getDeleteBillDetail(){
        DB::table('bill_detail')
        ->where('id',31)
        ->delete();
        echo 'deleted!';
    }

    function getDeleteBillDetailByID($id){
        DB::table('bill_detail')
        ->where('id',$id)
        ->delete();
        echo 'deleted!';
    }
}
