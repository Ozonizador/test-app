@extends('layout')
 
@section('content')
    Users!
    @foreach ($exams as $exam)
        <p>{{ $exam->name }}</p>
    @endforeach
@stop