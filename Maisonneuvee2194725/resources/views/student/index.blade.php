@extends('layouts.app')
@section('title', 'Student List')
@section('content')
<h1 class="mt-3 mb-2 text-center">Student List</h1>
<div class="row">
    @forelse ($students as $student)
    <div class="col-sm-3">
        <div class="card mb-4" style="width: 18rem;">
            <div class="card-body">
                <h4 class="card-title">{{ $student->name }}</h4>
                <p>{{ $student->address }}</p>
                <p>{{ preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '($1) $2-$3', $student->phone) }}</p>
                <p>{{ $student->email }}</p>
                <p>{{ $student->date_of_birth }}</p>
                <p>{{ $student->city->name }}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('student.show', $student->id) }}">View</a>
            </div>
        </div>
    </div>
    @empty
        <div class="alert alert-danger">There are no students to display!</div>
    @endforelse
</div>

@endsection