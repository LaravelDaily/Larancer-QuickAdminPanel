<?php
namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Note
 *
 * @package App
 * @property string $project
 * @property text $text
*/
class Note extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['text', 'project_id'];
    
    public static function boot()
    {
        parent::boot();

        Note::observe(new \App\Observers\UserActionsObserver);
    }

    
    /**
     * Set to null if empty
     * @param $input
     */
    public function setProjectIdAttribute($input)
    {
        $this->attributes['project_id'] = $input ? $input : null;
    }
    
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id')->withTrashed();
    }
    
}
