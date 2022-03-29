<?php


namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Currency
 *
 * @property int $id
 * @property string $currency
 * @property string $buying
 * @property string $selling
 * @property string $chage_amount
 * @property float $change
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @package Models
 */
class Currency extends Model
{
    protected $table = 'currencies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'type',
      'currency',
      'buying',
      'selling',
      'yesterday_buying',
      'yesterday_selling',
      'selling',
      'change',
      'change_amount',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
      'type'              => 'string',
      'currency'          => 'string',
      'buying'            => 'string',
      'selling'           => 'string',
      'yesterday_buying'  => 'string',
      'yesterday_selling' => 'string',
      'change'            => 'string',
    ];
}
