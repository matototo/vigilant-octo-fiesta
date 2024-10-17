@extends('layouts.app')
@section('title', 'Student')
@section('content')
<div class="container">
    <div>
        <p>{{ $student->name }}</p>
        <p>{{ $student->address }}</p>
        <p>{{ $student->phone }}</p>
        <p>{{ $student->email }}</p>
        <p>{{ $student->date_of_birth }}</p>
    </div>
</div>
@endsection