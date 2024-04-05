<?php

namespace App\Application\Modules\Currency\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class CurrencyModel extends Model
{
    use HasFactory;

    protected $table      = 'currencies';
    protected $primaryKey = 'id';
    protected $keyType    = 'string';

    protected $hidden = [
        "created_at",
        "updated_at",
    ];


    public static function updateModel(Request $request, Model $model): bool
    {
        $params = $request->input();
        $model->date = $params['date'];
        $model->num_code = strtoupper($params["num_code"]);
        $model->char_code = strtoupper($params["char_code"]);
        $model->nominal = $params["nominal"];
        $model->currency_name = $params["currency_name"];
        $model->currency_value = $params["currency_value"];
        return $model->updateOrFail();
    }
}
