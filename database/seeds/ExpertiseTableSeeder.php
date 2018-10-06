<?php

use Illuminate\Database\Seeder;

class ExpertiseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('expertise')->delete();
        $json = storage_path() . "/json_data/expertise.json";
        $data = json_decode(file_get_contents($json, true));
        foreach ($data as $obj) {
            App\Expertise::create([
                'id' => $obj->id,
                'name' => $obj->name,
                'service_fee' => $obj->service_fee,
            ]);
        }
    }
}
