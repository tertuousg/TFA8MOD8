@extends('layouts.app')
@section('title','Login')
@section('content')<div class="panel" style="max-width:490px;margin:auto"><h1>Sign in</h1><p class="sub">Access your POS management system.</p>
<form method="POST" action="{{ route('login') }}">@csrf
<div class="field"><label>Email</label><input type="email" name="email" value="{{ old('email') }}" required autofocus>@error('email')<p class="error">{{ $message }}</p>@enderror</div>
<div class="field"><label>Password</label><input type="password" name="password" required>@error('password')<p class="error">{{ $message }}</p>@enderror</div>
<div class="field"><label><input type="checkbox" name="remember" value="1" style="width:auto"> Remember me</label></div><button class="btn">Log in</button> <a href="{{ route('register') }}">Register</a></form></div>@endsection
