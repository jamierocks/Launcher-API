<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Support\Facades\Response;

class NewsController extends Controller {

    /**
     * http://wiki.atlauncher.com/api:news
     *
     * @return Response
     */
    public function v1News() {
        $data = array();

        $i = 0;
        foreach (News::all() as $item) {
            if ($i >= 10) {
                break;
            }
            $dt = new DateTime($item->published_at);
            $data[$i] = array(
                "title" => $item->title,
                "comments" => $item->comments,
                "link" => $item->link,
                "published_at" => $dt->format('U'),
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
    }
}
