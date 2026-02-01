@extends('layouts.login-layout')

    @section('title', 'Login')

    @section('content')

            <form action="{{ route('login_account') }}" method="post">
            @csrf
            <div>
                <label for="loginEmail">Email:</label>
                <input type="text" id="loginEmail" placeholder="Enter email" name="loginEmail" value="{{ old('loginEmail') }}" required> 
            </div>
            <br>
            <div>
                <label for="loginPassword">Password:</label>
                <input type="password" id="loginPassword" placeholder="Enter password" name="loginPassword" required>
            </div>
                <br>
            @error('login')
            <p style="color:red">{{ $message }}</p>
            @enderror

            <div id="btnDiv">
                <button>Login</button>
            </div>

            <div id="noAccount">
                Don't have an account? <a href="{{ route('signup') }}">Sign up</a>
            </div>

        </form>
    @endsection