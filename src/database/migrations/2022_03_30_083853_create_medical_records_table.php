<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_records', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->datetime('medical_examination_day');
            $table->string('event');
            $table->string('weight');
            $table->date('injury_day');
            $table->string('diagnosis');
            $table->text('orthopedic_test');
            $table->string('pain');
            $table->string('swelling');
            $table->text('main_complaint');
            $table->text('examination_record');
            $table->text('note');
            $table->string('assessment_image0');
            $table->string('assessment_image1');
            $table->string('assessment_image2');
            $table->text('plan');
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
        Schema::dropIfExists('medical_records');
    }
}
