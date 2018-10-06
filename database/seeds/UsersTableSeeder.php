<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $json = storage_path() . "/json_data/users.json";
        $data = json_decode(file_get_contents($json, true));
        foreach ($data as $obj) {
            App\User::create([
                'id' => $obj->id,
                'role_id' => $obj->role_id,
                'firstname' => $obj->firstname,
                'middlename' => null,
                'lastname' => $obj->lastname,
                'email' => $obj->email,
                'password' => bcrypt($obj->password),
                'contact_no' => $obj->contact_no,
                'address' => $obj->address,
                'gender' => $obj->gender,
                'expertise_id' => $obj->expertise_id
            ]);
        }
    }
}
