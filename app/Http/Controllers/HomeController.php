<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
