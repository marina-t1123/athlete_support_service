<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkoutPlan extends Model
{
    use HasFactory;

    //このモデルで使用するテーブル名を指定する。
    protected $table = 'workout_plan';

    //fillableメソッドを使い、DBの操作で値を変更したいカラムを指定する。
    protected $fillable = [
        'athlete_user_id',
        'name',
        'date',
        'purpose',
        'goal',
        'workout_name1',
        'workout_set1',
        'workout_rest1',
        'workout_detail1',
        'workout_name2',
        'workout_set2',
        'workout_rest2',
        'workout_detail2',
        'workout_name3',
        'workout_set3',
        'workout_rest3',
        'workout_detail3',
        'workout_name4',
        'workout_set4',
        'workout_rest4',
        'workout_detail4',
        'workout_name5',
        'workout_set5',
        'workout_rest5',
        'workout_detail5',
        'workout_name6',
        'workout_set6',
        'workout_rest6',
        'workout_detail6',
        'workout_name7',
        'workout_set7',
        'workout_rest7',
        'workout_detail7',
        'workout_name8',
        'workout_set8',
        'workout_rest8',
        'workout_detail8',
        'workout_name9',
        'workout_set9',
        'workout_rest9',
        'workout_detail9',
        'workout_name10',
        'workout_set10',
        'workout_rest10',
        'workout_detail10',
        'workout_name11',
        'workout_set11',
        'workout_rest11',
        'workout_detail11',
        'workout_name12',
        'workout_set12',
        'workout_rest12',
        'workout_detail12',
        'workout_name13',
        'workout_set13',
        'workout_rest13',
        'workout_detail13',
        'workout_name14',
        'workout_set14',
        'workout_rest14',
        'workout_detail14',
        'workout_name15',
        'workout_set15',
        'workout_rest15',
        'workout_detail15',
        'memo'
    ];

    //リレーションをはる
    /**
     * 選手情報とリレーションをはる
     */
    public function athleteUser()
    {
        return $this->belongTo();
    }

}
