<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExternalSourceUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('external_source_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('article_type_id')->unsigned();
            $table->foreign('article_type_id')->references('id')->on('article_types');
            $table->integer('external_source_id');
            $table->string('external_site_id');
            $table->string('image');
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('external_sources');
    }
}
