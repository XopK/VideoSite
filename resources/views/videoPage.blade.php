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
    <div class="container">
        <p class="fst-normal mt-3">Автор: {{ $user->login }}</p>
        <p class="fw-light">{{ $category->title_category }}</p>
        <div class="video-player  d-flex align-items-center">
            <video controls width="50%">
                <source src="/storage/videos/{{ $video->video }}">
        </div>
        <h1 class="mt-2">{{ $video->title_video }}</h1>
        <div class="like-disslike d-flex align-items-center">
            {{ $video->likesCount() }} <a href="/video/{{ $video->id }}/like"><span
                    class="material-symbols-outlined mx-2">
                    thumb_up
                </span></a>
            {{ $video->disslikesCount() }} <a href="/video/{{ $video->id }}/disslike"><span
                    class="material-symbols-outlined mx-2">
                    thumb_down
                </span></a>
        </div>
        @if (session('like_error'))
            <div class="alert alert-danger alert-dismissible fade show mt-3">
                <div class="alert-text">
                    {{ session('like_error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            </div>
        @endif
        <p class="fw-semibold">{{ $video->description }}</p>
        <div class="comment">
            <h3>Комментарии</h3>
            <form action="/video/{{ $video->id }}/comment" class="d-flex align-items-center" method="POST">
                @csrf
                <input type="text" name="comment" class="form-control" id="exampleFormControlInput1"
                    placeholder="Комментарий">
                <button type="submit" class="btn btn-primary">Отправить</button>
            </form>
            @error('comment')
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @enderror
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show mt-3">
                    <div class="alert-text">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                </div>
            @endif
            @forelse ($comments as $comment)
                <hr>
                <div class="user-comm">
                    <h3>{{ $comment->users_comm->login }}</h3>
                    <p>{{ $comment->comment }}</p>
                </div>
            @empty
                <hr>
                <div class="user-comm">
                    <h1>Пусто</h1>
                </div>
            @endforelse
            <hr>

        </div>
    </div>
</body>

</html>
