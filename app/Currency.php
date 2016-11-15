<?php
namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Currency
 *
 * @package App
 * @property string $title
 * @property string $code
 * @property tinyInteger $main_currency
*/
class Currency extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['title', 'code', 'main_currency'];
    
    public static function boot()
    {
        parent::boot();

        Currency::observe(new \App\Observers\UserActionsObserver);
    }

    
    
    
}
