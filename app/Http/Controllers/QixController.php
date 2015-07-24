<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class QixController extends Controller
{

    /**
     * Returns the current systems uptime in seconds.
     *
     * Thanks to RyanTheAllmighty for this method
     *
     * @return int
     */
    public static function getSystemUptime() {
        $fh = fopen('/proc/uptime', 'r');
        $line = fgets($fh);
        $uptime = (int)explode('.', $line)[0];
        fclose($fh);
        return $uptime;
    }
}
