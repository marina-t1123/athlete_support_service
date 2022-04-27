<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AthleteUserController;
use App\Http\Controllers\MedicalHistoryController;
use App\Http\Controllers\MedicalQuestionnaireController;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\WorkoutPlanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//選手一覧ページの表示するルーティング
Route::get('/athleteUsers/index', [AthleteUserController::class, 'index'])->name('athleteUser.index');
//選手登録画面を表示するルーティング
Route::get('/athleteUsers/new', [AthleteUserController::class, 'new'])->name('athleteUser.new');
//選手登録をするためのルーティング
Route::post('/athleteUsers/new', [AthleteUserController::class, 'create'])->name('athleteUser.create');
//選手詳細画面を表示するためのルーティング
Route::get('/athleteUsers/{id}/detail', [AthleteUserController::class, 'detail'])->name('athleteUser.detail');
//選手編集画面を表示するルーティング
Route::get('/athleteUsers/{id}/edit', [AthleteUserController::class, 'edit'])->name('athleteUser.edit');
//選手編集をするためのルーティング
Route::post('/athleteUsers/{id}/edit', [AthleteUserController::class, 'update'])->name('athleteUser.update');
//選手削除をするためのルーティング
Route::post('/athleteUsers/{id}/detail', [AthleteUserController::class, 'update'])->name('athleteUser.update');
//既往歴一覧ページの表示するルーティング
Route::get('/medicalHistories/index', [MedicalHistoryController::class, 'index'])->name('medicalHistory.index');
//既往歴登録画面を表示するルーティング
Route::get('/medicalHistories/new', [MedicalHistoryController::class, 'new'])->name('medicalHistory.new');
//既往歴登録をするためのルーティング
Route::post('/medicalHistories/new', [MedicalHistoryController::class, 'create'])->name('medicalHistory.create');
//既往歴詳細画面を表示するためのルーティング
Route::get('/medicalHistories/{id}/detail', [MedicalHistoryController::class, 'detail'])->name('medicalHistory.detail');
//既往歴編集画面を表示するルーティング
Route::get('/medicalHistories/{id}/edit', [MedicalHistoryController::class, 'edit'])->name('medicalHistory.edit');
//既往歴編集をするためのルーティング
Route::post('/medicalHistories/{id}/edit', [MedicalHistoryController::class, 'update'])->name('medicalHistory.update');
//既往歴削除をするためのルーティング
Route::post('/medicalHistories/{id}/detail', [MedicalHistoryController::class, 'update'])->name('medicalHistory.update');
//問診票一覧ページの表示するルーティング
Route::get('/medicalQuestionnaires/index', [MedicalQuestionnaireController::class, 'index'])->name('medicalQuestionnaire.index');
//問診票登録画面を表示するルーティング
Route::get('/medicalQuestionnaires/new', [MedicalQuestionnaireController::class, 'new'])->name('medicalQuestionnaire.new');
//問診票登録をするためのルーティング
Route::post('/medicalQuestionnaires/new', [MedicalQuestionnaireController::class, 'create'])->name('medicalQuestionnaire.create');
//問診票詳細画面を表示するためのルーティング
Route::get('/medicalQuestionnaires/{id}/detail', [MedicalQuestionnaireController::class, 'detail'])->name('medicalQuestionnaire.detail');
//問診票編集画面を表示するルーティング
Route::get('/medicalQuestionnaires/{id}/edit', [MedicalQuestionnaireController::class, 'edit'])->name('medicalQuestionnaire.edit');
//問診票編集をするためのルーティング
Route::post('/medicalQuestionnaires/{id}/edit', [MedicalQuestionnaireController::class, 'update'])->name('medicalQuestionnaire.update');
//問診票削除をするためのルーティング
Route::post('/medicalQuestionnaires/{id}/detail', [MedicalQuestionnaireController::class, 'update'])->name('medicalQuestionnaire.update');
//カルテ一覧ページの表示するルーティング
Route::get('/medicalRecords/index', [MedicalRecordController::class, 'index'])->name('medicalRecord.index');
//カルテ登録画面を表示するルーティング
Route::get('/medicalRecords/new', [MedicalRecordController::class, 'new'])->name('medicalRecord.new');
//カルテ登録をするためのルーティング
Route::post('/medicalRecords/new', [MedicalRecordController::class, 'create'])->name('medicalRecord.create');
//カルテ詳細画面を表示するためのルーティング
Route::get('/medicalRecords/{id}/detail', [MedicalRecordController::class, 'detail'])->name('medicalRecord.detail');
//カルテ編集画面を表示するルーティング
Route::get('/medicalRecords/{id}/edit', [MedicalRecordController::class, 'edit'])->name('medicalRecord.edit');
//カルテ編集をするためのルーティング
Route::post('/medicalRecords/{id}/edit', [MedicalRecordController::class, 'update'])->name('medicalRecord.update');
//カルテ削除をするためのルーティング
Route::post('/medicalRecords/{id}/detail', [MedicalRecordController::class, 'update'])->name('medicalRecord.update');
//トレーニングメニュー一覧ページの表示するルーティング
Route::get('/workoutPlans/index', [WorkoutPlanController::class, 'index'])->name('workoutPlan.index');
//トレーニングメニュー登録画面を表示するルーティング
Route::get('/workoutPlans/new', [WorkoutPlanController::class, 'new'])->name('workoutPlan.new');
//トレーニングメニュー登録をするためのルーティング
Route::post('/workoutPlans/new', [WorkoutPlanController::class, 'create'])->name('workoutPlan.create');
//トレーニングメニュー詳細画面を表示するためのルーティング
Route::get('/workoutPlans/{id}/detail', [WorkoutPlanController::class, 'detail'])->name('workoutPlan.detail');
//トレーニングメニュー編集画面を表示するルーティング
Route::get('/workoutPlans/{id}/edit', [WorkoutPlanController::class, 'edit'])->name('workoutPlan.edit');
//トレーニングメニュー編集をするためのルーティング
Route::post('/workoutPlans/{id}/edit', [WorkoutPlanController::class, 'update'])->name('workoutPlan.update');
//トレーニングメニュー削除をするためのルーティング
Route::post('/workoutPlans/{id}/detail', [WorkoutPlanController::class, 'update'])->name('workoutPlan.update');

