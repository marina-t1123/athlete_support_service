<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    use HasFactory;

    //このモデルで使用するテーブル名を指定する。
    protected $table = 'medical_records';

    //fillableメソッドを使い、DBの操作で値を変更したいカラムを指定する。
    protected $fillable = ['athlete_user_id', 'name', 'medical_examination_day', 'diagnosis', 'event', 'tall', 'weight', 'injury_day', 'orthopedic_test', 'pain', 'swelling', 'main_complaint', 'examination_record', 'supplement_memo', 'assessment_image0', 'assessment_image1', 'assessment_image2', 'plan'];

    //リレーションをはる
    /**
     * 選手情報とリレーションをはる
     */
    public function athleteUser()
    {
        return $this->belongTo();
    }
    /**
     * 問診票とリレーションをはる
     */
    public function medicalQuestionnaire()
    {
        return $this->belongsTo();
    }
}
