@extends('layouts.auth')
@section('content')

    <div class="heading">
        <h1 class="text text-large">Sign Up</h1>
        <p class="text text-normal">Already have an account? <span><a href="{{ route('login') }}" class="text text-links">Login</a></span>
        </p>
    </div>

    <form action="{{ route('register') }}" method="POST" class="form" autocomplete="off" >
        @csrf
        <div class="input-control">
            <label for="name" class="input-label" hidden>Full Name</label>
            <input type="text" name="name" class="input-field" placeholder="Full Name" value="@old('name')" required spellcheck="false">
        </div>
        @error('name')
            <b class="input-error">
                {{ $message }}
            </b>
        @else
            <br>
        @enderror
        <div class="input-control">
            <label for="email" class="input-label" hidden>Email Address</label>
            <input type="email" name="email" class="input-field" placeholder="Email Address" value="@old('email')" required spellcheck="false">
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
            <label for="password_confirmation" class="input-label" hidden>Confirm Password</label>
            <input type="password" name="password_confirmation" class="input-field" placeholder="password_confirmation" required>
        </div>
        <br>
        <div class="input-control">
            <button  class="input-submit" type="submit" >Register</button>
        </div>
        <br>
        <small style="color: #aeaeae;">By creating an account or logging in, you agree to Amazon’s Conditions of Use and Privacy Policy.</small>
    </form>

@endsection
