<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends Model
{
    use HasFactory;

    //このモデルで使用するテーブル名を指定する。
    protected $table = 'medical_histories';

    //fillableメソッドを使い、DBの操作で値を変更したいカラムを指定する。
    protected $fillable = ['name', 'event', 'dominant_hand', 'dominant_leg', 'injury_day', 'body_parts', 'how', 'medical', 'diagnosis'];

    //リレーションをはる
    /**
     * 選手情報とリレーションをはる
     */
    public function athleteUser()
    {
        return $this->belongTo();
    }

}
