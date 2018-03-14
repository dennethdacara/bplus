<?php

use Illuminate\Database\Seeder;

class WalkinTableSeeder extends Seeder
{

    public function run()
    {
    	// 1
        DB::table('walkin')->insert([
        	[
        		'firstname' => 'John',
        		'lastname' => 'Doe',
                'contact_no' => '091677281172',
                'email' => 'johndoe@gmail.com',
                'walkin_time' => '07:00 - 07:30 AM',
                'status' => 'Pending',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('service_walkin')->insert([
        	[
        		'service_id' => 1,
        		'walkin_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],

        	[
        		'service_id' => 2,
        		'walkin_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('employee_walkin')->insert([
        	[
        		'walkin_id' => 1,
        		'employee_id' => 5,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],

        	[
        		'walkin_id' => 1,
        		'employee_id' => 6,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        // 2
        DB::table('walkin')->insert([
        	[
        		'firstname' => 'Chris',
        		'lastname' => 'Doe',
                'contact_no' => '091677281172',
                'email' => 'chrisdoe@gmail.com',
                'walkin_time' => '07:30 - 08:00 AM',
                'status' => 'Pending',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('service_walkin')->insert([
        	[
        		'service_id' => 1,
        		'walkin_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],

        	[
        		'service_id' => 2,
        		'walkin_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('employee_walkin')->insert([
        	[
        		'walkin_id' => 2,
        		'employee_id' => 6,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],

        	[
        		'walkin_id' => 2,
        		'employee_id' => 7,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        // 3
        DB::table('walkin')->insert([
        	[
        		'firstname' => 'Mary',
        		'lastname' => 'Doe',
                'contact_no' => '091677281172',
                'email' => 'marydoe@gmail.com',
                'walkin_time' => '08:30 - 09:00 AM',
                'status' => 'Pending',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('service_walkin')->insert([
        	[
        		'service_id' => 1,
        		'walkin_id' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],

        	[
        		'service_id' => 2,
        		'walkin_id' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('employee_walkin')->insert([
        	[
        		'walkin_id' => 3,
        		'employee_id' => 6,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],

        	[
        		'walkin_id' => 3,
        		'employee_id' => 7,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        // 4
        DB::table('walkin')->insert([
        	[
        		'firstname' => 'Mark',
        		'lastname' => 'Doe',
                'contact_no' => '091677281172',
                'email' => 'markdoe@gmail.com',
                'walkin_time' => '09:00 - 09:30 AM',
                'status' => 'Pending',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('service_walkin')->insert([
        	[
        		'service_id' => 1,
        		'walkin_id' => 4,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],

        	[
        		'service_id' => 2,
        		'walkin_id' => 4,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('employee_walkin')->insert([
        	[
        		'walkin_id' => 4,
        		'employee_id' => 6,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],

        	[
        		'walkin_id' => 4,
        		'employee_id' => 7,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        // 5
        DB::table('walkin')->insert([
        	[
        		'firstname' => 'Christian',
        		'lastname' => 'Doe',
                'contact_no' => '091677281172',
                'email' => 'christiandoe@gmail.com',
                'walkin_time' => '09:30 - 10:00 AM',
                'status' => 'Pending',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('service_walkin')->insert([
        	[
        		'service_id' => 1,
        		'walkin_id' => 5,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],

        	[
        		'service_id' => 2,
        		'walkin_id' => 5,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('employee_walkin')->insert([
        	[
        		'walkin_id' => 5,
        		'employee_id' => 6,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],

        	[
        		'walkin_id' => 5,
        		'employee_id' => 7,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        // 6
        DB::table('walkin')->insert([
        	[
        		'firstname' => 'Joseph',
        		'lastname' => 'Doe',
                'contact_no' => '091677281172',
                'email' => 'josephdoe@gmail.com',
                'walkin_time' => '10:00 - 10:30 AM',
                'status' => 'Pending',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('service_walkin')->insert([
        	[
        		'service_id' => 1,
        		'walkin_id' => 6,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],

        	[
        		'service_id' => 2,
        		'walkin_id' => 6,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('employee_walkin')->insert([
        	[
        		'walkin_id' => 6,
        		'employee_id' => 6,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],

        	[
        		'walkin_id' => 6,
        		'employee_id' => 7,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        // 7
        DB::table('walkin')->insert([
        	[
        		'firstname' => 'Melvin',
        		'lastname' => 'Doe',
                'contact_no' => '091677281172',
                'email' => 'melvindoe@gmail.com',
                'walkin_time' => '10:30 - 11:00 AM',
                'status' => 'Pending',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('service_walkin')->insert([
        	[
        		'service_id' => 1,
        		'walkin_id' => 7,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],

        	[
        		'service_id' => 2,
        		'walkin_id' => 7,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('employee_walkin')->insert([
        	[
        		'walkin_id' => 7,
        		'employee_id' => 6,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],

        	[
        		'walkin_id' => 7,
        		'employee_id' => 7,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        // 8
        DB::table('walkin')->insert([
        	[
        		'firstname' => 'Marky',
        		'lastname' => 'Doe',
                'contact_no' => '091677281172',
                'email' => 'markydoe@gmail.com',
                'walkin_time' => '11:00 - 11:30 AM',
                'status' => 'Pending',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('service_walkin')->insert([
        	[
        		'service_id' => 1,
        		'walkin_id' => 8,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],

        	[
        		'service_id' => 2,
        		'walkin_id' => 8,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('employee_walkin')->insert([
        	[
        		'walkin_id' => 8,
        		'employee_id' => 6,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],

        	[
        		'walkin_id' => 8,
        		'employee_id' => 7,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        // 9
        DB::table('walkin')->insert([
        	[
        		'firstname' => 'Manuel',
        		'lastname' => 'Doe',
                'contact_no' => '091677281172',
                'email' => 'manueldoe@gmail.com',
                'walkin_time' => '11:30 - 12:00 PM',
                'status' => 'Pending',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('service_walkin')->insert([
        	[
        		'service_id' => 1,
        		'walkin_id' => 9,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],

        	[
        		'service_id' => 2,
        		'walkin_id' => 9,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('employee_walkin')->insert([
        	[
        		'walkin_id' => 9,
        		'employee_id' => 6,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],

        	[
        		'walkin_id' => 9,
        		'employee_id' => 7,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        // 10
        DB::table('walkin')->insert([
        	[
        		'firstname' => 'Jerick',
        		'lastname' => 'Doe',
                'contact_no' => '091677281172',
                'email' => 'jerickdoe@gmail.com',
                'walkin_time' => '12:00 - 12:30 PM',
                'status' => 'Pending',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('service_walkin')->insert([
        	[
        		'service_id' => 1,
        		'walkin_id' => 10,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],

        	[
        		'service_id' => 2,
        		'walkin_id' => 10,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('employee_walkin')->insert([
        	[
        		'walkin_id' => 10,
        		'employee_id' => 6,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],

        	[
        		'walkin_id' => 10,
        		'employee_id' => 7,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);



    }
}
