<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
<div class="container">
    <form method="post" action="{{ route("user.store") }}">
        @csrf
        <div class="user-name-container">
            <label for="user-name-form">Name</label>
            <input id="user-name-form" name="name" type="text">
            @if($errors->has("name"))
                <span>{{ $errors->first("name") }}</span>
            @endif
        </div>
        <div class="email-container">
            <label for="email-form">Email</label>
            <input id="email-form" name="email" type="email">
            @if($errors->has("email"))
                <span>{{ $errors->first("email") }}</span>
            @endif
        </div>
        <div class="password-container">
            <label for="password-form">Password</label>
            <input id="password-form" name="password" type="password">
            @if($errors->has("password"))
                <span>{{ $errors->first("password") }}</span>
            @endif
        </div>
        <div class="register-button-container">
            <button type="submit">
                Register
            </button>
        </div>

    </form>
</div>
</body>
</html>
