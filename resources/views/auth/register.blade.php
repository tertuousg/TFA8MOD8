@extends('layouts.app')
@section('title','Register')
@section('content')<div class="panel" style="max-width:520px;margin:auto"><h1>Create account</h1>
<form method="POST" action="{{ route('register') }}">@csrf
@foreach(['username'=>'Username','full_name'=>'Full name','email'=>'Email'] as $field=>$label)
<div class="field"><label>{{ $label }}</label><input name="{{ $field }}" value="{{ old($field) }}" @if($field==='email') type="email" @endif required>@error($field)<p class="error">{{ $message }}</p>@enderror</div>@endforeach
<div class="field"><label>Password</label><input type="password" name="password" required>@error('password')<p class="error">{{ $message }}</p>@enderror</div>
<div class="field"><label>Confirm password</label><input type="password" name="password_confirmation" required></div><button class="btn">Register</button> <a href="{{ route('login') }}">Already have an account?</a></form></div>@endsection
