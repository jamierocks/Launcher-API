<?php

Route::get('/', function () {
    return Response::make(
        json_encode(array(
            "error" => false,
            "code" => 200,
            "message" => null,
            "data" => null
        ), JSON_PRETTY_PRINT)
    )->header('Content-Type', "application/json");
});


