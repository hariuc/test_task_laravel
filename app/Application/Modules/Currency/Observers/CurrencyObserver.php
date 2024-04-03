<?php

namespace App\Application\Modules\Currency\Observers;


use App\Application\Modules\Currency\Models\CurrencyModel;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CurrencyObserver
{
    public function creating(CurrencyModel $currencyModel)
    {
        Log::info(__METHOD__);
        $currencyModel->id = (string)Str::uuid();
    }

    /**
     * Handle the CurrencyModel "created" event.
     */
    public function created(CurrencyModel $currencyModel): void
    {
        Log::info(__METHOD__);
    }

    /**
     * Handle the CurrencyModel "updated" event.
     */
    public function updated(CurrencyModel $currencyModel): void
    {
        Log::info(__METHOD__);
    }

    /**
     * Handle the CurrencyModel "deleted" event.
     */
    public function deleted(CurrencyModel $currencyModel): void
    {
        Log::info(__METHOD__);
    }

    /**
     * Handle the CurrencyModel "restored" event.
     */
    public function restored(CurrencyModel $currencyModel): void
    {
        Log::info(__METHOD__);
    }

    /**
     * Handle the CurrencyModel "force deleted" event.
     */
    public function forceDeleted(CurrencyModel $currencyModel): void
    {
        Log::info(__METHOD__);
    }
}
