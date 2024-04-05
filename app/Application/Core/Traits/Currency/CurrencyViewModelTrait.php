<?php

namespace App\Application\Core\Traits\Currency;

use App\Application\Core\ViewModel;
use App\Application\Modules\Currency\ViewModels\Mapping\MappingViewModelEdit;
use Illuminate\Database\Eloquent\Model;

trait CurrencyViewModelTrait
{
    public function getCurrencyViewModelEdit(Model $model): ViewModel
    {
        return (new MappingViewModelEdit())->mapFromModelToViewModel($model);
    }
}
