<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->enum('type', [ 'FIAT', 'CRYPTO', 'STOCK' ]);
            $table->string('currency');
            $table->string('buying');
            $table->string('selling')->nullable();
            $table->string('yesterday_buying')->nullable();
            $table->string('yesterday_selling')->nullable();
            $table->string('change')->default(0);
            $table->string('change_amount')->default(0);
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
        Schema::dropIfExists('currencies');
    }
}
