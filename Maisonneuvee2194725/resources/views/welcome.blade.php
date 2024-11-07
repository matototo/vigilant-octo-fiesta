@extends('layouts.app')
@section('title', 'Welcome')
@section('content')

<main class="px-3 mh-100">
    <h1 class="mt-3 mb-2 text-center">@lang('lang.welcome')</h1>
    <p class="lead">@lang('lang.welcome_text')</p>
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-body-tertiary">
    <div class="col-md-6 p-lg-5 mx-auto my-5">
      <h1 class="display-3 fw-bold">@lang('lang.welcome_slogan')</h1>
      <h3 class="fw-normal text-muted mb-3">@lang('lang.welcome_aperture')</h3>
      <div class="d-flex gap-3 justify-content-center lead fw-normal">
        <a class="icon-link" href="#">
        @lang('lang.welcome_learn')
          <svg class="bi"><use xlink:href="#chevron-right"/></svg>
        </a>
        <a class="icon-link" href="#">
        @lang('lang.welcome_buy')
          <svg class="bi"><use xlink:href="#chevron-right"/></svg>
        </a>
      </div>
    </div>
  </div>
</main>

@endsection