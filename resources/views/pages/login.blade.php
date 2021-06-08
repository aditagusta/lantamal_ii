<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
        body {
            background-image: url("{{asset('logo/IMG-20210429-WA0015.jpg')}}");
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
  </head>
  <body>
        <div class="container">
            <div class="row" style="margin-top: 80px">
                <div class="col-sm-12 col-md-6 offset-md-2">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <img src="{{asset('logo/logo2-removebg-preview.png')}}" alt="" style="height: 300px;width:300px">
                        </div>
                        <div class="col-sm-12 col-md-6">
                            @if ($message = Session::get('status'))
                            <div class="alert alert-success" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @endif

                            @if ($message = Session::get('error'))
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @endif
                            <center><h4>Form Login</h4></center>
                            <hr>
                            <form action="{{route('postlogin')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" name="username" id="" class="form-control" placeholder="Masukkan Username...">
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" name="password" id="" class="form-control" placeholder="Masukkan Password...">
                                </div>
                                <br>
                                <button class="btn btn-primary" type="submit" style="width:100%">Masuk</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>
