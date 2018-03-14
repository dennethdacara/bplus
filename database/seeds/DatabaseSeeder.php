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
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ServiceTypeTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
        $this->call(CommissionSettingsSeeder::class);
        $this->call(ExpertiseTableSeeder::class);
        $this->call(VatTableSeeder::class);
        $this->call(EmployeeSalaryTableSeeder::class);
        $this->call(WalkinTableSeeder::class);
        $this->call(ReservationsTableSeeder::class);
    }
}
