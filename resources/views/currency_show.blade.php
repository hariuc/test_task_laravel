<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
<h1>Currency {{ strtoupper($model_data->currency_name) }}</h1>
<h2>Id: {{ $model_data->id }}</h2>
<h2>Date: {{ (new DateTime($model_data->date))->format("d.m.Y")  }}</h2>
<h2>Numeric code: {{ strtoupper($model_data->num_code) }}</h2>
<h2>Char code: {{ strtoupper($model_data->char_code) }}</h2>
<h2>Nominal: {{ $model_data->nominal }}</h2>
<h2>Currency name: {{ $model_data->currency_name }}</h2>
<h2>Value: {{ number_format($model_data->currency_value, 4, '.')  }}</h2>
</body>
</html>
