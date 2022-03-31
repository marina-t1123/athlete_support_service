<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnToMedicalQuestionnairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medical_questionnaires', function (Blueprint $table) {
            //nullを許可するカラムを選択
            $table->text('orthopedic_test')->nullable()->change();
            $table->string('image')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medical_questionnaires', function (Blueprint $table) {
            //null許可を解除する
            $table->text('orthopedic_test')->nullable(false)->change();
            $table->string('image')->nullable(false)->change();
        });
    }
}
