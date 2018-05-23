<?php

namespace App\External;

use Illuminate\Database\Eloquent\Model;

class ExchangeRate extends Model
{
    protected $connection = 'external';

    protected $guarded = [];
}
