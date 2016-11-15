<?php
namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TransactionType
 *
 * @package App
 * @property string $title
*/
class TransactionType extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['title'];
    
    public static function boot()
    {
        parent::boot();

        TransactionType::observe(new \App\Observers\UserActionsObserver);
    }

    
    
    
}
