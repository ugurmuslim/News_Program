<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexToStockTubesTable extends Migration
{
		public function up()
		{
			/*	Schema::table('stock_tube', function (Blueprint $table) {
						$table->index(['created_at']);
						$table->index(['show_case']);
						$table->index('status');
				});*/
		}

		public function down()
		{
            dd(1);
				Schema::table('stock_tube', function (Blueprint $table) {
						$table->dropIndex(['created_at']);
						$table->dropIndex(['show_case']);
						$table->dropIndex(['status']);
				});
		}
}
