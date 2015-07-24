<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packs', function ($t) {
            $t->increments('id');
            $t->string('name');
            $t->string('safeName');
            $t->string('type');
            $t->string('description');
            $t->string('supportURL');
            $t->string('websiteURL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('packs');
    }
}
