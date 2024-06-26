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
    @if($is_auth)
        <h2>Hello {{ Auth::user()->name }}</h2>
        <div class="logout-content">
            <form method="post" action="{{ route("user.logout") }}">
                @csrf
                <div class="logout-button-container">
                    <button type="submit">
                        Logout
                    </button>
                </div>
            </form>
        </div>
    @else
        <a href="{{ route("register") }}">Register</a>
        <a href="{{ route("login") }}">Login</a>
    @endif

    <h1>Currency list
        @if(count($view_model) > 0)
            (current page = {{ $currency_data->currentPage() ?? 1 }} of {{ $currency_data->lastPage() }})
        @endif
    </h1>
</div>

<div class="search-bar">
    <form method="get" action="{{ route("currency.list") }}">
        <label for="date-field">Enter date</label>
        <input id="date-field" name="date" type="date" placeholder="Date">
        <label for="numeric-code-field">Enter numeric code</label>
        <input id="numeric-code-field" name="num_code" type="text" placeholder="Numeric code" maxlength="3">
        <label for="char-code-field">Enter char code</label>
        <input id="char-code-field" name="char_code" type="text" placeholder="Char code" maxlength="3">
        <input type="submit">
    </form>
</div>
<p></p>
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
            @if($is_auth)
                @if(count($view_model) > 0)
                    <th><h2></h2></th>
                @endif
            @endif
        </tr>
        @foreach($view_model as $currency)
            <tr>
                <td>
                    <a href="{{ route("currency.show.item", ["id" => $currency->getId()]) }}">{{ $currency->getId() }}</a>
                </td>
                <td><h3>{{ $currency->getDate()->format("Y-m-d") }}</h3></td>
                <td><h3>{{ strtoupper($currency->getNumCode()) }}</h3></td>
                <td><h3>{{ strtoupper($currency->getCharCode()) }}</h3></td>
                <td><h3>{{ $currency->getNominal() }}</h3></td>
                <td class="currency-name"><h3>{{ $currency->getName() }}</h3></td>
                <td class="currency-value"><h3>{{ number_format($currency->getValue(), 4, '.') }}</h3></td>
                @if($is_auth)
                    @if(count($view_model) > 0)
                        <div class="edit-button-container">
                            <td><a href="{{ route("currency.edit.item", ["id" => $currency->getId()]) }}">Edit</a></td>
                        </div>
                    @endif
                @endif
            </tr>
        @endforeach
    </table>


    @if(count($view_model) > 0)
        @foreach($paginator_links[0] as $key => $value)
            <a href="{{ $value }}" style="margin-right: 6px"> {{ $key }} </a>
        @endforeach
        <br>
        <br>
        <br>
        <br>
    @endif
</div>

</body>
</html>
