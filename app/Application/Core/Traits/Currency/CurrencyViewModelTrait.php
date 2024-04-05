<?php

namespace App\Application\Core\Traits\Currency;

use App\Application\Core\ViewModel;
use App\Application\Modules\Currency\ViewModels\Mapping\{ViewModelEditMapping, ViewModelListMapping};
use Illuminate\Database\Eloquent\Model;

trait CurrencyViewModelTrait
{
    public function getCurrencyViewModelEdit(Model $model): ViewModel
    {
        return (new ViewModelEditMapping())->mapFromModelToViewModel($model);
    }

    public function getCurrencyViewModelList(Model $model): ViewModel
    {
        return (new ViewModelListMapping())->mapFromModelToViewModel($model);
    }
}
