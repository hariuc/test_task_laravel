<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
</head>
<body>
<h1>Currency update form</h1>
<div class="currency-edit-content">
    <form method="post" action="{{ route('currency.update.item', ["id" => $model_data->getId()]) }}">
        @method('PUT')
        @csrf
        <div class="date-container">
            <label for="date-field">Date</label>
            <input id="date-field" name="date" type="date" placeholder="Date of the currency"
                   value="{{ $model_data->getDate()->format("Y-m-d") }}">
            @if($errors->has("date"))
                <span>{{ $errors->first("date") }}</span>
            @endif
        </div>
        <br>
        <div class="numeric-code-container">
            <label for="numeric-code-field">Numeric code</label>
            <input id="numeric-code-field" name="num_code" value="{{ $model_data->getNumCode() }}" type="text"
                   maxlength="3" placeholder="Enter numeric code (max 3 characters)">
            @if($errors->has("num_code"))
                <span>{{ $errors->first("num_code") }}</span>
            @endif
        </div>
        <br>
        <div class="char-code-container">
            <label for="char-code-field">Char code</label>
            <input id="char-code-field" name="char_code" value="{{ $model_data->getCharCode() }}" type="text"
                   maxlength="3" placeholder="Enter char code (max 3 characters)">
            @if($errors->has("char_code"))
                <span>{{ $errors->first("char_code") }}</span>
            @endif
        </div>
        <br>
        <div class="nominal-container">
            <label for="nominal-field">Nominal</label>
            <input id="nominal-field" name="nominal" value="{{ $model_data->getNominal() }}" type="text"
                   placeholder="Enter nominal">
            @if($errors->has("nominal"))
                <span>{{ $errors->first("nominal") }}</span>
            @endif
        </div>
        <br>
        <div class="currency-container">
            <label for="currency-field">Currency name</label>
            <input id="currency-field" name="currency_name" value="{{ $model_data->getName() }}" type="text"
                   placeholder="Enter currency name">
            @if($errors->has("currency_name"))
                <span>{{ $errors->first("currency_name") }}</span>
            @endif
        </div>
        <br>
        <div class="value-container">
            <label for="value-field">Value</label>
            <input id="value-field" name="currency_value" value="{{ $model_data->getValue() }}" type="number"
                   placeholder="Enter currency value">
            @if($errors->has("currency_value"))
                <span>{{ $errors->first("currency_value") }}</span>
            @endif
        </div>
        <br>
        <div class="save-button-container">
            <button type="submit">
                Save
            </button>
        </div>
    </form>
</div>
</body>
</html>
