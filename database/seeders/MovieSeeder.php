<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;
use App\Models\Director;
use App\Models\Writer;
use App\Models\Genre;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $director1 = Director::where('first_name', 'Stephen')->first();
        $writer1 = Writer::where('name', 'Nick Santora')->first();

        $movie1 = new Movie;
        $movie1->name = "Dog Gone";
        $movie1->description = "A father-son duo grow closer while hiking the Appalachian Trail looking for their precious lost dog, Gonker, so they can give him the monthly life-saving medicine he needs against Addison's disease.";
        $movie1->rating = "4 stars";
        $movie1->run_time = "1hr 35mins";
        $movie1->director_id = $director1->id;
        $movie1->writer_id = $writer1->id;
        $movie1->producer = "Jeremy Kipp Walker";
        $movie1->release_date = "2023-01-13";
        $movie1->movie_image = 'dog_gone.png';
        $movie1->save();

        $director2 = Director::where('first_name', 'Juame')->first();
        $writer2 = Writer::where('name', 'Anthony Jaswinski')->first();

        $movie2 = new Movie;
        $movie2->name = "The Shallows";
        $movie2->description = "Nancy travels to a secluded beach following the death of her mother. While surfing, she gets attacked by a great white shark, which leaves her stranded on a rock 200 yards from the shore.";
        $movie2->rating = "3 stars";
        $movie2->run_time = "1hr 26mins";
        $movie2->director_id = $director2->id;
        $movie2->writer_id = $writer2->id;
        $movie2->producer = "Matti Leshem";
        $movie2->release_date = "2016-06-24";
        $movie2->movie_image = 'the_shallows.jpeg';
        $movie2->save();
    }
}
