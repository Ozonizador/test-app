@extends('layout')

@section('content')
    <h1 class="text-center mt-3 mb-4">Congratulations, {{ $participant }}</h1>
    <h4>You have scored {{ $total_score }} points in the {{ $exam->name }}</h4>
@stop
