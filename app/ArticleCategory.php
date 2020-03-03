<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    protected $fillable = ['name', 'description'];

    public static function boot()
    {
        parent::boot();

        ArticleCategory::observe(new \App\Observers\UserActionsObserver);
    }
}
