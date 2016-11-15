<?php

use Illuminate\Database\Seeder;

class ClientSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['first_name' => 'John', 'last_name' => 'Doe', 'company_name' => 'My Startup', 'email' => 'john@doe.com', 'phone' => '+161234567', 'website' => 'http://johndoe.me', 'skype' => 'john.doe', 'country' => 'USA', 'client_status_id' => 1],

        ];

        foreach ($items as $item) {
            \App\Client::create($item);
        }
    }
}
