@extends('layouts.app')
@section('title', 'Add Student')
@section('content')
    <h1 class="mt-3 mb-2 text-center">@lang('lang.student_submit')</h1>
    <div class="row justify-content-center mt-5 mb-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">@lang('lang.student_add')</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('student.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">@lang('lang.student_name')</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                            @if($errors->has('name'))
                                <div class="text-danger mt-2">
                                    {{$errors->first('name')}}
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">@lang('lang.student_address')</label>
                            <textarea class="form-control" id="address" name="address" rows="3">{{old('address')}}</textarea>
                            @if($errors->has('address'))
                                <div class="text-danger mt-2">
                                    {{$errors->first('address')}}
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">@lang('lang.student_phone')</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone')}}">
                            @if($errors->has('phone'))
                                <div class="text-danger mt-2">
                                    {{$errors->first('phone')}}
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">@lang('lang.student_email')</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}">
                            @if($errors->has('email'))
                                <div class="text-danger mt-2">
                                    {{$errors->first('email')}}
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="date_of_birth" class="form-label">@lang('lang.student_date')</label>
                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{old('date_of_birth')}}">
                            @if($errors->has('date_of_birth'))
                                <div class="text-danger mt-2">
                                    {{$errors->first('date_of_birth')}}
                                </div>
                            @endif
                        </div>
                        <label for="city_id">@lang('lang.student_city')</label>
                        <select name="city_id" class="form-select mb-2" aria-label="City select" >
                        <option selected>@lang('lang.student_open')</option>
                        
                        
                        @forelse($cities as $city)
                            <option value="{{ $city->id }}" @if ($city['id'] == old('city_id')) selected @endif>{{ $city->name }}</option>
                        @empty
                        <p class="alert alert-danger">@lang('login.student_no_city')</p>
                         @endforelse
                        </select>
                        @if($errors->has('city'))
                            <div class="text-danger mt-2">
                                {{$errors->first('city')}}
                            </div>
                        @endif
                        <button type="submit" class="btn btn-primary">@lang('lang.save')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection