<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>VideoHost</title>
</head>

<body>
    <x-header></x-header>
    <div class="container d-flex">
        <div class="left">
            <p class="fst-normal mt-3">Автор: {{ $user->login }}</p>
            <p class="fw-light">{{ $category->title_category }}</p>
            <div class="video-player  d-flex align-items-center">
                <video controls width="100%">
                    <source src="/storage/videos/{{ $video->video }}">
            </div>
            <h1 class="mt-2">{{ $video->title_video }}</h1>
            <div class="like-disslike d-flex align-items-center">
                0 <a href=""><span class="material-symbols-outlined mx-2">
                        thumb_up
                    </span></a>
                0 <a href=""><span class="material-symbols-outlined mx-2">
                        thumb_down
                    </span></a>
            </div>
            <p class="fw-semibold">{{ $video->description }}</p>
        </div>
        <div class="right mx-5">
            
            <div class="d-flex align-items-end flex-column" style="margin-top: 26%">
                <h1>Комментарии</h1>
                
                <div class="comment-user">
                    <hr>
                    <div class="message">
                        <p>danya22: bnffngnfnfgn</p>
                    </div>

                </div>
                <hr>
                <form action="" class="d-flex">
                    <input class="form-control" type="text" placeholder="Default input"
                        aria-label="default input example">
                    <button type="submit" class="btn btn-success">Отправить</button>
                </form>
            </div>

        </div>
</body>

</html>
