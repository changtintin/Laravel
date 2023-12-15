@extends('layout.app')
@section('content')
@php
  include_once "../app/CustomSetting/conf.php";
@endphp
<x-h1-title :title="$adminTitles['admin_login']" />
{{-- Login Form --}}
<div class="row justify-content-center">
  <div class="col-xl-4 col-lg-5 col-md-5 col-sm-6 col-xs-6 p-2 m-1">
    <!-- TODO: Add Login request -->
    <form method="POST" action="{{ route('admin-login') }}">
      {{-- @csrf = <input type="hidden" name="_token" value="{{ csrf_token() }}" /> --}}
      @csrf
      <div class="row m-4">
        <label for="title" class="form-label text-secondary">
          {{ $placeholders['account'] }}
        </label>
        <input type="text" class="form-control" id="username" name="username" required>
      </div>
      <div class="row m-4">
        <!--FIXME: Change the pwd in db to hashed value -->
        <label for="title" class="form-label text-secondary">
          {{ $placeholders['pwd'] }}
        </label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <div class="row m-4">
        <button type="submit" class="btn btn-md btn-secondary" name="login">
          {{ $adminBtns['submit'] }}
        </button>
      </div>
    </form>
    <p class="text-secondary fw-light m-4">
      <u>
        * {{ $message['contact_to_register'] }}
      </u>
    </p>
  </div>
</div>
{{-- ./ Login Form --}}
@endsection