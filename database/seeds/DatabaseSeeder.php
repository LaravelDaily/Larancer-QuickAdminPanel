<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(ClientStatusSeed::class);
        $this->call(ClientSeed::class);
        $this->call(CurrencySeed::class);
        $this->call(ProjectStatusSeed::class);
        $this->call(ProjectSeed::class);
        $this->call(IncomeSourceSeed::class);
        $this->call(NoteSeed::class);
        $this->call(RoleSeed::class);
        $this->call(TransactionTypeSeed::class);
        $this->call(TransactionSeed::class);
        $this->call(UserSeed::class);
        $this->command->info('Seeds finished successfully. Admin email: admin@admin.com, Password: password');

    }
}
