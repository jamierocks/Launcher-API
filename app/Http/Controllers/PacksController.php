<?php

namespace App\Http\Controllers;

use App\Pack;
use Illuminate\Support\Facades\Response;

class PacksController extends Controller {

    /**
     * http://wiki.atlauncher.com/api:packs#get_packs_simple
     *
     * @return Response
     */
    public function v1Simple() {
        $data = array();

        $i = 0;
        foreach (Pack::all() as $item) {
            $data[$i] = array(
                "id" => $item->id,
                "name" => $item->name,
                "safeName" => $item->safeName,
                "type" => $item->type,
                "__LINK" => "" // TODO:
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
    }

    /**
     * http://wiki.atlauncher.com/api:packs#get_packs_full_all
     *
     * @return Response
     */
    public function v1Full() {
        $data = array();

        $i = 0;
        foreach (Pack::all() as $item) {
            $data[$i] = array(
                "id" => $item->id,
                "name" => $item->name,
                "safeName" => $item->safeName,
                "type" => $item->type,
                "versions" => "", //TODO:
                "description" => $item->description,
                "supportURL" => $item->supportURL,
                "websiteURL" => $item->websiteURL
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
    }
}
