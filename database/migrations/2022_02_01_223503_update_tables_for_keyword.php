<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTablesForKeyword extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('crawled_articles', function (Blueprint $table) {
            $table->string('keywords')->nullable()->after('image_path');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        dd(1);
        Schema::table('crawled_articles', function($table) {
            $table->dropColumn('keywords');
            $table->dropColumn('keywords');
        });
    }
}
