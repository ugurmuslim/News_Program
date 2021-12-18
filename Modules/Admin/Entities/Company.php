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
 * @property string $image_path
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @package Models
 */
class Company extends Model
{
    protected $table = 'companies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'image_path',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'title'      => 'string',
        'image_path' => 'string',
    ];
}
