<?php

namespace App\Http\Controllers;

use App\Pack;
use DateTime;
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
            $data[$i] = array(
                "id" => $item->id,
                "name" => $item->name,
                "safeName" => $item->safeName,
                "type" => $item->type,
                "versions" => $versions,
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

    /**
     * http://wiki.atlauncher.com/api:packs#get_packs_full_public
     *
     * @return Response
     */
    public function v1Public() {
        $data = array();

        $i = 0;
        foreach (Pack::where('type', 'public')->get() as $item) {
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
            $data[$i] = array(
                "id" => $item->id,
                "name" => $item->name,
                "safeName" => $item->safeName,
                "type" => $item->type,
                "versions" => $versions,
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

    /**
     * http://wiki.atlauncher.com/api:packs#get_packs_full_semipublic
     *
     * @return Response
     */
    public function v1SemiPublic() {
        $data = array();

        $i = 0;
        foreach (Pack::where('type', 'semipublic')->get() as $item) {
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
            $data[$i] = array(
                "id" => $item->id,
                "name" => $item->name,
                "safeName" => $item->safeName,
                "type" => $item->type,
                "versions" => $versions,
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

    /**
     * http://wiki.atlauncher.com/api:packs#get_packs_full_private
     *
     * @return Response
     */
    public function v1Private() {
        $data = array();

        $i = 0;
        foreach (Pack::where('type', 'private')->get() as $item) {
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
            $data[$i] = array(
                "id" => $item->id,
                "name" => $item->name,
                "safeName" => $item->safeName,
                "type" => $item->type,
                "versions" => $versions,
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
