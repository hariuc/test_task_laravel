<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
<form method="post" action="{{ route("user.authenticate") }}">
    @csrf
    <div class="email-container">
        <label for="email-form">Email</label>
        <input id="email-form" name="email" type="email" placeholder="Email">
        @if($errors->has("email"))
            <span>{{ $errors->first("email") }}</span>
        @endif
    </div>
    <div class="password-container">
        <label for="password-form">Password</label>
        <input id="password-form" name="password" type="password" placeholder="Password">
        @if($errors->has("password"))
            <span>{{ $errors->first("password") }}</span>
        @endif
    </div>
    <div class="register-button-container">
        <button type="submit">
            Login
        </button>
    </div>

</form>
</body>
</html>
