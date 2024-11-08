@extends('layouts.app')
@section('title', 'User')
@section('content')
<h1 class="mt-3 mb-2 text-center">@lang('lang.user_card')</h1>
<div class="d-flex p-2 justify-content-center">
    <div class="card" style="width: 18rem;">
      <div class="card-body justify-center">
        <h5 class="card-title">{{ $user->name }}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{{ $user->email }}</h6>
        <div class="d-flex justify-content-between">
          <a href="{{ route('user.edit', $user->id) }}" class="icon-link">@lang('lang.edit')</a>
          <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">@lang('lang.delete')
          </button>
        </div>
      </div>
    </div>
    @forelse ($articles as $article)
    <div class="col-sm-3">
        <div class="card mb-4" style="width: 18rem;">
            <div class="card-body">
                <h4 class="card-title">{{ $article->title }}</h4>
                <p>{{ $article->description }}</p>
                <p>{{ $article->user->name }}</p>
                
            </div>
            <div class="card-footer d-flex justify-content-between">
                <a href="{{ route('article.show', $article->id) }}" class="icon-link" >@lang('lang.view')</a>
                @auth
                    @if(Auth::user()->id == $article->user->id )
                        <a href="{{ route('article.edit', $article->id) }}" class="icon-link">@lang('lang.edit')</a>
                        <a href="{{ route('article.destroy', $article->id) }}" class="icon-link">@lang('lang.delete')</a>
                    @endif
                @endauth
            </div>
        </div>
    </div>
    @empty
        <div class="alert alert-danger">@lang('lang.no_articles')</div>
    @endforelse
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('lang.delete_message')</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.close')</button>
        <form action="{{ route('user.destroy', $user->id) }}" method="post">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-sm btn-outline-danger">@lang('lang.delete')</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection