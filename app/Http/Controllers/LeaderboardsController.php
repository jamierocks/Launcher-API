<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;

class LeaderboardsController extends Controller {

    /**
     * http://wiki.atlauncher.com/api:leaderboards#get_leaderboards_global_limit
     *
     * @return Response
     */
    public function v1Global() {
        return LeaderboardsController::v1GlobalAmount(30);
    }

    /**
     * http://wiki.atlauncher.com/api:leaderboards#get_leaderboards_global_limit
     *
     * @return Response
     */
    public function v1GlobalAmount($amount) {
        return Response::make(
            json_encode(array(
                "error" => false,
                "code" => 200,
                "message" => null,
                "data" => $amount
            ), JSON_PRETTY_PRINT)
        )->header('Content-Type', "application/json");
    }
}
