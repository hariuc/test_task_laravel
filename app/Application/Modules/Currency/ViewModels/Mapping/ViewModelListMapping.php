<?php

namespace App\Application\Modules\Currency\ViewModels\Mapping;


use App\Application\Core\Interfaces\MappingViewModelInterface;
use App\Application\Core\ViewModel;
use App\Application\Modules\Currency\ViewModels\Models\CurrencyViewModelList;
use DateTime;
use Illuminate\Database\Eloquent\Model;

class ViewModelListMapping implements MappingViewModelInterface
{

    public function mapFromModelToViewModel(Model $input): ViewModel
    {
        return new CurrencyViewModelList(
            $input->id,
            new DateTime($input->date),
            $input->num_code,
            $input->char_code,
            $input->nominal,
            $input->currency_name,
            (float)$input->currency_value
        );
    }
}
