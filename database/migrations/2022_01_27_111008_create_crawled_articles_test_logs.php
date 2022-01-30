<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrawledArticlesTestLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crawled_articles_test_logs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('site_to_crawl_id')->unsigned();
            $table->integer('article_type_id')->unsigned();
            $table->foreign('article_type_id')->references('id')->on('article_types');
            $table->string('title')->nullable();
            $table->longText('summary')->nullable();
            $table->longText('body')->nullable();
            $table->string('original_link')->unique();
            $table->string('image_path')->nullable();
            $table->string('source')->nullable();
            $table->timestamp('pub_date')->nullable();
            $table->string('site_name');
            $table->string('message');
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
        Schema::dropIfExists('crawled_articles_test_logs');


    }
}
