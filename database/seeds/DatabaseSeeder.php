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
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(ServiceTypeTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
        $this->call(CommissionSettingsSeeder::class);
        $this->call(ExpertiseTableSeeder::class);
    }
}
