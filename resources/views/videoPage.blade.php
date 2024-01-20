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
    <title>VideoHost</title>
</head>

<body>
    <x-header></x-header>
    <div class="container">
        <p class="fst-normal mt-3">{{$user->login}}</p>
        <div class="video-player  d-flex justify-content-center align-items-center">
            <video controls width="100%">
                <source src="/storage/videos/{{ $video->video }}">
        </div>
        <h1 class="mt-2">{{$video->title_video}}</h1>
        <p class="fw-light">{{$category->title_category}}</p>
        <p class="fw-semibold">{{$video->description}}</p>
    </div>
</body>

</html>
