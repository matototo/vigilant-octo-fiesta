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
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="french-tab" data-bs-toggle="tab" data-bs-target="#french-tab-pane" type="button" role="tab" aria-controls="french-tab-pane" aria-selected="true">@lang('lang.french')</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="englsih-tab" data-bs-toggle="tab" data-bs-target="#english-tab-pane" type="button" role="tab" aria-controls="english-tab-pane" aria-selected="false">@lang('lang.english')</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#disabled-tab-pane" type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false" disabled>@lang('lang.spanish')</button>
                            </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="french-tab-pane" role="tabpanel"   aria-labelledby="french-tab" tabindex="0">
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
                                        <label for="description_fr" class="form-label">@lang('lang.description_fr')</label>
                                            <textarea name="description_fr" class="form-control" id="description_fr" value="{{old('description_fr')}}"></textarea>
                                            @if($errors->has('description_fr'))
                                            <div class="text-danger mt-2">
                                                {{$errors->first('description_fr')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="english-tab-pane" role="tabpanel" aria-labelledby="english-tab"  tabindex="0">
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
                                        <label for="description_en" class="form-label">@lang('lang.description_en')</label>
                                            <textarea name="description_en" class="form-control" id="description_en" value="{{old('description_en')}}"></textarea>
                                            @if($errors->has('description_en'))
                                            <div class="text-danger mt-2">
                                                {{$errors->first('description_en')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab"  tabindex="0">...</div>
                                <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">...</div>
                            </div>
                        
                       
                        <button type="submit" class="btn btn-primary">@lang('lang.save')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection