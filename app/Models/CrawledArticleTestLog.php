<?php


namespace App\Models;


use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Currency
 *
 * @property string  $id
 * @property string  $title
 * @property string  $site_name
 * @property boolean $status
 * @property string  original_link
 * @property integer article_type_id
 * @property Carbon  $created_at
 * @property Carbon  $updated_at
 * @package Models
 */
class CrawledArticleTestLog extends Model
{
    protected $table = 'crawled_articles_test_logs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'news_id',
        'site_to_crawl_id',
        'article_type_id',
        'title',
        'summary',
        'body',
        'original_link',
        'image_path',
        'source',
        'pub_date',
        'site_name',
        'message',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'news_id'         => 'string',
        'article_type_id' => 'int',
        'site_to_crawl_id'   => 'int',
        'title'           => 'string',
        'summary'         => 'string',
        'body'            => 'string',
        'original_link'   => 'string',
        'image_path'      => 'string',
        'pub_date'        => 'datetime',
        'site_name'       => 'string',
        'source'          => 'string',
        'message'         => 'string',
    ];

    public function articleType()
    {
        return $this->hasOne(ArticleType::class, 'id', 'article_type_id');
    }
}
