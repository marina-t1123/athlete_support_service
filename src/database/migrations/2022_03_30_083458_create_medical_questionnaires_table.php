<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalQuestionnairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_questionnaires', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->datetime('medical_examination_day');
            $table->string('tall');
            $table->string('weight');
            $table->string('event');
            $table->string('dominant_hand');
            $table->string('dominant_leg');
            $table->date('injury_day');
            $table->string('body_parts');
            $table->text('how');
            $table->text('orthopedic_test');
            $table->string('re_injured');
            $table->string('image');
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
        Schema::dropIfExists('medical_questionnaires');
    }
}
