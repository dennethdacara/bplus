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
                'expertise' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        	[
        		'role_id' => 2,
        		'firstname' => 'Customer',
        		'middlename' => '',
        		'lastname' => 'A',
                'email' => 'customer_a@gmail.com',
                'password' => bcrypt('password'),
                'contact_no' => '09167728172',
                'address' => 'Quezon City',
                'gender' => 'male',
                'expertise' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],

            [
                'role_id' => 3,
                'firstname' => 'Angel',
                'middlename' => '',
                'lastname' => 'Cruz',
                'email' => 'angel_cruz@gmail.com',
                'password' => bcrypt('password'),
                'contact_no' => '09167728172',
                'address' => 'Quezon City',
                'gender' => 'female',
                'expertise' => 'all around',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'role_id' => 3,
                'firstname' => 'Michelle',
                'middlename' => '',
                'lastname' => 'Cruz',
                'email' => 'michelle_cruz@gmail.com',
                'password' => bcrypt('password'),
                'contact_no' => '09167728172',
                'address' => 'Quezon City',
                'gender' => 'female',
                'expertise' => 'all around',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'role_id' => 3,
                'firstname' => 'Joan',
                'middlename' => '',
                'lastname' => 'Cruz',
                'email' => 'joan_cruz@gmail.com',
                'password' => bcrypt('password'),
                'contact_no' => '09167728172',
                'address' => 'Quezon City',
                'gender' => 'female',
                'expertise' => 'all around',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
