<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pack extends Model {

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'packs';

    /**
     * Gets this packs versions
     */
    public function versions() {
        return $this->hasMany('App\PackVersion');
    }
}
