<?php

use App\Pack;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PacksTableSeeder extends Seeder {

    /**
     * Copies over all the packs from the ATLauncher's API into our database.
     *
     * @return void
     */
    public function run() {
        DB::table('packs')->delete();

        $atl_packs = json_decode(file_get_contents('https://api.atlauncher.com/v1/packs/full/all'))->data;

        foreach ($atl_packs as $pack) {
            Pack::create(array(
                'name' => $pack->name,
                'safeName' => $pack->safeName,
                'type' => $pack->type,
                'description' => $pack->description,
                'supportURL' => $pack->supportURL,
                'websiteURL' => $pack->websiteURL
            ));
        }
    }
}
