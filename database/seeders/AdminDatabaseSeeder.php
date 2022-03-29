<?php

namespace App\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class AdminDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('article_types')
          ->insert([
            "title"            => "Gündem",
            "page_path"        => "home::Article.gundem",
            "status"           => 1,
            "slug"           => 'gundem',
            "image_dimensions" => '{"MainSlider": {"width": 1600,"height": 900},"SecondSlider": {"width": 1600,"height": 900},"Normal": {"width": 1600,"height": 900}}',
            "created_at"       => Date::now(),
        ]);

        DB::table('article_types')->insert([
            "title"            => "Şirket Haberleri",
            "page_path"        => "home::Article.sirket-haberleri",
            "image_dimensions" => '{"MainSlider": {"width": 1600,"height": 900},"SecondSlider": {"width": 1600,"height": 900},"Normal": {"width": 1600,"height": 900}}',
            "slug"           => 'gundem',
            "status"           => 1,
            "created_at"       => Date::now(),
        ]);

        DB::table('article_types')->insert([
            "title"            => "Köşe Yazıları",
            "page_path"        => "home::Article.kose-yazilari",
            "image_dimensions" => '{"MainSlider": {"width": 1600,"height": 900},"SecondSlider": {"width": 1600,"height": 900},"Normal": {"width": 1600,"height": 900}}',
            "slug"           => 'gundem',
            "status"           => 1,
            "created_at"       => Date::now(),
        ]);

        DB::table('article_types')->insert([
            "title"            => "Borsa Tube",
            "page_path"        => "home::Article.borsa-tube",
            "image_dimensions" => '{"MainSlider": {"width": 1600,"height": 900},"SecondSlider": {"width": 1600,"height": 900},"Normal": {"width": 1600,"height": 900}}',
            "status"           => 0,
            "slug"           => 'gundem',
            "created_at"       => Date::now(),
        ]);

        DB::table('article_types')->insert([
            "title"            => "Twitter",
            "page_path"        => "home::Article.twitter",
            "image_dimensions" => '{"MainSlider": {"width": 1600,"height": 900},"SecondSlider": {"width": 1600,"height": 900},"Normal": {"width": 1600,"height": 900}}',
            "slug"           => 'gundem',
            "status"           => 1,
            "created_at"       => Date::now(),
        ]);

        DB::table('article_types')->insert([
            "title"            => "Teknoloji",
            "page_path"        => "home::Article.teknoloji",
            "image_dimensions" => '{"MainSlider": {"width": 1600,"height": 900},"SecondSlider": {"width": 1600,"height": 900},"Normal": {"width": 1600,"height": 900}}',
            "status"           => 1,
            "slug"           => 'gundem',
            "created_at"       => Date::now(),
        ]);

        DB::table('article_types')->insert([
            "title"            => "Son Dakika",
            "page_path"        => "home::Article.son-dakika",
            "image_dimensions" => '{"MainSlider": {"width": 1600,"height": 900},"SecondSlider": {"width": 1600,"height": 900},"Normal": {"width": 1600,"height": 900}}',
            "status"           => 0,
            "slug"           => 'gundem',
            "created_at"       => Date::now(),
        ]);


        DB::table('article_types')->insert([
            "title"            => "Spor",
            "page_path"        => "home::Article.spor",
            "image_dimensions" => '{"MainSlider": {"width": 1600,"height": 900},"SecondSlider": {"width": 1600,"height": 900},"Normal": {"width": 1600,"height": 900}}',
            "status"           => 1,
            "slug"           => 'gundem',
            "created_at"       => Date::now(),
        ]);

        DB::table('article_types')->insert([
            "title"            => "Yaşam",
            "page_path"        => "home::Article.yasam",
            "image_dimensions" => '{"MainSlider": {"width": 1600,"height": 900},"SecondSlider": {"width": 1600,"height": 900},"Normal": {"width": 1600,"height": 900}}',
            "status"           => 1,
            "slug"           => 'gundem',
            "created_at"       => Date::now(),
        ]);

        DB::table('article_types')->insert([
            "title"            => "Otomobil",
            "page_path"        => "home::Article.otomobil",
            "image_dimensions" => '{"MainSlider": {"width": 1600,"height": 900},"SecondSlider": {"width": 1600,"height": 900},"Normal": {"width": 1600,"height": 900}}',
            "status"           => 1,
            "slug"           => 'gundem',
            "created_at"       => Date::now(),
        ]);

        DB::table('article_types')->insert([
            "title"            => "Netkolik",
            "page_path"        => "home::Article.netkolik",
            "image_dimensions" => '{"MainSlider": {"width": 1600,"height": 900},"SecondSlider": {"width": 1600,"height": 900},"Normal": {"width": 1600,"height": 900}}',
            "status"           => 1,
            "slug"           => 'gundem',
            "created_at"       => Date::now(),
        ]);

        DB::table('article_types')->insert([
            "title"            => "Eğitim",
            "page_path"        => "home::Article.egitim",
            "image_dimensions" => '{"MainSlider": {"width": 1600,"height": 900},"SecondSlider": {"width": 1600,"height": 900},"Normal": {"width": 1600,"height": 900}}',
            "status"           => 1,
            "slug"           => 'gundem',
            "created_at"       => Date::now(),
        ]);

        DB::table('article_types')->insert([
            "title"            => "En Çok Okunanlar",
            "page_path"        => "home::Article.en-cok-okunanlar",
            "image_dimensions" => '{"MainSlider": {"width": 1600,"height": 900},"SecondSlider": {"width": 1600,"height": 900},"Normal": {"width": 1600,"height": 900}}',
            "status"           => 1,
            "slug"           => 'gundem',
            "created_at"       => Date::now(),
        ]);

        DB::table('article_types')->insert([
            "title"            => "Kripto",
            "page_path"        => "home::Article.kripto",
            "image_dimensions" => '{"MainSlider": {"width": 1600,"height": 900},"SecondSlider": {"width": 1600,"height": 900},"Normal": {"width": 1600,"height": 900}}',
            "status"           => 1,
            "slug"           => 'gundem',
            "created_at"       => Date::now(),
        ]);

        DB::table('article_types')->insert([
            "title"            => "Hisse",
            "page_path"        => "home::Article.hisse",
            "image_dimensions" => '{"MainSlider": {"width": 1600,"height": 900},"SecondSlider": {"width": 1600,"height": 900},"Normal": {"width": 1600,"height": 900}}',
            "status"           => 1,
            "slug"           => 'gundem',
            "created_at"       => Date::now(),
        ]);

        DB::table('users')->insert([
            "name"       => "ugur1",
            "email"      => "ugur1@gmail.com",
            "password"   => '$2y$10$yG9VDij3t5eT4IPYvMlwY.7PN33c3.aN/J9znap.oc08amdBhISz6',
            "created_at" => Date::now(),
        ]);

        DB::table('users')->insert([
            "name"       => "ugur2",
            "email"      => "ugur2@gmail.com",
            "password"   => '$2y$10$yG9VDij3t5eT4IPYvMlwY.7PN33c3.aN/J9znap.oc08amdBhISz6',
            "created_at" => Date::now(),
        ]);

        DB::table('users')->insert([
            "name"       => "ugur3",
            "email"      => "ugur3@gmail.com",
            "password"   => '$2y$10$yG9VDij3t5eT4IPYvMlwY.7PN33c3.aN/J9znap.oc08amdBhISz6',
            "created_at" => Date::now(),
        ]);

        DB::table('users')->insert([
            "name"       => "ugur4",
            "email"      => "ugur4@gmail.com",
            "password"   => '$2y$10$yG9VDij3t5eT4IPYvMlwY.7PN33c3.aN/J9znap.oc08amdBhISz6',
            "created_at" => Date::now(),
        ]);

        DB::table('users')->insert([
            "name"       => "ugur5",
            "email"      => "ugur5@gmail.com",
            "password"   => '$2y$10$yG9VDij3t5eT4IPYvMlwY.7PN33c3.aN/J9znap.oc08amdBhISz6',
            "created_at" => Date::now(),
        ]);
    }
}
