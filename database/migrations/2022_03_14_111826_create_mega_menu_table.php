<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMegaMenuTable extends Migration
{
		public function up()
		{
				Schema::create('mega_menu', function (Blueprint $table) {
						$table->id();
						$table->string('title');
						$table->string('url');
						$table->string('sort', 10);
						$table->tinyInteger('bold')->default(0)->index();
						$table->tinyInteger('external')->default(0)->index();
						$table->tinyInteger('uppercase')->default(0)->index();
						$table->tinyInteger('active')->default(0)->index();
						//TODO daha sonra json arraye çevir.
						$table->timestamps();
				});
		}

		public function down()
		{
				Schema::dropIfExists('mega_menu');
		}
}