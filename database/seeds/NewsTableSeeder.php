<?php

use App\News;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class NewsTableSeeder extends Seeder {

    /**
     * Copies over all the news from the ATLauncher's API into our database.
     *
     * @return void
     */
    public function run() {
        DB::table('news')->delete();

        $atl_news = json_decode(file_get_contents('https://api.atlauncher.com/v1/news'))->data;

        foreach ($atl_news as $news) {
            News::create(array(
                'title' => $news->title,
                'comments' => $news->comments,
                'link' => $news->link,
                'published_at' => $news->published_at,
                'content' => $news->content
            ));
        }
    }
}
