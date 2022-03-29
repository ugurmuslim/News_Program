<?php


namespace App\Models;


use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Currency
 *
 * @property integer $id
 * @property integer $sites_to_crawl_id
 * @property string  $title
 * @property string  $site_name
 * @property boolean $status
 * @property Carbon  $created_at
 * @property Carbon  $updated_at
 * @package Models
 */
class SiteAttributes extends Model
{
    protected $table = 'site_attributes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'site_name',
        'sites_to_crawl_id',
        'type',
        'value',
        'content_place',
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
}
