<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pet', function (Blueprint $table) {
            $table->id();
            $table->integer('owner_id');
            $table->string('name');
            $table->date('dob');
            $table->string('species');
            $table->string('sex');
            $table->string('race');
            $table->string('color');
            $table->string('pattern');
            $table->string('age');
            $table->string('blood_type');
            $table->string('desexing');
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
        Schema::dropIfExists('pet');
    }
}
