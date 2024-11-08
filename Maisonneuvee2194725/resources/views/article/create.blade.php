@extends('layouts.app')
@section('title', 'Article create')
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
    <h1 class="mt-3 mb-2 text-center">@lang('lang.article_new')</h1>
    <div class="row justify-content-center mt-5 mb-5">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">@lang('lang.article_create')</h5>
                </div>
                <div class="card-body">
                    <form  method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">@lang('lang.title')</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">@lang('lang.description')</label>
                                <textarea name="description" class="form-control" id="description" value="{{old('description')}}"></textarea>

                        </div>
                        @auth
                            <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                        @endauth
                        <button type="submit" class="btn btn-primary">@lang('lang.save')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection