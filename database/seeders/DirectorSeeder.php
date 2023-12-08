<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Director;

class DirectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $director1 = new Director;
        $director1->first_name = "Stephen";
        $director1->last_name = "Herek";
        $director1->save();

        $director2 = new Director;
        $director2->first_name = "Juame";
        $director2->last_name = "Collet-Serra";
        $director2->save();
    }
}
