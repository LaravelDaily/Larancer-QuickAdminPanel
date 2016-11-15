<?php
namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * Class IncomeSource
 *
 * @package App
 * @property string $title
 * @property double $fee_percent
*/
class IncomeSource extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['title', 'fee_percent'];
    
    public static function boot()
    {
        parent::boot();

        IncomeSource::observe(new \App\Observers\UserActionsObserver);
    }

    
    
    
}
