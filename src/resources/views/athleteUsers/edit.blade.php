<!-- 選手情報の編集ページ -->
@extends('layouts.app')

@section('content')
@component('components.athleteUsers.editAthleteUserForm', ['athleteUser' => $athleteUser]);

@endcomponent
@endsections
