<?php
namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProjectStatus
 *
 * @package App
 * @property string $title
*/
class ProjectStatus extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['title'];
    
    public static function boot()
    {
        parent::boot();

        ProjectStatus::observe(new \App\Observers\UserActionsObserver);
    }

    
    
    
}
