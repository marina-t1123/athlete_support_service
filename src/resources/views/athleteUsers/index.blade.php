@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- メニュー -->
        <ul>
            <li><a href="/athleteUsers/new">{{ __('New athlete user')}}</a></li>
            <li><a href="/medicalHistories/new">{{ __('New medical history')}}</a></li>
            <li><a href="/medicalQuestionnaires/new">{{ __('New medical questionnaire')}}</a></li>
            <li><a href="/medicalRecords/new">{{ __('New medical record')}}</a></li>
            <li><a href="/workoutPlans/new">{{ __('New workout plan')}}</a></li>
        </ul>
        <!-- 検索フォーム -->
        <form action="{{ url('/athleteUsers/index' )}}" method="get" class="p-searchForm">
            <div class="form-group row">

                <label for="search" class="col-md-2 col-form-label text-center">{{ __('AthleteUser Search')}}</label>
                <div class="col-md-7">
                    <input type="search" name="keyword" value="" class="form-control" placeholder="名前を入力して下さい">
                </div>
                <input type="submit" value="{{ __('Search')}}" class="btn btn-primary col-1.5 p-searchForm__btn c-btn">
                <a href="/athleteUsers/index"><button type="button" class="btn btn-primary col-1.5" style="margin-left:10px;">{{ __('List view') }}</button></a>
                <p>選手の名前を入力して検索します。検索後は必ず一覧表示ボタンを押して下さい。</p>
            </div>
        </form>

        <!-- 選手一覧 -->
        <div class="row">
            @if($athleteUsers->count())

            @foreach ($athleteUsers as $athleteUser)
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <img src="/img/user_img.png">
                        <h3 class="card-title">{{__('Athlete User ID')}}:{{$athleteUser->id}} {{ $athleteUser->name }}</h3>
                        <div class="p-userMenu">
                            <a href="{{ route('athleteUsers.detail', $athleteUser->id) }}">{{ __('Athlete Data')}}</a>
                            <a href="{{ route('medicalHistories.show', $athleteUser->id) }}">{{ __('MedicalHistories')}}</a>
                            <a href="{{ route('medicalQuestionnaires.show', $athleteUser->id) }}">{{ __('MedicalQuestionnaires')}}</a>
                            <a href="{{ route('medicalRecords.show', $athleteUser->id ) }}">{{ __('MedicalRecords')}}</a>
                            <a href="{{ route('workoutPlans.show', $athleteUser->id )}}">{{ __('Workout Plans')}}</a>
                            <form action="{{ route('athleteUsers.destroy', $athleteUser->id )}}" method="post" class="d-inline">
                                @csrf
                                <button class="btn btn-danger" onClick=' return confirm("削除しますか？");'>{{ __('Go Delete') }}</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            @endforeach

            @else
            <p>まだ選手が登録されていません。</p>
            @endif
        </div>

    </div>
@endsection
