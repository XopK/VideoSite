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
        <div class="d-flex justify-content-between align-items-center">
            <h1>Админ панель</h1>
            <a href="{{ Route('exit') }}" class="btn btn-danger">Выход</a>
        </div>
        @if (session('status'))
            <div class="alert alert-danger alert-dismissible mt-3">
                <div class="alert-text">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success alert-dismissible mt-3">
                <div class="alert-text">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            </div>
        @endif
        <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">
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
                            <form action="/admin/updateStatus/{{ $video->id }}" method="POST">
                                @csrf
                                <select class="form-select form-select-sm" name="status"
                                    aria-label="Small select example">
                                    <option disabled selected>{{ $video->status->title_status }}</option>
                                    @foreach ($statuses as $status)
                                        @if ($status->id == $video->status->id)
                                        @else
                                            <option value="{{ $status->id }}">{{ $status->title_status }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-primary mt-2">Обновить</button>
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
