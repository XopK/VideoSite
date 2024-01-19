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
    <style>
        .form-signup input {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <x-header></x-header>
    <div class="container">
        <h1 class="my-3 text-center">Регистрация</h1>
        <form style="margin: 0 auto" class="w-50 form-signup" action="{{ route('signup_valid') }}" method="POST">
            @csrf
            <div class="form-floating">
                <input type="text" name="login" class="form-control" id="floatinglogin" placeholder="Никнейм">
                <label for="floatinglogin">Никнейм</label>
                @error('login')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="email" name="email" class="form-control" id="floatingemail" placeholder="Почта">
                <label for="floatingemail">Почта</label>
                @error('email')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Пароль">
                <label for="floatingPassword">Пароль</label>
                @error('password')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="password" name="confirm_password" class="form-control" id="floatingPassword"
                    placeholder="Подтвердите пароль">
                <label for="floatingPassword">Подтвердите пароль</label>
                @error('confirm_password')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @enderror
            </div>

            <button class="btn btn-success mt-3" type="submit">Регистрация</button>
        </form>
    </div>
</body>

</html>
