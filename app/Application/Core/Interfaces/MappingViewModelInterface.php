<?php

namespace App\Application\Core\Interfaces;

use App\Application\Core\ViewModel;
use Illuminate\Database\Eloquent\Model;

interface MappingViewModelInterface
{
    public function mapFromModelToViewModel(Model $input): ViewModel;
}
