<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table = 'currency';
    protected $fillable = [
        'valueID', 'numCode', 'charCode', 'name', 'value', 'date'
    ];
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'date' => 'datetime:Y-m-d',
    ];
    public static $BASE_URL = 'http://www.cbr.ru/scripts/XML_daily.asp?date_req=';

}
