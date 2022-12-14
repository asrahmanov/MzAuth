<?php

namespace Database\Seeders;

use App\Models\Budget;
use App\Models\Roles;
use App\Models\Specialties;
use Illuminate\Database\Seeder;


class UsersSeeder extends Seeder
{

    public function run()
    {

        $users = file_get_contents('http://91.142.85.12:35080/new/GLOBALPHP/migration/getUsers.php', false);
        $users = json_decode($users);


        $speciality = Specialties::all();
        $roles = Roles::all();


        foreach ($users as $key => $item) {
            $insertArray = [];

            if($item->speciality_name == 0) {
                $item->speciality_name = "Отсутсвует";
            }


            $speciality_id = search_in_array_objects($item->speciality_name, $speciality, 'name');
            $role_id = search_in_array_objects($item->role_name, $roles, 'name');

            $insertArray[] = [
                "id" => $key,
                "pid" => $item->pid,
                "clinic_id" => $item->clinic_id,
                "login" => $item->login,
                "first_name" => $item->first_name,
                "last_name" => '-',
                "password" => $item->password,
                "hide" => $item->hide,
                "role_id" => $role_id,
                "speciality_id" => $speciality_id,
            ];

            \DB::table('mz_users')->insert($insertArray);
        }


    }
}
