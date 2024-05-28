@extends('layout')

@section('content')
    <h2 class="title">Take an exam</h2>
    @foreach ($exams as $exam)
        <p>{{ $exam->name }}</p>
    @endforeach
@stop
