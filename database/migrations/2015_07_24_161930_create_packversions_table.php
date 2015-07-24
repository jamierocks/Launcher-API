<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackversionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packversions', function ($t) {
            $t->increments('id');
            $t->integer('packId');
            $t->string('version');
            $t->string('minecraftVersion');
            $t->boolean('recommended');
            $t->timestamp('published');
            $t->text('serverZipURL');
            $t->text('changelog');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('packversions');
    }
}
