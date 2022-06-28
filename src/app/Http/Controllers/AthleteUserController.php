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

    //選手情報の編集ページを表示するアクション
    public function update($id)
    {
        //getパラメータのidカラムの値が数字かどうか確認する
        if(!ctype_digit($id))
        {
            return redirect('/athleteUsers/{id}/detail')->with(flash_message, __('Invalid operation was performed'));

        }
    }

    //選手情報一覧ページを表示するアクション
    public function index(Request $request){

        //検索フォームの入力値を変数keywordに格納
        $keyword = $request->input('keyword');
        //クエリ生成
        $query = AthleteUser::query();
        //AthleteUserクラス(モデル)に対して、queryメソッドを実行。クエリビルダーでクエリを組み立ててくれるようにする。

        //もし、検索フォームで入力があった場合
        if(!empty($keyword)){
            $query->where('name', 'Like', "%{$keyword}%");
            //AthleteUserモデルに対して、クエリビルダインスタンスのwhereメソッドを使う。
            //WHERE句：テーブルデータの検索条件を指定するためのSQL構文。
            //第一引数でカラム名、第二引数でDBがサポートしているオペレータ、第三引数にカラムに対して比較する値を指定する。
            //AthleteUsersテーブルのnameカラムで選手検索フォームで入力した内容(選手登録で登録している名前)を持っているレコードを曖昧検索している
            //LIKE句：ワイルドカード文字(%〇〇%)で指定した文字を使用して、曖昧検索を行うことができる。(〇〇を含む文字列を探すということ)
        }

        $athleteUsers = $query->get();
        //変数athleteUsersに検索フォームで該当した選手情報があった場合はその選手情報を取得する。
        //検索フォームで入力がなかった場合は登録されている全選手の情報を変数に格納する。

        //選手のインスタンス(AthleteUser)をallメソッドを使って、全て取り出して変数に格納する。
        return view('athleteUsers.index', compact('athleteUsers', 'keyword'));
    }

    //選手情報詳細ページを表示するアクション
    public function detail($id){
        if(!ctype_digit($id)){
            return redirect('/athleteUsers/index')->with(flash_message, __('Invalid operation was performed'));
        }
        $athleteUser = AthleteUser::find($id);

        return view('athleteUsers.detail', ['athleteUser' => $athleteUser]);
    }

    //選手情報を削除するアクション
    public function destroy($id){
        //GETパタメータ(削除する選手ID)が数字かチェックする
        if(!ctype_digit($id)){
            return redirect('/medicalRecords/new')->with('flash_message', __('Invalid operation was performed.'));
        }

        //削除する選手の既往歴データを取得して、削除する
        //既往歴がコレクション形式で取得できるので繰り返し処理で、1つ1つ削除処理を実行する
        AthleteUser::find($id)->medicalHistories->each(function ($medicalHistories) {
            $medicalHistories->delete();
        });

        //削除する選手の問診票データを取得して削除する
        AthleteUser::find($id)->medicalQuestionnaires->each(function ($medicalQuestionnaires) {
            $medicalQuestionnaires->delete();
        });

        //削除する選手のカルテデータを取得して削除する
        AthleteUser::find($id)->medicalRecords->each(function ($medicalRecords) {
            $medicalRecords->delete();
        });

        //削除する選手のトレーニングメニューを削除する
        AthleteUser::find($id)->workoutPlans->each(function ($workoutPlans) {
            $workoutPlans->delete();
        });

        //選手に関連するデータを削除したら、最後に選手情報を削除する
        AthleteUser::find($id)->delete();

        //削除処理が終了後に新規選手登録画面にリダイレクトする
        return redirect('/athleteUsers/new')->with('flash_message', __('Deleted athlete information.'));

    }
}
