@extends('layouts.frontend')

@section('css_class', 'frontend home')

@section('content')
<div class="container home pt-5">
  <div class="row justify-content-md-center">
    <div class="col-lg-8 text-center welcome-msg">We will provide a shortened link for the page you're on.</div>
  </div>

  <div class="row mt-5 justify-content-md-center">
    <div class="col-lg-7">
      <form method="post" action="{{route('createshortlink')}}" class="mt-5" id="formUrl">
      @csrf
        <div class="input-group input-group-lg original-url">
          <input name="long_url" placeholder="Paste a link to be shortened" class="form-control" id="inputSourceLink" type="text" value="{{ old('long_url') }}">
          <div class="input-group-append">
            <button class="btn" type="submit" id="actProcess">@lang('Shorten')</button>
          </div>
        </div>

        <br>
        <div class="custom-url">
          <div class="custom-url--title">@lang('Custom URL (optional)')</div>
          <span class="custom-url--description text-muted d-block">@lang('Replace clunky URLs with meaningful short links that get more clicks.')</span>
          <div class="site-url">{{$_SERVER['SERVER_NAME']}}/</div>
          <input class="form-control form-control-sm url-field" id="short_url_custom" name="short_url_custom">
          <small class="ml-3" id="link-availability-status"></small>
        </div>
      </form>

      @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-warning mt-3" role="alert">
          {{ $error }}
        </div>
        @endforeach
      @endif

      {{-- @if (session('msgDomainBlocked'))
      <div class="alert alert-warning mt-3" role="alert">
        {{ session('msgDomainBlocked') }}
      </div>
      @endif --}}

    </div>
  </div>
</div>
@endsection
