@extends('layouts.login-layout')

    @section('title', 'Sign up')

    @section('content')
    
    <form action="{{ route('register_account') }}" method="post">
        @csrf
        <div id="'first_nameDiv">
        <p> First name: <input type="text" placeholder="Enter first name" name='first_name' value="{{ old('first_name') }}" required> </p> 
       @error('first_name')
        <p style="color:red">{{ $message }}</p>
        @enderror    
    </div>

        <div id="m_nameDiv">
        <p>Middle name: <input type="text" placeholder="Enter middle name" name='middle_name' value="{{ old('middle_name') }}" required></p>
       @error('middle_name')
        <p style="color:red">{{ $message }}</p>
        @enderror   
    </div>

        <div id="l_nameDiv">
        <p>Last name: <input type="text" placeholder="Enter last name" name='last_name' value="{{ old('last_name') }}" required></p>
       @error('last_name')
        <p style="color:red">{{ $message }}</p>
        @enderror    
    </div>

        <div id="emailDiv">
        <p>Email: <input type="email" placeholder="Enter email" name='email' value="{{ old('email') }}" required></p>
        @error('email')
        <p style="color:red">{{ $message }}</p>
        @enderror
        </div>

        <div id="passDiv">
        <p>Password:<input type="password" placeholder="Enter password" name='password'required></p>
       @error('password')
        <p style="color:red">{{ $message }}</p>
        @enderror    
    </div>
        
        <div id="btnDiv">
        <button>Submit</button>
        </div>
    </form>
    @endsection


