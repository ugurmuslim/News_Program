<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexToArticlesTable extends Migration
{
		public function up()
		{
			/*	Schema::table('articles', function (Blueprint $table) {
						$table->index(['article_type_id', 'status', 'persistent', 'start_date', 'show_case', 'article_date', 'header_slider'], 'idxArticlesByType');
						$table->index('read');
						$table->index('slug');
				});*/
		}

		public function down()
		{
				Schema::table('articles', function (Blueprint $table) {
						$table->dropIndex(['read']);
						$table->dropIndex(['slug']);
				});
		}
}
