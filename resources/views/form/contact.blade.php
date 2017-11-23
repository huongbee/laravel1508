<!doctype html>
<html lang="vi">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <style>
        body{
            width: 800px;
            margin: auto;
            display: block;
        }
    </style>
    <body>
        <h2>Contact Form</h2>
        <form method="post" action="{{route('contact')}}">

            Họ tên: <br>
            <input type="text" name="fullname" placeholder="Nhập họ tên"/>
            <br><br>

            Email: <br>
            <input type="email" name="email" placeholder="Nhập email"/>
            <br><br>

            Tiêu đề: <br>
            <input type="text" name="title" placeholder="Nhập Tiêu đề"/>
            <br><br>
            

            Nội dung: <br>
            <textarea name="message" rows="5"></textarea>

            
            <br><br>
            Hình ảnh: <br>
            <input type="file" name="hinhanh" />
            <br><br>


            <button type="submit" name="btnSend" >Gửi</button>

            {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"> --}}

            {{csrf_field()}}

        </form>
        
    </body>
</html>