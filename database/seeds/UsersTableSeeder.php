<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	[
        		'role_id' => 1,
        		'firstname' => 'Main',
        		'middlename' => '',
        		'lastname' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('password'),
                'contact_no' => '09167728172',
                'address' => 'Quezon City',
                'gender' => 'male',
                'expertise_id' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        	[
        		'role_id' => 2,
        		'firstname' => 'Joshiah',
        		'middlename' => '',
        		'lastname' => 'Recio',
                'email' => 'joshiah_recio@gmail.com',
                'password' => bcrypt('password'),
                'contact_no' => '09167728172',
                'address' => 'Quezon City',
                'gender' => 'male',
                'expertise_id' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
            [
                'role_id' => 2,
                'firstname' => 'Christian',
                'middlename' => '',
                'lastname' => 'Sulit',
                'email' => 'christian_sulit@gmail.com',
                'password' => bcrypt('password'),
                'contact_no' => '09167728172',
                'address' => 'Quezon City',
                'gender' => 'male',
                'expertise_id' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'role_id' => 2,
                'firstname' => 'Michael',
                'middlename' => '',
                'lastname' => 'Lopez',
                'email' => 'michael_lopez@gmail.com',
                'password' => bcrypt('password'),
                'contact_no' => '09167728172',
                'address' => 'Quezon City',
                'gender' => 'male',
                'expertise_id' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'role_id' => 3,
                'firstname' => 'Romina',
                'middlename' => '',
                'lastname' => 'Pacheco',
                'email' => 'romina_pacheco@gmail.com',
                'password' => bcrypt('password'),
                'contact_no' => '09167728172',
                'address' => 'Quezon City',
                'gender' => 'female',
                'expertise_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'role_id' => 3,
                'firstname' => 'Jolens',
                'middlename' => '',
                'lastname' => 'Cruz',
                'email' => 'jolens_cruz@gmail.com',
                'password' => bcrypt('password'),
                'contact_no' => '09167728172',
                'address' => 'Quezon City',
                'gender' => 'female',
                'expertise_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'role_id' => 3,
                'firstname' => 'Marla',
                'middlename' => '',
                'lastname' => 'Melendrez',
                'email' => 'marla_melendrez@gmail.com',
                'password' => bcrypt('password'),
                'contact_no' => '09167728172',
                'address' => 'Quezon City',
                'gender' => 'female',
                'expertise_id' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
