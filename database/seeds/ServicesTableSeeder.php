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
        DB::table('services')->delete();
        $json = storage_path() . "/json_data/services.json";
        $data = json_decode(file_get_contents($json, true));
        foreach ($data as $obj) {
            App\Service::create([
                'id' => $obj->id,
                'name' => $obj->name,
                'price' => $obj->price,
                'service_type_id' => $obj->service_type_id,
                'expertise_id' => $obj->expertise_id,
            ]);
        }
    }
}
