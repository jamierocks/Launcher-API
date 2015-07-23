<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stat extends Model {

    /**
     * This statistic's key (eg pack-vanilla)
     *
     * @var string
     */
    public $key;

    /**
     * This statistic's value (eg 200)
     *
     * @var integer
     */
    public $value;
}
