<?php
namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * Class Project
 *
 * @package App
 * @property string $title
 * @property string $client
 * @property text $description
 * @property string $start_date
 * @property string $budget
 * @property string $project_status
*/
class Project extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['title', 'description', 'start_date', 'budget', 'client_id', 'project_status_id'];
    
    public static function boot()
    {
        parent::boot();

        Project::observe(new \App\Observers\UserActionsObserver);
    }

    
    /**
     * Set to null if empty
     * @param $input
     */
    public function setClientIdAttribute($input)
    {
        $this->attributes['client_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setStartDateAttribute($input)
    {
        if ($input != null) {
            $this->attributes['start_date'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['start_date'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getStartDateAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));
        
        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }
    /**
     * Set to null if empty
     * @param $input
     */
    public function setProjectStatusIdAttribute($input)
    {
        $this->attributes['project_status_id'] = $input ? $input : null;
    }
    
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id')->withTrashed();
    }
    
    public function project_status()
    {
        return $this->belongsTo(ProjectStatus::class, 'project_status_id')->withTrashed();
    }
    
}
