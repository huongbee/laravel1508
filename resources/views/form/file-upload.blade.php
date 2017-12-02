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
        <a href="https://www.google.com.vn">google</a>
        <h2>Upload File</h2>
        <form method="post" action="{{route('upload-file')}}" enctype="multipart/form-data"> 

            Hình ảnh: 
            <input type="file" name="hinhanh" />
            <br><br>

            <button type="submit" name="btnSend" >Upload</button>
           
         {{csrf_field()}}

        </form>
    </body>
</html>