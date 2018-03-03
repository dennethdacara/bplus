<?php

use Illuminate\Database\Seeder;

class ServiceTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service_type')->insert([
        	[
        		'name' => 'hair fashion and treatments',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        	[
        		'name' => 'other treatments',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);
    }
}
