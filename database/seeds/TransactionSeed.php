<?php

use Illuminate\Database\Seeder;

class TransactionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['project_id' => 1, 'transaction_type_id' => 1, 'income_source_id' => 2, 'title' => 'Transaction', 'description' => 'Transaction description.', 'amount' => '32.51', 'currency_id' => 2, 'transaction_date' => '2016-11-01'],

        ];

        foreach ($items as $item) {
            \App\Transaction::create($item);
        }
    }
}
