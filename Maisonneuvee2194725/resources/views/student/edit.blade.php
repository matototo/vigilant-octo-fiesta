@extends('layouts.app')
@section('title', 'Edit Student')
@section('content')
    <h1 class="mt-5 mb-4 text-center">Submit form</h1>
    <div class="row justify-content-center mt-5 mb-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Edit Student</h5>
                </div>
                <div class="card-body">
                    <form method="POST">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{old('name', $student->name)}}">
                            @if($errors->has('name'))
                                <div class="text-danger mt-2">
                                    {{$errors->first('name')}}
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="3">{{old('address', $student->address)}}</textarea>
                            @if($errors->has('address'))
                                <div class="text-danger mt-2">
                                    {{$errors->first('address')}}
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone', $student->phone)}}">
                            @if($errors->has('phone'))
                                <div class="text-danger mt-2">
                                    {{$errors->first('phone')}}
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{old('email', $student->email)}}">
                            @if($errors->has('email'))
                                <div class="text-danger mt-2">
                                    {{$errors->first('email')}}
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="date_of_birth" class="form-label">Date Of Birth</label>
                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{old('date_of_birth', $student->date_of_birth)}}">
                            @if($errors->has('date_of_birth'))
                                <div class="text-danger mt-2">
                                    {{$errors->first('date_of_birth')}}
                                </div>
                            @endif
                        </div>
                        <label for="city">Choose a city:</label>
                        <select name="city" class="form-select mb-2" aria-label="City select" >
                        <option selected>Open this select menu</option>
                        
                        
                        @forelse($cities as $city)

                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @empty
                        <p class="alert alert-danger">There is no city</p>
                         @endforelse
                        </select>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection