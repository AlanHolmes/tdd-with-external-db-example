<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Currency;
use App\External\ExchangeRate;

class UpdateExchangeRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currencies:update-exchange-rates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates the exchange rates from the external centeral database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $defaultCurrency = Currency::where('default', 1)->first();
        $currenciesToUpdate = Currency::where('default', 0)->get();

        $currenciesToUpdate->each(function ($currency) use ($defaultCurrency) {
            $externalExchangeRate = ExchangeRate::where('code_from', $defaultCurrency->code)
                ->where('code_to', $currency->code)
                ->first();

            $currency->update([
                'exchange_rate' => $externalExchangeRate->exchange_rate,
            ]);
        });
    }
}
