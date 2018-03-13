<?php

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
        	[
        		'name' => 'Hair Cut',
        		'price' => 49,
        		'service_type_id' => 1,
                'expertise_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        	],
            [
                'name' => 'Hot Oil',
                'price' => 99,
                'service_type_id' => 1,
                'expertise_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Hi-Lites',
                'price' => 199,
                'service_type_id' => 1,
                'expertise_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Hair Color',
                'price' => 399,
                'service_type_id' => 1,
                'expertise_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Hair Cellophane',
                'price' => 299,
                'service_type_id' => 1,
                'expertise_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Hair Perming',
                'price' => 399,
                'service_type_id' => 1,
                'expertise_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Semi Rebond',
                'price' => 499,
                'service_type_id' => 1,
                'expertise_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Hair Rebonding',
                'price' => 999,
                'service_type_id' => 1,
                'expertise_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Brazilian Blowout',
                'price' => 1299,
                'service_type_id' => 1,
                'expertise_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Hair and Make-up',
                'price' => 599,
                'service_type_id' => 1,
                'expertise_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Hair Spa',
                'price' => 149,
                'service_type_id' => 1,
                'expertise_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            
            [
                'name' => 'Hair Blower',
                'price' => 49,
                'service_type_id' => 1,
                'expertise_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Hair Ironing',
                'price' => 149,
                'service_type_id' => 1,
                'expertise_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Keratin',
                'price' => 299,
                'service_type_id' => 1,
                'expertise_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            
            [
                'name' => 'Hair Color and Treatment',
                'price' => 699,
                'service_type_id' => 1,
                'expertise_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'name' => 'Manicure',
                'price' => 59,
                'service_type_id' => 2,
                'expertise_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Pedicure',
                'price' => 59,
                'service_type_id' => 2,
                'expertise_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Foot Spa',
                'price' => 149,
                'service_type_id' => 2,
                'expertise_id' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Change Polish',
                'price' => 50,
                'service_type_id' => 2,
                'expertise_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Gel Polish',
                'price' => 300,
                'service_type_id' => 2,
                'expertise_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Mani/Pedi with Nail Arts',
                'price' => 150,
                'service_type_id' => 2,
                'expertise_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        	
        ]);
    }
}
