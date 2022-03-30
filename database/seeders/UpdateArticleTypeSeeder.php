<?php

namespace Database\Seeders;

use App\Models\ArticleType;
use Illuminate\Database\Seeder;

class UpdateArticleTypeSeeder extends Seeder
{
    public function run()
    {
        $articleTypes = ArticleType::all();
        foreach ($articleTypes as $articleType) {
            $articleType->update([
              'page_path' => str_replace('::', '.', strtolower($articleType->page_path))
            ]);
        }
    }
}
