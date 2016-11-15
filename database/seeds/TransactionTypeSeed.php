<?php

use Illuminate\Database\Seeder;

class TransactionTypeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['title' => 'Freelance income'],
            ['title' => 'Taxes'],

        ];

        foreach ($items as $item) {
            \App\TransactionType::create($item);
        }
    }
}
