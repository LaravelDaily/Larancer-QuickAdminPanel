<?php

use Illuminate\Database\Seeder;

class ProjectSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['title' => 'New Startup Project', 'client_id' => 1, 'description' => 'The best project in the world', 'start_date' => '2016-11-16', 'budget' => '10000', 'project_status_id' => 1],

        ];

        foreach ($items as $item) {
            \App\Project::create($item);
        }
    }
}
