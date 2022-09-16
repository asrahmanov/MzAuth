<?php

namespace Database\Seeders;

use App\Models\Budget;
use Illuminate\Database\Seeder;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ClinicsSeeder extends Seeder
{

    public function run()
    {

        $clinics = file_get_contents('http://91.142.85.12:35080/new/GLOBALPHP/migration/getClinics.php', false);
        $clinics = json_decode($clinics);

        foreach ($clinics as $key => $item) {
            $insertArray = [];

            $insertArray[] = [
                "id" => $key,
                "name" => $item->name,
                "short_name" => $item->short_name
            ];

            \DB::table('mz_clinics')->insert($insertArray);
        }


    }
}
