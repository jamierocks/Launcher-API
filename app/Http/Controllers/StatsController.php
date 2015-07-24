<?php

namespace App\Http\Controllers;

use App\Stat;
use Illuminate\Support\Facades\Response;

class StatsController extends Controller {

    /**
     * http://wiki.atlauncher.com/api:stats#get_stats_downloads
     *
     * @return Response
     */
    public function v1Downloads() {
        $exe = Stat::where('key', 'downloads-exe')->value('value');
        $jar = Stat::where('key', 'downloads-jar')->value('value');
        $zip = Stat::where('key', 'downloads-zip')->value('value');
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
    }

    /**
     * http://wiki.atlauncher.com/api:stats#get_stats_downloads_all
     *
     * @return Response
     */
    public function v1DownloadsAll() {
        $exe = Stat::where('key', 'downloads-exe')->value('value');
        $jar = Stat::where('key', 'downloads-jar')->value('value');
        $zip = Stat::where('key', 'downloads-zip')->value('value');
        $all = $exe + $jar + $zip;

        return Response::make(
            json_encode(array(
                "error" => false,
                "code" => 200,
                "message" => null,
                "data" => $all
            ), JSON_PRETTY_PRINT)
        )->header('Content-Type', "application/json");
    }

    /**
     * http://wiki.atlauncher.com/api:stats#get_stats_downloads_exe
     *
     * @return Response
     */
    public function v1DownloadsExe() {
        $exe = Stat::where('key', 'downloads-exe')->value('value');

        return Response::make(
            json_encode(array(
                "error" => false,
                "code" => 200,
                "message" => null,
                "data" => $exe
            ), JSON_PRETTY_PRINT)
        )->header('Content-Type', "application/json");
    }

    /**
     * http://wiki.atlauncher.com/api:stats#get_stats_downloads_jar
     *
     * @return Response
     */
    public function v1DownloadsJar() {
        $jar = Stat::where('key', 'downloads-jar')->value('value');

        return Response::make(
            json_encode(array(
                "error" => false,
                "code" => 200,
                "message" => null,
                "data" => $jar
            ), JSON_PRETTY_PRINT)
        )->header('Content-Type', "application/json");
    }

    /**
     * http://wiki.atlauncher.com/api:stats#get_stats_downloads_zip
     *
     * @return Response
     */
    public function v1DownloadsZip() {
        $zip = Stat::where('key', 'downloads-zip')->value('value');

        return Response::make(
            json_encode(array(
                "error" => false,
                "code" => 200,
                "message" => null,
                "data" => $zip
            ), JSON_PRETTY_PRINT)
        )->header('Content-Type', "application/json");
    }
}
