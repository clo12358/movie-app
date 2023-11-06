<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->enum('rating', ['1 star', '2 stars', '3 stars', '4 stars', '5 stars']);
            $table->string('run_time');

            $table->foreignId('director_id')->constrained();
            $table->foreignId('genre_id')->constrained();
            $table->foreignId('writer_id')->constrained();

            // $table->foreign('director_id')->references('id')->on('directors');
            // $table->foreign('genre_id')->references('id')->on('genres');
            $table->string('producer');
            // $table->foreign('writer_id')->references('id')->on('writers');
            $table->date('release_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
