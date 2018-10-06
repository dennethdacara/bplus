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
        DB::table('service_type')->delete();
        $json = storage_path() . "/json_data/service_types.json";
        $data = json_decode(file_get_contents($json, true));
        foreach ($data as $obj) {
            App\ServiceType::create([
                'id' => $obj->id,
                'name' => $obj->name,
            ]);
        }
    }
}
