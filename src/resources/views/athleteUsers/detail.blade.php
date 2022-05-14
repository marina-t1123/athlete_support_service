<!-- 選手情報の詳細ページ -->
@extends('layouts.app')

@section('content')
@component('components.athleteUser.athleteUserDetail', ['athleteUser' => $athleteUser]);

@endcomponent
@endsection
