@extends('layouts.auth')
@section('content')

    <div class="heading">
        <h1 class="text text-large">Sign In</h1>
        <p class="text text-normal">New user? <span><a href="{{ route('register') }}" class="text text-links">Create an account</a></span>
        </p>
    </div>

    <form action="{{ route('login') }}" method="POST" class="form">
        @csrf
        <div class="input-control">
            <label for="email" class="input-label" hidden>Email Address</label>
            <input type="email" name="email" class="input-field" value="@old('email')" placeholder="Email Address" required spellcheck="false">
        </div>
        @error('email')
            <b class="input-error">
                {{ $message }}
            </b>
        @else
            <br>
        @enderror
        <div class="input-control">
            <label for="password" class="input-label" hidden>Password</label>
            <input type="password" name="password" class="input-field" placeholder="Password" required>
        </div>
        @error('password')
            <b class="input-error">
                {{ $message }}
            </b>
        @else
            <br>
        @enderror
        <div class="input-control">
            <a href="#" class="text text-links">Forgot Password</a>
            <button  class="input-submit" type="submit" >Login</button>
        </div>
    </form>

@endsection
