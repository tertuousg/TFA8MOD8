@extends('layouts.app')
@section('title','User details')
@section('content')
<div class="panel"><h1>User details</h1>
<p><strong>Name:</strong> {{ $user->full_name }}</p>
<p><strong>Email:</strong> {{ $user->email }}</p>
<p><strong>Username:</strong> {{ $user->username }}</p>
<a class="btn alt" href="{{ route('users.index') }}">Back</a>
<a class="btn" href="{{ route('users.edit',$user) }}">Edit</a>
<form method="POST" action="{{ route('users.destroy',$user) }}" style="display:inline" onsubmit="return confirm('Delete this record?')">@csrf @method('DELETE')<button class="btn" type="submit">Delete</button></form>
</div>
@endsection
