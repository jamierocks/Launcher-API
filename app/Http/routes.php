<?php

use App\News;

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

Route::get('/v1/news', function () {
    $data = array();

    $i = 0;
    foreach (News::all() as $item) {
        if ($i >= 10) {
            break;
        }
        $data[$i] = array(
            "title" => $item->title,
            "comments" => $item->comments,
            "link" => $item->link,
            "published_at" => $item->published_at,
            "content" => $item->content
        );
        $i++;
    }

    return Response::make(
        json_encode(array(
            "error" => false,
            "code" => 200,
            "message" => null,
            "data" => $data
        ), JSON_PRETTY_PRINT)
    )->header('Content-Type', "application/json");
});

Route::get('/v1/stats/downloads', function () {
    $exe = DB::table('stats')->where('key', 'downloads-exe')->value('value');
    $jar = DB::table('stats')->where('key', 'downloads-jar')->value('value');
    $zip = DB::table('stats')->where('key', 'downloads-zip')->value('value');
    $all = $exe + $jar + $zip;

    return Response::make(
        json_encode(array(
            "error" => false,
            "code" => 200,
            "message" => null,
            "data" => array (
                "all" => $all,
                "exe" => $exe,
                "jar" => $jar,
                "zip" => $zip
            )
        ), JSON_PRETTY_PRINT)
    )->header('Content-Type', "application/json");
});

Route::get('/v1/stats/downloads/all', function () {
    $exe = DB::table('stats')->where('key', 'downloads-exe')->value('value');
    $jar = DB::table('stats')->where('key', 'downloads-jar')->value('value');
    $zip = DB::table('stats')->where('key', 'downloads-zip')->value('value');
    $all = $exe + $jar + $zip;

    return Response::make(
        json_encode(array(
            "error" => false,
            "code" => 200,
            "message" => null,
            "data" => $all
        ), JSON_PRETTY_PRINT)
    )->header('Content-Type', "application/json");
});

Route::get('/v1/stats/downloads/exe', function () {
    $exe = DB::table('stats')->where('key', 'downloads-exe')->value('value');

    return Response::make(
        json_encode(array(
            "error" => false,
            "code" => 200,
            "message" => null,
            "data" => $exe
        ), JSON_PRETTY_PRINT)
    )->header('Content-Type', "application/json");
});

Route::get('/v1/stats/downloads/jar', function () {
    $jar = DB::table('stats')->where('key', 'downloads-jar')->value('value');

    return Response::make(
        json_encode(array(
            "error" => false,
            "code" => 200,
            "message" => null,
            "data" => $jar
        ), JSON_PRETTY_PRINT)
    )->header('Content-Type', "application/json");
});

Route::get('/v1/stats/downloads/zip', function () {
    $zip = DB::table('stats')->where('key', 'downloads-zip')->value('value');

    return Response::make(
        json_encode(array(
            "error" => false,
            "code" => 200,
            "message" => null,
            "data" => $zip
        ), JSON_PRETTY_PRINT)
    )->header('Content-Type', "application/json");
});
