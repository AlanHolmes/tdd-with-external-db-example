<?php

namespace App;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\App;

abstract class TestingMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (App::environment() == 'testing') {
            $this->up_testing();
        };
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    abstract protected function up_testing();

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (App::environment() == 'testing') {
            $this->down_testing();
        };
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    abstract protected function down_testing();
}
