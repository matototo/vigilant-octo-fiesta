@extends('layouts.app')
@section('title', 'Article edit')
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
    <h1 class="mt-3 mb-2 text-center">@lang('lang.article_edit')</h1>
    <div class="row justify-content-center mt-5 mb-5">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">@lang('lang.edit_form')</h5>
                </div>
                <div class="card-body">
                    <form  method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">@lang('lang.title')</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{old('title', $article->title)}}">
                            @if($errors->has('title'))
                                <div class="text-danger mt-2">
                                    {{$errors->first('title')}}
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">@lang('lang.description')</label>
                                <textarea name="description" class="form-control" id="description">{{old('description', $article->description)}}</textarea>
                                @if($errors->has('description'))
                                <div class="text-danger mt-2">
                                    {{$errors->first('description')}}
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="category_id" class="form-label">@lang('lang.category')</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    @foreach($categories as $category)
                                    <option value="{{$category['id']}}" @if ($category['id'] == old('category_id')) selected @endif>{{$category['category']}}</option>
                                    @endforeach 
                                </select>
                                @if($errors->has('category_id'))
                                <div class="text-danger mt-2">
                                    {{$errors->first('category_id')}}
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