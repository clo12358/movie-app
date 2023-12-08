<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genre1 = new Genre;
        $genre1->name = "Melodrama";
        $genre1->description = "A story or play in which there are a lot of exciting or sad events and in which people's emotions are very exaggerated";
        $genre1->save();

        $genre2 = new Genre;
        $genre2->name = "Horror";
        $genre2->description = "Horror is a genre of fiction that is intended to disturb, frighten or scare. Horror is often divided into the sub-genres of psychological horror and supernatural horror, which are in the realm of speculative fiction.";
        $genre2->save();
    }
}
