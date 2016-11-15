<?php

use Illuminate\Database\Seeder;

class ProjectStatusSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['title' => 'Active'],
            ['title' => 'On hold'],
            ['title' => 'Inactive'],

        ];

        foreach ($items as $item) {
            \App\ProjectStatus::create($item);
        }
    }
}
