<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockTubeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_tube', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('original_link');
            $table->integer('editor_id')->unsigned()->nullable();
            $table->foreign('editor_id')->references('id')->on('users');
            $table->string('image_path')->nullable();
            $table->string('show_case',20)->default('Normal');
            $table->enum("status", [ "PUBLISHED", "REJECTED", "PENDING","ASSIGNED" ]);
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
        Schema::dropIfExists('stock_tube');
    }
}
