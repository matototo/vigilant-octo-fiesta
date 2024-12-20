@extends('layouts.app')
@section('title', 'Edit')
@section('content')
    @if(!$errors->isEmpty())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>     
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>                
    @endif
    <h1 class="mt-3 mb-2 text-center">@lang('lang.edit_form')</h1>
    <div class="row justify-content-center mt-5 mb-5">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">@lang('lang.update')</h5>
                </div>
                <div class="card-body">
                    <form  method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">@lang('lang.user_name')</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{old('name', $user->name)}}">
                            @if($errors->has('name'))
                                <div class="text-danger mt-2">
                                    {{$errors->first('name')}}
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">@lang('lang.username')</label>
                                <input type="text" class="form-control" id="email" name="email"  value="{{old('email', $user->email)}}">
                            @if($errors->has('username'))
                                <div class="text-danger mt-2">
                                    {{$errors->first('username')}}
                                </div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">@lang('lang.save')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection