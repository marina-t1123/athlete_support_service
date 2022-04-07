<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalQuestionnaire extends Model
{
    use HasFactory;

    //このモデルで使用するテーブル名を指定する。
    protected $table = 'medical_questionnaires';

    //fillableメソッドを使い、DBの操作で値を変更したいカラムを指定する。
    protected $fillable = ['name', 'athlete_user_id', 'medical_examination_day', 'tall', 'weight', 'event', 'dominant_hand', 'dominant_leg', 'injury_day', 'body_parts', 'how', 'orthopedic_test', 're_injured', 'image'];

    //リレーションをはる
    /**
     * 選手情報とリレーションをはる
     */
    public function athleteUser()
    {
        return $this->belongTo();
    }
    /**
     * カルテとリレーションをはる
     */
    public function medicalRecord()
    {
        return $this->hasOne();
    }
}
