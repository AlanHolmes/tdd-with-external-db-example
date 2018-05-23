<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\TestingMigration;

class CreateExternalExchangeRatesTable extends TestingMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up_testing()
    {
        Schema::connection('external')->create('exchange_rates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code_from', 3);
            $table->string('code_to', 3);
            $table->float('exchange_rate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down_testing()
    {
        Schema::connection('external')->dropIfExists('exchange_rates');
    }
}
