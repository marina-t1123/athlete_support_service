<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AthleteUser extends Model
{
    use HasFactory;

    //athlete_usersテーブルをこのモデルで使用できるように指定する
    protected $table = 'athlete_users';

    //fillableメソッドを使い、DBの操作で値を変更したいカラムを指定する。
    protected $fillable = ['name', 'affiliation', 'event', 'sex', 'age', 'tall', 'weight'];

    //リレーションをはる
    /**
     * 登録選手の既往歴を取得する
    */
    public function medicalHistories()
    {
        return $this->hasMany();
    }
    /**
     * 登録選手の既往歴を取得する
    */
    public function medicalQuestionnaires()
    {
        return $this->hasMany();
    }
    /**
     * 登録選手のカルテを取得する
    */
    public function medicalRecords()
    {
        return $this->hasMany();
    }
    /**
     * 登録選手のトレーニングメニューを取得する
     */
    public function workoutPlans()
    {
        return $this->hasMany();
    }
}
