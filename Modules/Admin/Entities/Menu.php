<?php


namespace Modules\Admin\Entities;


use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Currency
 *
 * @property string $id
 * @property string $title
 * @property string $url
 * @property int    $sort
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @package Models
 */
class Menu extends Model
{
    protected $table = 'menu';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'url',
        'sort',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'url'   => 'string',
        'sort'  => 'int',
    ];
}
