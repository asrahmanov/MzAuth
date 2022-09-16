<?php

namespace Database\Seeders;

use App\Models\Budget;
use Illuminate\Database\Seeder;
use PhpOffice\PhpSpreadsheet\IOFactory;

class RolesSeeder extends Seeder
{

    public function run()
    {

        \DB::table('mz_roles')->insert([
            ['name' => 'Отсутсвует'],
            ['name' => 'Доктор'],
            ['name' => 'Менеджер'],
            ['name' => 'Администратор'],
            ['name' => 'Глобальный администратор'],
            ['name' => 'Администратор Полюстры'],
            ['name' => 'Кассир'],
            ['name' => 'Старший менеджер'],
            ['name' => 'Старшая мед.сестра'],
            ['name' => 'Руководитель CallCenter'],
        ]);


    }
}
