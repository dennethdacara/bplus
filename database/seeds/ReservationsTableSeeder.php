<?php
use Illuminate\Database\Seeder;

class ReservationsTableSeeder extends Seeder
{

    public function run()
    {
        // 1
        DB::table('users')->insert([
        	[
        		'role_id' => 2,
        		'firstname' => 'Candace',
        		'middlename' => '',
        		'lastname' => 'Chandler',
                'email' => 'candace_chandler@gmail.com',
                'password' => bcrypt('password'),
                'contact_no' => '09167728172',
                'address' => 'Quezon City',
                'gender' => 'female',
                'expertise_id' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('reservations')->insert([
        	[
        		'customer_id' => 8,
                'reservation_date' => '03/15/2018',
                'reservation_time' => '07:00 - 07:30 AM',
                'type' => 'Home Service',
                'address' => 'Quezon City',
                'status' => 'Pending',
                'processed_by' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('reservation_service')->insert([
        	[
        		'reservation_id' => 1,
                'service_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        	[
        		'reservation_id' => 1,
                'service_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('employee_reservation')->insert([
        	[
        		'reservation_id' => 1,
                'employee_id' => 5,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        	[
        		'reservation_id' => 1,
                'employee_id' => 6,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        // 2
        DB::table('users')->insert([
        	[
        		'role_id' => 2,
        		'firstname' => 'Rosie',
        		'middlename' => '',
        		'lastname' => 'Mann',
                'email' => 'rosie_mann@gmail.com',
                'password' => bcrypt('password'),
                'contact_no' => '09167728172',
                'address' => 'Quezon City',
                'gender' => 'female',
                'expertise_id' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('reservations')->insert([
        	[
        		'customer_id' => 9,
                'reservation_date' => '03/15/2018',
                'reservation_time' => '07:30 - 08:00 AM',
                'type' => 'Home Service',
                'address' => 'Quezon City',
                'status' => 'Pending',
                'processed_by' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('reservation_service')->insert([
        	[
        		'reservation_id' => 2,
                'service_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        	[
        		'reservation_id' => 2,
                'service_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('employee_reservation')->insert([
        	[
        		'reservation_id' => 2,
                'employee_id' => 5,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        	[
        		'reservation_id' => 2,
                'employee_id' => 6,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        // 3
        DB::table('users')->insert([
        	[
        		'role_id' => 2,
        		'firstname' => 'Lena',
        		'middlename' => '',
        		'lastname' => 'Henry',
                'email' => 'lena_henry@gmail.com',
                'password' => bcrypt('password'),
                'contact_no' => '09167728172',
                'address' => 'Quezon City',
                'gender' => 'female',
                'expertise_id' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('reservations')->insert([
        	[
        		'customer_id' => 10,
                'reservation_date' => '03/15/2018',
                'reservation_time' => '08:00 - 08:30 AM',
                'type' => 'On Salon',
                'address' => 'Quezon City',
                'status' => 'Pending',
                'processed_by' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('reservation_service')->insert([
        	[
        		'reservation_id' => 3,
                'service_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        	[
        		'reservation_id' => 3,
                'service_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('employee_reservation')->insert([
        	[
        		'reservation_id' => 3,
                'employee_id' => 5,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        	[
        		'reservation_id' => 3,
                'employee_id' => 6,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        // 4
        DB::table('users')->insert([
        	[
        		'role_id' => 2,
        		'firstname' => 'Sonia',
        		'middlename' => '',
        		'lastname' => 'Gray',
                'email' => 'sonia_gray@gmail.com',
                'password' => bcrypt('password'),
                'contact_no' => '09167728172',
                'address' => 'Quezon City',
                'gender' => 'female',
                'expertise_id' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('reservations')->insert([
        	[
        		'customer_id' => 11,
                'reservation_date' => '03/15/2018',
                'reservation_time' => '08:30 - 09:00 AM',
                'type' => 'On Salon',
                'address' => 'Quezon City',
                'status' => 'Pending',
                'processed_by' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('reservation_service')->insert([
        	[
        		'reservation_id' => 4,
                'service_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        	[
        		'reservation_id' => 4,
                'service_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('employee_reservation')->insert([
        	[
        		'reservation_id' => 4,
                'employee_id' => 5,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        	[
        		'reservation_id' => 4,
                'employee_id' => 6,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        // 5
        DB::table('users')->insert([
        	[
        		'role_id' => 2,
        		'firstname' => 'Dustin',
        		'middlename' => '',
        		'lastname' => 'Duncan',
                'email' => 'dustin_duncan@gmail.com',
                'password' => bcrypt('password'),
                'contact_no' => '09167728172',
                'address' => 'Quezon City',
                'gender' => 'male',
                'expertise_id' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('reservations')->insert([
        	[
        		'customer_id' => 12,
                'reservation_date' => '03/15/2018',
                'reservation_time' => '09:00 - 09:30 AM',
                'type' => 'On Salon',
                'address' => 'Quezon City',
                'status' => 'Pending',
                'processed_by' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('reservation_service')->insert([
        	[
        		'reservation_id' => 5,
                'service_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        	[
        		'reservation_id' => 5,
                'service_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('employee_reservation')->insert([
        	[
        		'reservation_id' => 5,
                'employee_id' => 5,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        	[
        		'reservation_id' => 5,
                'employee_id' => 6,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        // 5
        DB::table('users')->insert([
        	[
        		'role_id' => 2,
        		'firstname' => 'Marlon',
        		'middlename' => '',
        		'lastname' => 'Delgado',
                'email' => 'marlon_delgado@gmail.com',
                'password' => bcrypt('password'),
                'contact_no' => '09167728172',
                'address' => 'Quezon City',
                'gender' => 'male',
                'expertise_id' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('reservations')->insert([
        	[
        		'customer_id' => 13,
                'reservation_date' => '03/15/2018',
                'reservation_time' => '09:30 - 10:00 AM',
                'type' => 'On Salon',
                'address' => 'Quezon City',
                'status' => 'Pending',
                'processed_by' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('reservation_service')->insert([
        	[
        		'reservation_id' => 6,
                'service_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        	[
        		'reservation_id' => 6,
                'service_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('employee_reservation')->insert([
        	[
        		'reservation_id' => 6,
                'employee_id' => 5,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        	[
        		'reservation_id' => 6,
                'employee_id' => 6,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        // 6
        DB::table('users')->insert([
        	[
        		'role_id' => 2,
        		'firstname' => 'Freda',
        		'middlename' => '',
        		'lastname' => 'May',
                'email' => 'freda_may@gmail.com',
                'password' => bcrypt('password'),
                'contact_no' => '09167728172',
                'address' => 'Quezon City',
                'gender' => 'female',
                'expertise_id' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('reservations')->insert([
        	[
        		'customer_id' => 14,
                'reservation_date' => '03/15/2018',
                'reservation_time' => '10:00 - 10:30 AM',
                'type' => 'On Salon',
                'address' => 'Quezon City',
                'status' => 'Pending',
                'processed_by' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('reservation_service')->insert([
        	[
        		'reservation_id' => 7,
                'service_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        	[
        		'reservation_id' => 7,
                'service_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('employee_reservation')->insert([
        	[
        		'reservation_id' => 7,
                'employee_id' => 5,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        	[
        		'reservation_id' => 7,
                'employee_id' => 6,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        // 7
        DB::table('users')->insert([
        	[
        		'role_id' => 2,
        		'firstname' => 'Leroy',
        		'middlename' => '',
        		'lastname' => 'Sims',
                'email' => 'leroy_sims@gmail.com',
                'password' => bcrypt('password'),
                'contact_no' => '09167728172',
                'address' => 'Quezon City',
                'gender' => 'male',
                'expertise_id' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('reservations')->insert([
        	[
        		'customer_id' => 15,
                'reservation_date' => '03/15/2018',
                'reservation_time' => '10:30 - 11:00 AM',
                'type' => 'On Salon',
                'address' => 'Quezon City',
                'status' => 'Pending',
                'processed_by' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('reservation_service')->insert([
        	[
        		'reservation_id' => 8,
                'service_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        	[
        		'reservation_id' => 8,
                'service_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('employee_reservation')->insert([
        	[
        		'reservation_id' => 8,
                'employee_id' => 5,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        	[
        		'reservation_id' => 8,
                'employee_id' => 6,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        // 7
        DB::table('users')->insert([
        	[
        		'role_id' => 2,
        		'firstname' => 'Tara',
        		'middlename' => '',
        		'lastname' => 'Daniel',
                'email' => 'tara_daniel@gmail.com',
                'password' => bcrypt('password'),
                'contact_no' => '09167728172',
                'address' => 'Quezon City',
                'gender' => 'male',
                'expertise_id' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('reservations')->insert([
        	[
        		'customer_id' => 16,
                'reservation_date' => '03/15/2018',
                'reservation_time' => '11:00 - 11:30 AM',
                'type' => 'On Salon',
                'address' => 'Quezon City',
                'status' => 'Pending',
                'processed_by' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('reservation_service')->insert([
        	[
        		'reservation_id' => 9,
                'service_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        	[
        		'reservation_id' => 9,
                'service_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('employee_reservation')->insert([
        	[
        		'reservation_id' => 9,
                'employee_id' => 5,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        	[
        		'reservation_id' => 9,
                'employee_id' => 6,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        // 8
        DB::table('users')->insert([
        	[
        		'role_id' => 2,
        		'firstname' => 'Randy',
        		'middlename' => '',
        		'lastname' => 'Green',
                'email' => 'randy_green@gmail.com',
                'password' => bcrypt('password'),
                'contact_no' => '09167728172',
                'address' => 'Quezon City',
                'gender' => 'male',
                'expertise_id' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('reservations')->insert([
        	[
        		'customer_id' => 17,
                'reservation_date' => '03/15/2018',
                'reservation_time' => '11:30 - 12:00 PM',
                'type' => 'On Salon',
                'address' => 'Quezon City',
                'status' => 'Pending',
                'processed_by' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('reservation_service')->insert([
        	[
        		'reservation_id' => 10,
                'service_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        	[
        		'reservation_id' => 10,
                'service_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('employee_reservation')->insert([
        	[
        		'reservation_id' => 10,
                'employee_id' => 5,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        	[
        		'reservation_id' => 10,
                'employee_id' => 6,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        // 9
        DB::table('users')->insert([
        	[
        		'role_id' => 2,
        		'firstname' => 'Danny',
        		'middlename' => '',
        		'lastname' => 'Lloyd',
                'email' => 'danny_lloyd@gmail.com',
                'password' => bcrypt('password'),
                'contact_no' => '09167728172',
                'address' => 'Quezon City',
                'gender' => 'male',
                'expertise_id' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('reservations')->insert([
        	[
        		'customer_id' => 18,
                'reservation_date' => '03/15/2018',
                'reservation_time' => '1:00 - 1:30 PM',
                'type' => 'On Salon',
                'address' => 'Quezon City',
                'status' => 'Pending',
                'processed_by' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('reservation_service')->insert([
        	[
        		'reservation_id' => 11,
                'service_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        	[
        		'reservation_id' => 11,
                'service_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('employee_reservation')->insert([
        	[
        		'reservation_id' => 11,
                'employee_id' => 5,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        	[
        		'reservation_id' => 11,
                'employee_id' => 6,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        // 9
        DB::table('users')->insert([
        	[
        		'role_id' => 2,
        		'firstname' => 'Andrea',
        		'middlename' => '',
        		'lastname' => 'Castro',
                'email' => 'andrea_castro@gmail.com',
                'password' => bcrypt('password'),
                'contact_no' => '09167728172',
                'address' => 'Quezon City',
                'gender' => 'female',
                'expertise_id' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('reservations')->insert([
        	[
        		'customer_id' => 19,
                'reservation_date' => '03/16/2018',
                'reservation_time' => '1:30 - 2:00 PM',
                'type' => 'On Salon',
                'address' => 'Quezon City',
                'status' => 'Pending',
                'processed_by' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('reservation_service')->insert([
        	[
        		'reservation_id' => 12,
                'service_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        	[
        		'reservation_id' => 12,
                'service_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('employee_reservation')->insert([
        	[
        		'reservation_id' => 12,
                'employee_id' => 5,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        	[
        		'reservation_id' => 12,
                'employee_id' => 6,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        // 10
        DB::table('users')->insert([
        	[
        		'role_id' => 2,
        		'firstname' => 'Alice',
        		'middlename' => '',
        		'lastname' => 'Mann',
                'email' => 'alice_mann@gmail.com',
                'password' => bcrypt('password'),
                'contact_no' => '09167728172',
                'address' => 'Quezon City',
                'gender' => 'female',
                'expertise_id' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('reservations')->insert([
        	[
        		'customer_id' => 20,
                'reservation_date' => '03/16/2018',
                'reservation_time' => '2:00 - 2:30 PM',
                'type' => 'On Salon',
                'address' => 'Quezon City',
                'status' => 'Pending',
                'processed_by' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('reservation_service')->insert([
        	[
        		'reservation_id' => 13,
                'service_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        	[
        		'reservation_id' => 13,
                'service_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

        DB::table('employee_reservation')->insert([
        	[
        		'reservation_id' => 13,
                'employee_id' => 5,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        	[
        		'reservation_id' => 13,
                'employee_id' => 6,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);

    }
}
