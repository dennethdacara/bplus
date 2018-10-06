<?php

use Illuminate\Database\Seeder;

class EmployeeSalaryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('salary')->delete();
        $json = storage_path() . "/json_data/employee_salary.json";
        $data = json_decode(file_get_contents($json, true));
        foreach ($data as $obj) {
            App\Salary::create([
                'id' => $obj->id,
                'employee_id' => $obj->employee_id,
                'employee_salary' => $obj->employee_salary,
            ]);
        }
    }
}
