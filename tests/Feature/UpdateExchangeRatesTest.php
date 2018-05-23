<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\External\ExchangeRate;
use App\Currency;

class UpdateExchangeRatesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_update_the_exchange_rates_from_and_external_database()
    {
        $currencyGBP = Currency::create([
            'name' => 'Britsh Pounds',
            'code' => 'GBP',
            'default' => true,
            'exchange_rate' => 1,
        ]);

        $currencyUSD = Currency::create([
            'name' => 'US Dollars',
            'code' => 'USD',
            'default' => false,
            'exchange_rate' => 1.4,
        ]);

        $currencyEuro = Currency::create([
            'name' => 'Euros',
            'code' => 'EUR',
            'default' => false,
            'exchange_rate' => 1.2,
        ]);

        ExchangeRate::create([
            'code_from' => 'GBP',
            'code_to' => 'USD',
            'exchange_rate' => 1.33,
        ]);

        ExchangeRate::create([
            'code_from' => 'GBP',
            'code_to' => 'EUR',
            'exchange_rate' => 1.14,
        ]);

        $this->artisan('currencies:update-exchange-rates');

        $this->assertEquals(1, $currencyGBP->fresh()->exchange_rate);
        $this->assertEquals(1.33, $currencyUSD->fresh()->exchange_rate);
        $this->assertEquals(1.14, $currencyEuro->fresh()->exchange_rate);
    }
}
