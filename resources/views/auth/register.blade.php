@extends('guest.layouts.base')

@section('contents')
<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input 
        id="name" 
        class="form-control" 
        type="text" 
        name="name" 
        required autofocus autocomplete="name"
        value="{{ old('name') }}">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input 
        type="email" 
        class="form-control" 
        id="email"
        name="email" 
        required autofocus autocomplete="username"
        value="{{ old('email') }}">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input 
        type="password"
        class="form-control"
        id="password"
        name="password"
        required autocomplete="new-password">
    </div>
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <input 
        type="password"
        class="form-control"
        id="password_confirmation"
        name="password_confirmation"
        required autocomplete="new-password">
    </div>

    <a href="{{ route('login') }}">
        Already registered?
    </a>
    <button type="submit" class="btn btn-primary">Register</button>
</form>
@endsection