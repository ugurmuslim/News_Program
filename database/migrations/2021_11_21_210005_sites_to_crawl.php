<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SitesToCrawl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites_to_crawl', function (Blueprint $table) {
            $table->id();
            $table->integer('article_type_id')->unsigned();
            $table->foreign('article_type_id')->references('id')->on('article_types');
            $table->string('title');
            $table->string('site_name');
            $table->boolean('status');
            $table->timestamps();
        });
}

/**
 * Reverse the migrations.
 *
 * @return void
 */
public
function down()
{
        Schema::dropIfExists('sites_to_crawl');
}
}
