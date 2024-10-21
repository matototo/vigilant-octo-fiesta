@extends('layouts.app')
@section('title', 'Student')
@section('content')
<div class="container d-flex p-2 justify-content-center">
    <div class="card" style="width: 18rem;">
      <div class="card-body justify-center">
        <h5 class="card-title">{{ $student->name }}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{{ $student->email }}</h6>
        <p class="card-text">{{ $student->address }}</p>
        <p class="card-text">{{ $student->phone }}</p>
        <p class="card-text">{{ $student->date_of_birth }}</p>
        <a href="#" class="card-link">Edit</a>
        <a href="#" class="card-link">Delete</a>
      </div>
    </div>
</div>
@endsection