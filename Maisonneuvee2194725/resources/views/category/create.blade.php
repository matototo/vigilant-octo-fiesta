@extends('layouts.app')
@section('title', 'Category')
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
    <h1 class="mt-5 mb-4">@lang('lang.category')</h1>
    <div class="row justify-content-center mt-5 mb-5">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">@lang('lang.category')</h5>
                </div>
                <div class="card-body">
                    <form  method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="title_en" class="form-label">@lang('lang.title_en')</label>
                            <input type="text" class="form-control" id="title_en" name="title_en" value="{{old('title_en')}}">
                            @if($errors->has('title_en'))
                                <div class="text-danger mt-2">
                                    {{$errors->first('title_en')}}
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="title_fr" class="form-label">@lang('lang.title_fr')</label>
                            <input type="text" class="form-control" id="title_fr" name="title_fr" value="{{old('title_fr')}}">
                            @if($errors->has('title_fr'))
                                <div class="text-danger mt-2">
                                    {{$errors->first('title_fr')}}
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="description_en" class="form-label">@lang('lang.description_en')</label>
                            <input type="text" class="form-control" id="description_en" name="description_en" value="{{old('description_en')}}">
                            @if($errors->has('description_en'))
                                <div class="text-danger mt-2">
                                    {{$errors->first('description_en')}}
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="description_fr" class="form-label">@lang('lang.description_fr')</label>
                            <input type="text" class="form-control" id="description_fr" name="description_fr" value="{{old('description_fr')}}">
                            @if($errors->has('description_fr'))
                                <div class="text-danger mt-2">
                                    {{$errors->first('description_fr')}}
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