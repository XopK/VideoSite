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
    <title>Админ панель</title>
</head>

<body>
    <div class="container">
        <h1>Админ панель</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @forelse ($videos as $video)
                <div class="col">
                    <div class="card">
                        <a href="/video/{{ $video->id }}" style="text-decoration: none">
                            <img src="/storage/preview/{{ $video->preview }}" class="card-img-top"
                                alt="{{ $video->preview }}">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $video->title_video }}</h5>
                            <p class="card-text">{{ $video->users->login }}</p>
                            <form action="">
                                <select class="form-select form-select-sm" name="status" aria-label="Small select example">
                                    <option selected>Выберите статус</option>
                                    <option value="1">Без ограничений</option>
                                    <option value="2">Нарушение</option>
                                    <option value="3">Теневой бан</option>
                                    <option value="4">Бан</option>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <h1>Пусто</h1>
            @endforelse
        </div>
    </div>
</body>

</html>
