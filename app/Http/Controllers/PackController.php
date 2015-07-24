<?php

namespace App\Http\Controllers;

use App\Pack;
use DateTime;
use Illuminate\Support\Facades\Response;

class PackController extends Controller {

    /**
     * http://wiki.atlauncher.com/api:pack#get_pack_pack_name
     *
     * @return Response
     */
    public function v1Pack($pack) {
        $item = Pack::where('safeName', $pack)->first();
        $versions = array();
        $j = 0;
        foreach ($item->versions as $version) {
            $dt = new DateTime($version->published);
            $versions[$j] = array(
                "version" => $version->version,
                "minecraft" => $version->minecraftVersion,
                "published" => $dt->format('U'),
                "__LINK" => "" //TODO:
            );
            $j++;
        }
        $data = array(
            "id" => $item->id,
            "name" => $item->name,
            "safeName" => $item->safeName,
            "type" => $item->type,
            "versions" => $versions,
            "description" => $item->description,
            "supportURL" => $item->supportURL,
            "websiteURL" => $item->websiteURL
        );

        return Response::make(
            json_encode(array(
                "error" => false,
                "code" => 200,
                "message" => null,
                "data" => $data
            ), JSON_PRETTY_PRINT)
        )->header('Content-Type', "application/json");
    }

    /**
     * http://wiki.atlauncher.com/api:pack#get_pack_pack_name_version_name
     *
     * @return Response
     */
    public function v1PackVersion($pack, $version) {
        return Response::make(
            json_encode(array(
                "error" => false,
                "code" => 200,
                "message" => "Coming soon",
                "data" => null
            ), JSON_PRETTY_PRINT)
        )->header('Content-Type', "application/json");
    }
}
