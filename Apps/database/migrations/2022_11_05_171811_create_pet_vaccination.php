<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetVaccination extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pet_vaccination', function (Blueprint $table) {
            $table->id();
            $table->integer('pet_id');
            $table->integer('vet_id');
            $table->date('vaccine_date');
            $table->string('vaccine_type');
            $table->text('vet_note');
            $table->date('next_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pet_vaccination');
    }
}
