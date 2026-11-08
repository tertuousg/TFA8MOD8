@extends('layouts.app')
@section('title','Customer details')
@section('content')
<div class="panel"><h1>Customer details</h1>
<p><strong>Name:</strong> {{ $customer->full_name }}</p>
<p><strong>Email:</strong> {{ $customer->email }}</p>
<p><strong>Phone:</strong> {{ $customer->phone }}</p>
<a class="btn alt" href="{{ route('customers.index') }}">Back</a>
<a class="btn" href="{{ route('customers.edit',$customer) }}">Edit</a>
<form method="POST" action="{{ route('customers.destroy',$customer) }}" style="display:inline" onsubmit="return confirm('Delete this record?')">@csrf @method('DELETE')<button class="btn" type="submit">Delete</button></form>
</div>
@endsection
