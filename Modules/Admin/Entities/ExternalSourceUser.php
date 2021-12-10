<?php


namespace Modules\Admin\Entities;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Currency
 *
 * @property int $id
 * @property string $title
 * @property string $image
 * @property int $external_source_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @package Models
 */
class ExternalSourceUser extends Model
{
    protected $table = 'external_source_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'image',
        'external_source_id',
        'name',
        'article_type_id',
        'external_site_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'title'           => 'string',
        'image_path'     => 'string',
    ];
}
