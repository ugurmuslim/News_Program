<?php

namespace App\Console\Commands;

use App\Models\Article;
use App\Models\ArticleType;
use App\Parafesor\Constants\ArticleTypes;
use App\Parafesor\Helper\ArticleHelper;
use Carbon\Carbon;
use Illuminate\Console\Command;

class MockDataCreator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:mock';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $articleTypes = ArticleType::all();
        $title = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut facilisis convallis tristique. Sed blandit augue nulla, id congue lacus sagittis id.  ';
        $string = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut facilisis convallis tristique. Sed blandit augue nulla, id congue lacus sagittis id. Praesent non ex est. Quisque aliquet magna at euismod hendrerit. Nam suscipit magna sem, sit amet vulputate est malesuada nec. Vivamus eu faucibus odio, vel ultricies nunc. Nam ac laoreet ipsum, id laoreet massa.
Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec eu dui sodales, mollis sem vel, lacinia urna. Praesent malesuada eros ac odio finibus, sit amet tincidunt felis consequat. Vivamus eget tristique diam. Proin vestibulum augue nec lorem blandit sodales. Duis ornare et dui sit amet blandit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vivamus id semper ligula. Suspendisse in ultrices mauris. Donec molestie ullamcorper lectus, at sodales tortor lobortis ac. Morbi pulvinar elementum ipsum nec gravida.
Mauris lacus neque, vestibulum non euismod eu, condimentum quis dui. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque dictum leo vel efficitur viverra. Vivamus efficitur congue nunc. Vestibulum vel turpis arcu. Aliquam id est laoreet quam euismod maximus eu at lacus. Morbi mollis sodales mi, non ullamcorper magna gravida vitae. Suspendisse potenti. Ut malesuada imperdiet augue. Duis suscipit feugiat erat, id gravida arcu venenatis id. Maecenas sagittis, mi non condimentum ultricies, sem metus malesuada eros, at feugiat augue mi eget nisl. Nullam in diam ante. Nullam eu ex eu ligula pretium tincidunt eget a velit. Phasellus ex mi, lobortis in ultrices vel, auctor et ex.
Praesent dignissim efficitur felis sit amet sollicitudin. Sed porttitor enim a ultricies ullamcorper. Fusce lobortis felis in leo dapibus, ut eleifend augue cursus. Morbi dignissim mauris quis semper rhoncus. Quisque tincidunt semper leo vel suscipit. Curabitur vitae ex pretium, bibendum felis non, tempor turpis. Etiam malesuada mauris tellus, quis mattis mi vestibulum ac. Vivamus mi neque, fringilla nec leo nec, bibendum tempor sapien. Vivamus non ornare odio, ac commodo augue.
Ut commodo metus ut faucibus ornare. Maecenas ullamcorper dolor tempor placerat pulvinar. Proin fringilla enim sit amet ligula porttitor, sed sodales sem varius. Nullam ornare turpis diam, vel egestas tortor sodales et. Etiam imperdiet accumsan venenatis. Nunc volutpat nibh non ante commodo, vel molestie risus vulputate. Ut imperdiet tristique dolor, eget hendrerit nisi accumsan et. Nam quis sem metus.';


        foreach ($articleTypes as $articleType) {
            $dimensions = json_decode($articleType->image_dimensions, true);
            if ($articleType->id == ArticleTypes::Twitter) {
                continue;
            }
            foreach ($dimensions as $dimension => $d) {
                if ($dimension == 'Normal') {
                    $i = 0;
                    while ($i < 20) {
                        Article::create([
                            'title'           => $title,
                            'body'            => $string,
                            'status'          => 'PUBLISHED',
                            'article_type_id' => $articleType->id,
                            'show_case'       => $dimension,
                            'header_slider'   => 1,
                            'image_path'      => "https://fakeimg.pl/" . $d['width'] . "x" . $d['height'] . "/?text=" . $articleType->titlec,
                            'persistent'      => (bool)mt_rand(0, 1),
                            'summary'         => $title,
                            'editor_id'       => 1,
                            'slug'            => str_slug(strip_tags($title, "-")),
                            'seo_title'       => 'seo title',
                            'seo_description' => 'description',
                            'sort'            => 1,
                            'seo_keywords'    => 'keyword',
                            'article_date'    => Carbon::now(),
                            'start_date'      => Carbon::now(),
                            'end_date'        => Carbon::now()->add(2, 'days'),
                        ]);
                        $i++;
                    }
                } else {
                    if ($dimension == 'SecondSlider') {
                        $string = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut facilisis convallis tristique. Sed blandit augue nulla, id congue lacus sagittis id. ';
                    }
                    Article::create([
                        'title'           => $title,
                        'body'            => $string,
                        'status'          => 'PUBLISHED',
                        'article_type_id' => $articleType->id,
                        'show_case'       => $dimension,
                        'header_slider'   => 1,
                        'image_path'      => "https://fakeimg.pl/" . $d['width'] . "x" . $d['height'] . "/?text=" . $articleType->titlec,
                        'persistent'      => 0,
                        'summary'         => $string,
                        'editor_id'       => 1,
                        'slug'            => str_slug(strip_tags($title, "-")),
                        'seo_title'       => 'seo title',
                        'seo_description' => 'description',
                        'sort'            => 1,
                        'seo_keywords'    => 'keyword',
                        'article_date'    => Carbon::now(),
                        'start_date'      => Carbon::now(),
                        'end_date'        => Carbon::now()->add(2, 'days'),
                    ]);
                }
            }
        }
        ArticleHelper::updateCache(ArticleType::where('status', 1)->pluck('id')->toArray(), true);

    }
}
