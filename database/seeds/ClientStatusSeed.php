<?php

use Illuminate\Database\Seeder;

class ClientStatusSeed extends Seeder
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
            ['title' => 'Inactive'],

        ];

        foreach ($items as $item) {
            \App\ClientStatus::create($item);
        }
    }
}
