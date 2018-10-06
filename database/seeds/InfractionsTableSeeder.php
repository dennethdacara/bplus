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
        DB::table('infractions')->delete();
        $json = storage_path() . "/json_data/infractions.json";
        $data = json_decode(file_get_contents($json, true));
        foreach ($data as $obj) {
            App\Infraction::create([
                'id' => $obj->id,
                'employee_id' => $obj->employee_id,
				'date' => $obj->date,
				'type' => $obj->type,
				'deduction' => $obj->deduction,
            ]);
        }
    }
}
