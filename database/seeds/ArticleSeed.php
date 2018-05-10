<?php

use Illuminate\Database\Seeder;

class ArticleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articles = [
            [
                'name' => 'LaravelDaily::Larancer',
                'article_category_id' => 1,
                'url' => 'https://github.com/LaravelDaily/Larancer-QuickAdminPanel',
                'description' => 'Laravel 5.5 system for freelancers to manage their clients/projects/income - generated with QuickAdmin.'
            ],
            [
                'name' => 'Barryvdh::Laravel-Debugbar',
                'article_category_id' => 2,
                'url' => 'https://github.com/barryvdh/laravel-debugbar',
                'description' => 'See every event in our app for debugging.'
            ],
            [
                'name' => 'LaravelDaily::From Client Dev-Work to Your Product',
                'article_category_id' => 3,
                'url' => 'http://laraveldaily.com/client-dev-work-product-tips-change-mindset/',
                'description' => '7 Tips to Change Your Mindset.'
            ],
            [
                'name' => 'VueMastery::Intro to Vue.js',
                'article_category_id' => 5,
                'url' => 'https://www.vuemastery.com/courses/intro-to-vue-js',
                'description' => 'Basic Video Tutorial.'
            ],

        ];

        foreach ($articles as $article) {
            \App\Article::create($article);
        }
    }
}
