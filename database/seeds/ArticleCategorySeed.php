<?php

use Illuminate\Database\Seeder;

class ArticleCategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [

            [
                'id' => 1,
                'name' => 'Laravel::Github-Repositories',
                'description' => 'In this Category we will save every Laravel Repository we would like to Clone to collaborate or review later.'
            ],
            [
                'id' => 2,
                'name' => 'Laravel::Packages',
                'description' => 'In this Category we will save the Laravel Packages we use the most, so we can keep our favorite packages in one place.'
            ],
            [
                'id' => 3,
                'name' => 'Laravel::Blog-Post',
                'description' => 'In this Category we will save the Laravel Blog-Post we find the most interesting, so we can read it later.'
            ],
            [
                'id' => 4,
                'name' => 'Laravel::Video-Tutorials/Lessons',
                'description' => 'In this Category we will save every Laravel Video-Tutorials/Lessons we would like to view later in a free time.'
            ],

            [
                'id' => 5,
                'name' => 'VueJS::Video-Tutorials/Lessons',
                'description' => 'In this Category we will save every VueJS Video-Tutorials/Lessons we would like to view later in a free time.'
            ],

        ];

        foreach ($categories as $category) {
            \App\ArticleCategory::create($category);
        }
    }
}
