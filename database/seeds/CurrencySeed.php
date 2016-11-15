<?php

use Illuminate\Database\Seeder;

class CurrencySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['title' => 'USD', 'code' => 'USD', 'main_currency' => 1],
            ['title' => 'EUR', 'code' => 'EUR', 'main_currency' => 0],
            ['title' => 'GBP', 'code' => 'GBP', 'main_currency' => 0],

        ];

        foreach ($items as $item) {
            \App\Currency::create($item);
        }
    }
}
