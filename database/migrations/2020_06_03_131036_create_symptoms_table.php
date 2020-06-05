<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->int('patient_national_id');
            $table->integer('age');
            $table->boolean('fever');
            $table->boolean('dry_cough');
            $table->boolean('tiredness');
            $table->boolean('aches_and_pains');
            $table->boolean('sore_throat');
            $table->boolean('diarrhoea');
            $table->boolean('conjunctivitis');
            $table->boolean('headache');
            $table->boolean('loss_of_smell');
            $table->boolean('difficulty_breathing');
            $table->boolean('chest_pain');
            $table->boolean('loss_of_speech');
            $table->boolean('loss_of_movement');
            $table->boolean('label');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
