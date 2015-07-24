<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackVersion extends Model {

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'packversions';

    /**
     * Get the pack this version belongs to
     */
    public function pack() {
        return $this->belongsTo('App\Pack');
    }
}
