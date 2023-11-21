@extends('layout.app')
@section('content')
  @php
    $title="管理者登入";
  @endphp
  <x-h1-title :title="$title" />
  {{-- Login Form --}}
  <div class="row justify-content-center">
    <div class="col-4 p-4 m-4">
      <form method="post">
        <div class="row mb-4">
          <label for="title" class="form-label">帳號</label>
          <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="row mb-4">
          <label for="title" class="form-label">密碼</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="row mb-4">
          <button type="submit" class="btn btn-md btn-primary" name="login">確認送出</button>
        </div>
      </form>
    </div>
  </div>
  {{-- ./ Login Form --}}
@endsection
