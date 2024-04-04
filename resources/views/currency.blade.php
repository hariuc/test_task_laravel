<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
<div class="title">
    <h1>Currency list (current page = {{ $currency_data->currentPage() ?? 1 }} of {{ $currency_data->lastPage() }})</h1>
</div>

<div class="content">
    <table>
        <tr>
            <th><h2>id</h2></th>
            <th><h2>Date</h2></th>
            <th><h2>Numeric code</h2></th>
            <th><h2>Char code</h2></th>
            <th><h2>Nominal</h2></th>
            <th><h2>Currency name</h2></th>
            <th><h2>Value</h2></th>
        </tr>
        @foreach($currency_data->items() as $currency)
            <tr>
                <td><a href="{{ route("currency.show", ["id" => $currency->id]) }}">{{ $currency->id }}</a></td>
                <td><h3>{{ (new DateTime($currency->date))->format("d.m.Y") }}</h3></td>
                <td><h3>{{ strtoupper($currency->num_code) }}</h3></td>
                <td><h3>{{ strtoupper($currency->char_code) }}</h3></td>
                <td><h3>{{ $currency->nominal }}</h3></td>
                <td class="currency-name"><h3>{{ $currency->currency_name }}</h3></td>
                <td class="currency-value"><h3>{{ number_format($currency->currency_value, 4, '.') }}</h3></td>
            </tr>
        @endforeach
    </table>

</div>

</body>
</html>
