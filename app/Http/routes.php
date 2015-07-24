<?php

Route::get('/', function () {
    return Response::make(
        json_encode(array(
            "error" => false,
            "code" => 200,
            "message" => null,
            "data" => array (
                "load" => sys_getloadavg()[0],
                "memory_use" => memory_get_usage(),
                "uptime" => 999 // use QixController::getSystemUptime() on production
            )
        ), JSON_PRETTY_PRINT)
    )->header('Content-Type', "application/json");
});

// V1
/////

Route::get('/v1/stats/downloads/', function () {

});

Route::get('/v1/stats/downloads/all/', function () {

});

Route::get('/v1/stats/downloads/exe/', function () {

});

Route::get('/v1/stats/downloads/zip/', function () {

});

Route::get('/v1/stats/downloads/jar/', function () {

});


