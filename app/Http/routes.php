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

/////
// V1
/////

// Leaderboards
///////////////

Route::get('/v1/leaderboards/global', 'LeaderboardsController@v1Global');
Route::get('/v1/leaderboards/global/{amount}', 'LeaderboardsController@v1GlobalAmount');

// News
///////

Route::get('/v1/news', 'NewsController@v1News');

// Pack
///////

Route::get('/v1/pack/{name}', 'PackController@v1Pack');
Route::get('/v1/pack/{name}/{version}', 'PackController@v1PackVersion');

// Packs
////////

Route::get('/v1/packs/simple', 'PacksController@v1Simple');
Route::get('/v1/packs/full/all', 'PacksController@v1Full');
Route::get('/v1/packs/full/public', 'PacksController@v1Public');
Route::get('/v1/packs/full/semipublic', 'PacksController@v1SemiPublic');
Route::get('/v1/packs/full/private', 'PacksController@v1Private');

// Stats
////////

Route::get('/v1/stats/downloads', 'StatsController@v1Downloads');
Route::get('/v1/stats/downloads/all', 'StatsController@v1DownloadsAll');
Route::get('/v1/stats/downloads/exe', 'StatsController@v1DownloadsExe');
Route::get('/v1/stats/downloads/jar', 'StatsController@v1DownloadsJar');
Route::get('/v1/stats/downloads/zip', 'StatsController@v1DownloadsZip');
