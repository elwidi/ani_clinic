<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetVisit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pet_visit', function (Blueprint $table) {
            $table->id();
            $table->integer('pet_id');
            $table->integer('vet_id');
            $table->text('prognosis');
            $table->string('weight');
            $table->string('temperature');
            $table->text('diagnose');
            $table->text('note');
            $table->integer('admin_id');
            $table->date('visit_date');
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
        Schema::dropIfExists('pet_visit');
    }
}
