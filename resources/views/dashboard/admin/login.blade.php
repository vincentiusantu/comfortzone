<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Login Admin</title>
</head>
<body style="background-color: #FAD9D5">
    <div class="container text-center mt-3">
        <div class="header row">
            <div class="logo-sanmar col">
                <img src="{{URL::asset('/assets/logo-sanmar.png')}}" alt="logo-sanmar" style="width: 100px">
            </div>
            <div class="title col">
                <div>
                    <p style="color: #FDB5B5; font-family: 'Nerko One', cursive; font-size: 40px;">Comfort Zone</p>
                    <p style="color: #C0CEED; font-family: 'Nerko One', cursive; font-size: 30px;">Teman Cerita Kamu</p>
                </div>
            </div>
            <div class="col">

            </div>
        </div>
        <div class="logo-comfort-zone">
            <img src="{{URL::asset('/assets/logo-comfortzone.png')}}" alt="logo-comfort-zone" style="width: 230px; height: 230px;" class="rounded-circle">
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="login-form-container rounded m-3 p-3 col" style="background-color: #C0CEED; width: 400px;">
                <div class="sign-in">
                    <p>Sign In Admin</p>
                </div>
                <div class="login-form">
                    <form action="{{ route('admin.login-post') }}" method="POST">
                        {{ csrf_field() }}
                        <label for="name">Nama: </label><br>
                        <input type="text" name="name" id="name"><br>
                        <label for="password">Password: </label><br>
                        <input type="password" name="password" id="password"><br>
                        <button type="submit" class="mt-1">Sign In</button>
                    </form>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>