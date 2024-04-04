<?php

namespace App\Livewire;

use App\Application\Modules\Currency\Models\CurrencyModel;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;
use Livewire\Component;

class CurrencyComponent extends Component
{
    use InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return CurrencyModel::query();
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('id'),
            TextColumn::make('date'),
            TextColumn::make('num_code'),
            TextColumn::make('char_code'),
            TextColumn::make('char_code'),
            TextColumn::make('nominal'),
            TextColumn::make('currency_value'),
        ];
    }

    public function render(): View
    {
        return view('livewire.currency-component');
    }
}
