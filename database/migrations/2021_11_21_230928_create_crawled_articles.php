<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrawledArticles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crawled_articles', function (Blueprint $table) {
            $table->id();
            $table->string('news_id');
            $table->integer('article_type_id')->unsigned();
            $table->foreign('article_type_id')->references('id')->on('article_types');
            $table->string('title');
            $table->longText('summary');
            $table->longText('body')->nullable();
            $table->string('original_link')->unique();
            $table->string('image_path')->nullable();
            $table->timestamp('pub_date');
            $table->string('site_name');
            $table->boolean('assigned')->default(false);
            $table->integer('try_number')->default(0);
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
        Schema::dropIfExists('crawled_articles');
    }
}
