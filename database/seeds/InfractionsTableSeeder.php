<?php

use Illuminate\Database\Seeder;

class InfractionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('infractions')->insert([
        	[
        		'employee_id' => 5,
        		'date' => '03/15/2018',
        		'type' => 'Absent',
        		'deduction' => 113,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],

        	[
        		'employee_id' => 6,
        		'date' => '03/16/2018',
        		'type' => 'Absent',
        		'deduction' => 113,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],

        	[
        		'employee_id' => 7,
        		'date' => '03/17/2018',
        		'type' => 'Absent',
        		'deduction' => 113,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);
    }
}
