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
        <h1 class="mt-3">Добавить видео</h1>
        <form action="{{route('createVideo')}}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="mb-3">
                <label for="videoTitle" class="form-label">Название видео</label>
                <input type="text" name="title_video" class="form-control" id="videoTitle"
                    placeholder="Введите название ролика">
                @error('title_video')
                    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @enderror

            </div>
            <div class="mb-3">
                <label for="videoFile" class="form-label">Видео</label>
                <input type="file" name="video" class="form-control" id="videoFile">
                @error('video')
                    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="videoDescription" class="form-label">Описание видео</label>
                <textarea class="form-control" name="description" id="videoDescription" rows="3"
                    placeholder="Введите описание ролика"></textarea>
                @error('description')
                    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="previewImage" class="form-label">Превью</label>
                <input type="file" name="preview" class="form-control" id="previewImage">
                @error('preview')
                    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="categorySelect" class="form-label">Выбор категории</label>
                <select name="category" class="form-select" id="categorySelect">
                    <option selected disabled>Выберите категорию</option>
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->title_category }}</option>
                    @endforeach

                </select>
                @error('category')
                    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Отправить</button>
            @if (session('success'))
            <div class="alert alert-success alert-dismissible mt-3">
                <div class="alert-text">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            </div>
        @endif
        </form>
    </div>
</body>

</html>
