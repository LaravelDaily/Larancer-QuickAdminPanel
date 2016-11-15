<?php

use Illuminate\Database\Seeder;

class NoteSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['project_id' => 1, 'text' => 'Note about this project'],

        ];

        foreach ($items as $item) {
            \App\Note::create($item);
        }
    }
}
