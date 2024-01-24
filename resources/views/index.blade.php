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
        <h1 class="my-3">Главная</h1>
        <div class="block-videos d-flex flex-wrap gap-5">
            @forelse ($videos as $item)
                @php
                    $diff = $item->created_at->diffForHumans();
                @endphp
                <div class="card" style="width: 18rem;">
                    <img src="/storage/preview/{{ $item->preview }}" class="card-img-top" alt="{{ $item->preview }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->title_video }}</h5>
                        <h5 class="fs-6">{{ $item->users->login }}</h5>
                        <p class="card-text">{{ $diff }}</p>
                        <a href="/video/{{ $item->id }}" class="btn btn-primary">Смотреть</a>
                    </div>
                </div>
            @empty
                <h1>Пусто</h1>
            @endforelse

        </div>
    </div>
</body>

</html>
