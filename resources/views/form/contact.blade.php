<!doctype html>
<html lang="vi">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class=" col-lg-6">
                    <h2>Contact Form</h2>

                    <form method="post" action="{{route('contact')}}">

                        Họ tên: <br>
                        <input type="text" class="form-control" name="fullname" placeholder="Nhập họ tên"/>
                        <br>

                        Email: <br>
                        <input type="email" class="form-control" name="email" placeholder="Nhập email"/>
                        <br>

                        Tiêu đề: <br>
                        <input type="text" class="form-control" name="title" placeholder="Nhập Tiêu đề"/>
                        <br>
                        

                        Nội dung: <br>
                        <textarea name="message" class="form-control" rows="5"></textarea>

                        
                        <br>
                        <input type="file" name="hinhanh" />
                        <br><br>

                        <button type="submit" class="btn btn-primary" name="btnSend" >Gửi</button>

                        {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"> --}}

                        {{csrf_field()}}

                    </form> 
                </div>
            </div>
        </div>
        
        
    </body>
</html>