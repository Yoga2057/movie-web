<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('movie', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('imDB');
            $table->string('title', 50);
            $table->year('year');
            $table->string('genre', 50);
            $table->string('poster', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('movie');
    }
}
