<?php

namespace App\Application\Modules\Currency\ViewModels\Mapping;

use App\Application\Core\Interfaces\MappingViewModelInterface;
use App\Application\Core\ViewModel;
use App\Application\Modules\Currency\ViewModels\Models\CurrencyViewModelEdit;
use DateTime;
use Illuminate\Database\Eloquent\Model;

class ViewModelEditMapping implements MappingViewModelInterface
{

    public function mapFromModelToViewModel(Model $input): ViewModel
    {
        return new CurrencyViewModelEdit(
            $input->id,
            new DateTime($input->date),
            $input->num_code,
            $input->char_code,
            $input->nominal,
            $input->currency_name,
            (float) $input->currency_value
        );
    }
}
