<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAthleteUserIdColumnAndMedicalQuestionnaireIdColumnToMedicalRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medical_records', function (Blueprint $table) {
            //整数型のathlete_user_idカラムとmedical_questionnaireカラムにindexを指定して追加する
            $table->unsignedBigInteger('athlete_user_id');
            $table->unsignedBigInteger('medical_questionnaire_id');
            //外部キーをつける(参照する)には、foreignメソッドにathlete_user_idカラムを指定して、referencesメソッドにforeignメソッドで指定したカラム(athlete_user_idカラム)と
            //紐づくカラムがどのテーブルのどのカラムかを指定する。今回は、athlete_usersテーブルのidカラムがmedical_questionnairesテーブルのathlete_user_idカラムと紐づいている。
            $table->foreign('athlete_user_id')->references('id')->on('athlete_users');
            $table->foreign('medical_questionnaire_id')->references('id')->on('medical_questionnaires');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medical_records', function (Blueprint $table) {
            //外部キー制約を設定しているカラムの設定を解除する
            $table->dropForeign('athlete_user_id');
            $table->dropForeign('medical_questionnaire_id');
            //追加したカラムを削除する
            $table->dropColumn('athlete_user_id');
            $table->dropColumn('medical_questionnaire_id');
        });
    }
}
