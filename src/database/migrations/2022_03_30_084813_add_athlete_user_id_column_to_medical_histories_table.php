<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAthleteUserIdColumnToMedicalHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medical_histories', function (Blueprint $table) {
            //整数型のathlete_user_idカラムにindexを指定して追加する
            $table->unsignedBigInteger('athlete_user_id');
            //外部キーをつける(参照する)には、foreignメソッドにathlete_user_idカラムを指定して、referencesメソッドにforeignメソッドで指定したカラム(athlete_user_idカラム)と
            //紐づくカラムがどのテーブルのどのカラムかを指定する。今回は、athlete_usersテーブルのidカラムがmedical_questionnairesテーブルのathlete_user_idカラムと紐づいている。
            $table->foreign('athlete_user_id')->references('id')->on('athlete_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medical_histories', function (Blueprint $table) {
            //外部キー制約を設定しているカラムの設定を解除する
            $table->dropForeign('athlete_user_id');
            //追加したカラムを削除する
            $table->dropColumn('athlete_user_id');
        });
    }
}
