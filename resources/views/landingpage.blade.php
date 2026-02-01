@extends('layouts.login-layout')

    @section('title', 'Login')

    @section('content')

            <form action="{{ route('login_account') }}" method="post">
            @csrf
            <div>
                <p>Email: <input type="text" placeholder="Enter email" name="loginEmail" value="{{ old('loginEmail') }}" required></p>
            </div>
            <div> 
                <p>Password: <input type="password" placeholder="Enter password" name="loginPassword" required></p>
            </div>

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