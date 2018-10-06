<?php

use Illuminate\Database\Seeder;

class VatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vat')->delete();
        $json = storage_path() . "/json_data/vat.json";
        $data = json_decode(file_get_contents($json, true));
        foreach ($data as $obj) {
            App\Vat::create([
                'id' => $obj->id,
                'percentage' => $obj->percentage,
            ]);
        }
    }
}
