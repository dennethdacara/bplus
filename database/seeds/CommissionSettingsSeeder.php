<?php

use Illuminate\Database\Seeder;

class CommissionSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('commission_settings')->delete();
        $json = storage_path() . "/json_data/commission_settings.json";
        $data = json_decode(file_get_contents($json, true));
        foreach ($data as $obj) {
            App\CommissionSetting::create([
                'id' => $obj->id,
                'percentage' => $obj->percentage,
            ]);
        }
    }
}
