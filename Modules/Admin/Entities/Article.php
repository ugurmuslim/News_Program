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
 * @property string  $original_link
 * @property string  $title
 * @property string  $language_id
 * @property string  $status
 * @property int     $article_type_id
 * @property string  $summary
 * @property string  $image_path
 * @property string  $body
 * @property string  $old_body
 * @property int     $editor_id
 * @property float   $sort
 * @property int     $read
 * @property string  $slug
 * @property boolean $header_slider
 * @property string  $seo_url
 * @property string  $seo_title
 * @property string  $seo_description
 * @property string  $seo_keywords
 * @property Carbon  $article_date
 * @property Carbon  $show_case
 * @property Carbon  $site_name
 * @property Carbon  $created_at
 * @property Carbon  $updated_at
 * @package Models
 */
class Article extends Model
{
    protected $table = 'articles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'language_id',
        'summary',
        'status',
        'article_type_id',
        'external_source_user_id',
        'external_site_id',
        'header',
        'body',
        'persistent',
        'editor_id',
        'sort',
        'image_path',
        'seo_url',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'article_date',
        'slug',
        'read',
        'show_case',
        'site_name',
        'original_link',
        'header_slider',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'title'            => 'string',
        'language_id'      => 'string',
        'status'           => 'string',
        'article_type_id'  => 'string',
        'header'           => 'string',
        'body'             => 'string',
        'old_body'             => 'string',
        'editor_id'        => 'int',
        'header_slider'    => 'int',
        'persistent'    => 'int',
        'sort'             => 'float',
        'external_site_id' => 'string',
        'image_path'       => 'string',
        'seo_url'          => 'string',
        'seo_title'        => 'string',
        'seo_description'  => 'string',
        'seo_keywords'     => 'string',
        'show_case'        => 'string',
        'site_name'        => 'string',
        'article_date'     => 'date',
    ];


    /**
     * Get External User
     *
     * @return HasOne|ExternalSourceUser
     */
    public function externalSourceUser()
    {
        return $this->hasOne(ExternalSourceUser::class, 'id', 'external_source_user_id');
    }

    public function editor()
    {
        return $this->hasOne(User::class, 'id', 'editor_id');
    }

    public function articleType()
    {
        return $this->hasOne(ArticleType::class, 'id', 'article_type_id');
    }
}
