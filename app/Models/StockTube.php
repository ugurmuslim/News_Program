<?php


namespace App\Models;


use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Currency
 *
 * @property string $id
 * @property string $original_link
 * @property string $title
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @package Models
 */
class StockTube extends Model
{
    protected $table = 'stock_tube';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'original_link',
        'show_case',
        'image_path',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'title'         => 'string',
        'original_link' => 'string',
        'show_case'     => 'string',
    ];
}
