<?php

namespace Database\Seeders;

use App\Models\Budget;
use Illuminate\Database\Seeder;
use PhpOffice\PhpSpreadsheet\IOFactory;

class SpecialtiesSeeder extends Seeder
{

    public function run()
    {

        \DB::table('mz_specialties')->insert([
            ['name' => 'Отсутсвует'],
            ['name' => 'Процедурный кабинет'],
            ['name' => 'Лечащий врач'],
            ['name' => 'Терапевтический кабинет'],
            ['name' => 'Физиотерапия'],
            ['name' => 'МРТ'],
            ['name' => 'УЗИ']
        ]);


    }
}
