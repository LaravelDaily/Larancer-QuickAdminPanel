<?php

use Illuminate\Database\Seeder;

class IncomeSourceSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['title' => 'Upwork', 'fee_percent' => 10],
            ['title' => 'Direct client', 'fee_percent' => 0],

        ];

        foreach ($items as $item) {
            \App\IncomeSource::create($item);
        }
    }
}
