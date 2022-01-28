<?php


namespace Modules\Admin\Entities;


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
 * @property Carbon  $created_at
 * @property Carbon  $updated_at
 * @package Models
 */
class CrawledArticle extends Model
{
    protected $table = 'crawled_articles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'news_id',
        'article_type_id',
        'title',
        'summary',
        'body',
        'original_link',
        'image_path',
        'pub_date',
        'site_name',
        'assigned',
        'try_number',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'news_id'         => 'string',
        'article_type_id' => 'int',
        'title'           => 'string',
        'summary'         => 'string',
        'body'            => 'string',
        'original_link'   => 'string',
        'image_path'      => 'string',
        'pub_date'        => 'datetime',
        'site_name'       => 'string',
        'assigned'        => 'int',
        'try_number'      => 'int',
        'status'          => 'int',
    ];

    public function articleType()
    {
        return $this->hasOne(ArticleType::class, 'id', 'article_type_id');
    }
}
