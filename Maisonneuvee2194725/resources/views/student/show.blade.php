@extends('layouts.app')
@section('title', 'Student')
@section('content')
<h1 class="mt-3 mb-2 text-center">@lang('lang.student_card')</h1>
<div class="d-flex p-2 justify-content-center">
    <div class="card" style="width: 18rem;">
      <div class="card-body justify-center">
        <h5 class="card-title">{{ $student->name }}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{{ $student->email }}</h6>
        <p class="card-text">{{ $student->address }}</p>
        <p class="card-text">{{ $student->phone }}</p>
        <p class="card-text">{{ $student->date_of_birth }}</p>
        <p>{{ $student->city->name }}</p>
        <div class="d-flex justify-content-between">
          <a href="{{ route('student.edit', $student->id) }}" class="card-link">@lang('lang.edit')</a>
          <!-- <a href="#" class="card-link">Delete</a> -->
          <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">@lang('lang.delete')
          </button>
        </div>
      </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure about that ?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form action="{{ route('student.destroy', $student->id) }}" method="post">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection