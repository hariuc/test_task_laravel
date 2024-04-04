<?php

namespace App\Application\Modules\Currency\Commands;

use App\Application\Modules\Currency\Repositories\CurrencyRepository;
use App\Application\Modules\Currency\Services\CurrencyService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CurrencyUploadFromBNMCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:currency-upload-from-bnm-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Downloading currencies from the website BNM';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        Log::info(__METHOD__);
        $currencyService = new CurrencyService(new CurrencyRepository());
        $currencyService->getAllCurrencyFromServer();

    }
}
