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
    <title>Chat User</title>
</head>
<body class="m-0 " style="background-color: #FBB7C7">
    <style>
        .sticky-bottom {
            position: fixed;
            bottom: 0;
            height: 50px;
            width: 100vw;
            background: #BDBBBB;
            }
        .sticky-top {
            position: -webkit-sticky;
            position: sticky;
            top: 0;
            height: 60px;
            width: 100vw;
            }
    </style>
    <div class="row sticky-top text-center" style="background-color: #FAD9D5">
        <div class="logout col pt-2">
            <form action="{{ route('user.logout') }}" method="post">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
        <div class="col">
            <p style="color: #C0CEED; font-family: 'Nerko One', cursive; font-size: 30px;">Teman Cerita Kamu</p>
        </div>
        <div class="col"></div>
    </div>
    <div class="chat px-5 pt-3 pb-5" style="background-color: #FBB7C7">
        @foreach ($chats as $chat)
        @if ($chat->is_admin == 1)
        <div class="text-start">
            <div class="rounded my-2 p-2" style="background-color: #D9D9D9; width:75%">
                {{ $chat->chat }} <br />
                {{ $chat->created_at }}<br /><br />
            </div>
        </div>
        @else    
        <div class="text-end row">
            <div class="col"></div>
            <div class="rounded my-2 p-2 col" style="background-color: #D9D9D9; width:75%">
                {{ $chat->chat }} <br />
                {{ $chat->created_at }}<br /><br />
            </div>
        </div>
        @endif
        @endforeach
    </div>
    <div class="create-chat sticky-bottom p-2 text-center">
        <form action="{{ route('user.create-chat') }}" method="post" autocomplete="off">
            @csrf
            <input type="text" name="chat" id="chat" style="width: 500px">
            <button type="submit">
                <img src="{{URL::asset('/assets/icons8-paper-64.png')}}" alt="paper-plane" style="width:15px">
            </button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        window.scrollTo(0, document.body.scrollHeight);
    </script>
</body>
</html>