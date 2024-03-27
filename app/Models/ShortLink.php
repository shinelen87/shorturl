<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * Class ShortLink
 * @package App\Models
 *
 * @property int $id
 * @property string $url
 * @property string $code
 * @property Carbon $expires_at
 * @property int $counter
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class ShortLink extends Model
{
    protected $fillable = ['url', 'code', 'expires_at', 'counter'];

    protected $dates = ['expires_at'];
}
