@extends('layouts.app')
@section('title', 'Student List')
@section('content')
<h1 class="">Student List</h1>
<div class="">
    @forelse ($students as $student)
    <div>
        <p>{{ $student->name }}</p>
        <p>{{ $student->address }}</p>
        <p>{{ $student->phone }}</p>
        <p>{{ $student->email }}</p>
        <p>{{ $student->date_of_birth }}</p>
        <a href="{{ route('student.show', $student->id) }}">View</a>
    </div>
    @empty
        <div class="">There are no students to display!</div>
    @endforelse
</div>

@endsection