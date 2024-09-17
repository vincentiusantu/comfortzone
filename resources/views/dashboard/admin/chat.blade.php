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
    <title>List Chat</title>
</head>
<body style="background-color: #CDEDDD">
    <style>
        .sticky-top {
            position: -webkit-sticky;
            position: sticky;
            top: 0;
            height: 60px;
            width: 100vw;
            }
    </style>
    <div class="row sticky-top text-center" style="background-color: #A4C8AB">
        <div class="logout col pt-2">
            <form action="{{ route('admin.logout') }}" method="post">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
        <div class="col">
            <p style="color: #C0CEED; font-family: 'Nerko One', cursive; font-size: 30px;">Teman Cerita Kamu</p>
        </div>
        <div class="col"></div>
    </div>
    <div class="list-chat">
        <?php foreach ($users as $user):?>
        <a href="/admin/chat/{{$user->id}}" style="text-decoration:none; color: black;">
            <h3 class="mx-5">
                <?php echo $user->name; ?>
            </h3>
            <p class="mx-5">
                <?php echo $user->chat; ?>
            </p>
        </a>
        <hr>
        <?php endforeach; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>