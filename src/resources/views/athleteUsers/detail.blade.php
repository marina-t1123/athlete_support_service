<!-- 選手情報の詳細ページ -->
@extends('layouts.app')

@section('content')
@component('components.athleteUsers.athleteUserDetail', ['athleteUser' => $athleteUser]);

@endcomponent
@endsection
