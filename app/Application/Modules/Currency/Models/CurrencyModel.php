<?php

namespace App\Application\Modules\Currency\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrencyModel extends Model
{
    use HasFactory;

    protected $table      = 'currencies';
    protected $primaryKey = 'id';
    protected $keyType    = 'string';
}
