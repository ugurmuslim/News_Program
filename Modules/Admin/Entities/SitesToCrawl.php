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
class SitesToCrawl extends Model
{
    protected $table = 'sites_to_crawl';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'site_name',
        'article_type_id',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'title'     => 'string',
        'site_name' => 'string',
        'status'    => 'int',
    ];

    public function articleType()
    {
        return $this->hasOne(ArticleType::class, 'id', 'article_type_id');
    }
}
