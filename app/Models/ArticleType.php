<?php


namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
/**
 * Class Currency
 *
 * @property string $id
 * @property string $title
 * @property Carbon $created_at
 * @package Models
 */
class ArticleType extends Model
{
    protected $table = 'article_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
    ];
}
