<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;
use App\Models\AthleteUser;
use App\Models\MedicalHistory;
use App\Models\MedicalQuestionnaire;
use App\Models\MedicalRecord;
//DBファサード(DBの操作をするための便利メソッドが入ったクラス)を使えるようにする。
use Illuminate\Support\Facades\DB;

class AthleteUserController extends Controller
{
    //選手情報の新規登録ページを表示するアクション
    public function new()
    {
        return view('athleteUsers.new');
    }

    //選手情報の新規登録を行うアクション
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'affiliation' => 'required|string|max:255',
            'event' => 'required|string|max:255',
            'sex' => 'required|string|max:255',
            'age' => 'required|string|max:255',
            'tall' => 'required|string|max:255',
            'weight' => 'required|string|max:255'
        ]);

        //AthleteUserモデルを使用して、DBに登録する値をセットする
        $athleteUser = new AthleteUser;
         //上記で「use App\Models\AthleteUser」で名前空間を使用しているので、クラス名をnewしてインスタンス化できる。
         //Modelクラス(AthleteUserのModelクラス)で指定しているfillableメソッドで指定しているカラムと$requestに入っている入力内容(allメソッドで入力内容を全て取り出している)と照らし合わせてsaveメソッドを使ってDB(athlete_userテーブル)に登録する。

        //登録した選手のidカラムの値を持つ、既往歴と問診票を作成する
        $medicalHistory = MedicalHistory::create(['athlete_user_id' => AthleteUser::find($id)->id ]);
        $medicalQuestionnaire = MedicalQuestionnaire::create(['athlete_user_id' => AthleteUser::find($id)->id ]);

        //選手一覧ページへリダイレクトする
        //その際にsessionメッセージを入れる
        return redirect('athleteUsers/index')->with('message', __('Registered.'));
    }
    //選手情報の編集ページを表示するアクション
    public function edit($id)
    {
        if(!ctype_digit($id))
        {
            //get送信された選手のidカラムの値が数字か確認する
            if(!ctype_digit($id))
            {
                //post送信されたidカラムの値が数字じゃなかった場合、選手一覧ページに遷移してメッセージを表示する
                return redirect('/athleteUsers/index')->with(flash_message, __('Invalid operation was performed'));
            }

            //問題なかった場合、DBに登録されている選手情報からpost送信されたidカラムの値を持つ選手情報を検索・取得する
            $athleteUser = AthleteUser::find($id);
            return view('athleteUsers.edit', ['athleteUser' => AthleteUser::find($id)]);
        }
    }

    //選手情報の編集ページを行うアクション
    public function update($id)
    {
        //getパラメータのidカラムの値が数字かどうか確認する
        if(!ctype_digit($id))
        {
            return redirect('/athleteUsers/{id}/detail')->with(flash_message, __('Invalid operation was performed'));

        }
    }
    //選手情報一覧ページを表示するアクション


    //選手情報詳細ページを表示するアクション

    //選手情報を削除するアクション
}
