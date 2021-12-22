<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableArticles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('language_id')->default("TR");
            $table->enum("status", [ "PUBLISHED", "REJECTED", "PENDING","ASSIGNED" ]);
            $table->integer('article_type_id')->unsigned();
            $table->foreign('article_type_id')->references('id')->on('article_types');
            $table->string('original_link')->nullable()->unique();
            $table->string('title')->nullable();
            $table->longText('summary')->nullable();
            $table->longText('old_body')->nullable();
            $table->longText('body')->nullable();
            $table->integer('editor_id')->unsigned()->nullable();
            $table->foreign('editor_id')->references('id')->on('users');
            $table->string('external_site_id',50)->nullable()->unique();
            $table->integer('external_source_user_id')->unsigned()->nullable();
            $table->foreign('external_source_user_id')->references('id')->on('external_source_users');
            $table->string('slug')->nullable();
            $table->integer('read')->default(0);
            $table->float('sort')->nullable();
            $table->string('image_path')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();
            $table->string('seo_keywords')->nullable();
            $table->boolean('persistent')->nullable()->default(0);
            $table->string('show_case')->nullable();
            $table->string('site_name')->nullable();
            $table->boolean('header_slider')->nullable()->default(0);
            $table->timestamp('article_date')->nullable();
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
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
        Schema::dropIfExists('articles');
        Schema::dropIfExists('article_types');
    }
}
