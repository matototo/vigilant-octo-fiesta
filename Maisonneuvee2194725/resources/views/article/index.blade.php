@extends('layouts.app')
@section('title', 'Article List')
@section('content')
<h1 class="mt-3 mb-2 text-center">@lang('lang.article_forum')</h1>
<div class="row">
    @forelse ($articles as $article)
    <div class="card mb-4" style="width: 18rem;">
        <div class="card-body p-2 p-sm-3">
            <h4 class="card-title">{{ $article->title }}</h4>
            <p>{{ $article->description }}</p>
            <p>{{ $article->user->name }}</p>
            <p>{{ $article->category ? $article->category->title[app()->getLocale()] ?? $article->category->title['en'] : '' }}
        </div>
        <div class="card-footer d-flex justify-content-between">
        @auth
          <a href="{{ route('article.show', $article->id) }}" class="icon-link">@lang('lang.view')</a>
          @if(Auth::user()->id == $article->user->id )
              <a href="{{ route('article.edit', $article->id) }}" class="icon-link">@lang('lang.edit')</a>
              <a href="{{ route('article.destroy', $article->id) }}" class="icon-link">@lang('lang.delete')</a>
          @endif
          @endauth
        </div>
    </div>

    @empty
        <div class="alert alert-danger">@lang('lang.no_articles')</div>
    @endforelse
</div>

@endsection