<?php
namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * Class Transaction
 *
 * @package App
 * @property string $project
 * @property string $transaction_type
 * @property string $income_source
 * @property string $title
 * @property text $description
 * @property decimal $amount
 * @property string $currency
 * @property string $transaction_date
*/
class Transaction extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['title', 'description', 'amount', 'transaction_date', 'project_id', 'transaction_type_id', 'income_source_id', 'currency_id'];
    
    public static function boot()
    {
        parent::boot();

        Transaction::observe(new \App\Observers\UserActionsObserver);
    }

    
    /**
     * Set to null if empty
     * @param $input
     */
    public function setProjectIdAttribute($input)
    {
        $this->attributes['project_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setTransactionTypeIdAttribute($input)
    {
        $this->attributes['transaction_type_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setIncomeSourceIdAttribute($input)
    {
        $this->attributes['income_source_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCurrencyIdAttribute($input)
    {
        $this->attributes['currency_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setTransactionDateAttribute($input)
    {
        if ($input != null) {
            $this->attributes['transaction_date'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['transaction_date'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getTransactionDateAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));
        
        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }
    
    
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id')->withTrashed();
    }
    
    public function transaction_type()
    {
        return $this->belongsTo(TransactionType::class, 'transaction_type_id')->withTrashed();
    }
    
    public function income_source()
    {
        return $this->belongsTo(IncomeSource::class, 'income_source_id')->withTrashed();
    }
    
    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id')->withTrashed();
    }
    
}
