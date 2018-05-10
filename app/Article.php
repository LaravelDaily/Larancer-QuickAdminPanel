<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $fillable = ['name', 'article_category_id', 'url', 'description'];

    public static function boot()
    {
        parent::boot();

        Article::observe(new \App\Observers\UserActionsObserver);
    }

    public function category() {
        return $this->belongsTo(ArticleCategory::class, 'article_category_id');
    }
}
