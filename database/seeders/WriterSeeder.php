<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Writer;

class WriterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $writer1 = new Writer;
        $writer1->name = "Nick Santora";
        $writer1->save();

        $writer2 = new Writer;
        $writer2->name = "Anthony Jaswinski";
        $writer2->save();
    }
}
