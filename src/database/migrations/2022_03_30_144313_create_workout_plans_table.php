<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkoutPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workout_plans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('athlete_user_id')->index();
            //外部キーをつける(参照する)には、foreignメソッドにathlete_user_idカラムを指定して、referencesメソッドにforeignメソッドで指定したカラム(athlete_user_idカラム)と
            //紐づくカラムがどのテーブルのどのカラムかを指定する。今回は、athlete_usersテーブルのidカラムがmedical_historiesテーブルのathlete_user_idカラムと紐づいている。
            $table->foreign('athlete_user_id')->references('id')->on('athlete_users');
            $table->date('date')->nullable(false);
            $table->text('purpose');
            $table->text('goal');
            $table->string('workout1_name');
            $table->string('workout1_set');
            $table->string('workout1_rest');
            $table->text('workout1_detail');
            $table->string('workout2_name');
            $table->string('workout2_set');
            $table->string('workout2_rest');
            $table->text('workout2_detail');
            $table->string('workout3_name');
            $table->string('workout3_set');
            $table->string('workout3_rest');
            $table->text('workout3_detail');
            $table->string('workout4_name');
            $table->string('workout4_set');
            $table->string('workout4_rest');
            $table->text('workout4_detail');
            $table->string('workout5_name');
            $table->string('workout5_set');
            $table->string('workout5_rest');
            $table->text('workout5_detail');
            $table->string('workout6_name');
            $table->string('workout6_set');
            $table->string('workout6_rest');
            $table->text('workout6_detail');
            $table->string('workout7_name');
            $table->string('workout7_set');
            $table->string('workout7_rest');
            $table->text('workout7_detail');
            $table->string('workout8_name');
            $table->string('workout8_set');
            $table->string('workout8_rest');
            $table->text('workout8_detail');
            $table->string('workout9_name');
            $table->string('workout9_set');
            $table->string('workout9_rest');
            $table->text('workout9_detail');
            $table->string('workout10_name');
            $table->string('workout10_set');
            $table->string('workout10_rest');
            $table->text('workout10_detail');
            $table->string('workout11_name');
            $table->string('workout11_set');
            $table->string('workout11_rest');
            $table->text('workout11_detail');
            $table->string('workout12_name');
            $table->string('workout12_set');
            $table->string('workout12_rest');
            $table->text('workout12_detail');
            $table->string('workout13_name');
            $table->string('workout13_set');
            $table->string('workout13_rest');
            $table->text('workout13_detail');
            $table->string('workout14_name');
            $table->string('workout14_set');
            $table->string('workout14_rest');
            $table->text('workout14_detail');
            $table->string('workout15_name');
            $table->string('workout15_set');
            $table->string('workout15_rest');
            $table->text('workout15_detail');
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
        //外部キー制約を削除する
        $table->dropForeign(['athlete_user_id']);
        Schema::dropIfExists('workout_plans');
    }
}
