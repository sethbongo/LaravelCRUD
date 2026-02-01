@extends('layouts.login-layout')

    @section('title', 'Sign up')

    @section('content')
    
    <form action="{{ route('register_account') }}" method="post">
        @csrf
        <div id="'first_nameDiv">
        <label for="first_name"> First name: <input type="text" id="first_name" placeholder="Enter first name" name='first_name' value="{{ old('first_name') }}" required> </label> 
       @error('first_name')
        <p style="color:red">{{ $message }}</p>
        @enderror    
    </div> <br>

        <div id="m_nameDiv">
        <label for="middle_name">Middle name: <input type="text" id="middle_name" placeholder="Enter middle name" name='middle_name' value="{{ old('middle_name') }}" required></label>
       @error('middle_name')
        <p style="color:red">{{ $message }}</p>
        @enderror   
    </div><br>

        <div id="l_nameDiv">
        <label for="last_name">Last name: <input type="text" id="last_name" placeholder="Enter last name" name='last_name' value="{{ old('last_name') }}" required></label>
       @error('last_name')
        <p style="color:red">{{ $message }}</p>
        @enderror    
    </div><br>

        <div id="emailDiv">
        <label for="email">Email: <input type="email" id="email" placeholder="Enter email" name='email' value="{{ old('email') }}" required></label>
        @error('email')
        <p style="color:red">{{ $message }}</p>
        @enderror
        </div><br>

        <div id="passDiv">
        <label for="password">Password:<input type="password" id="password" placeholder="Enter password" name='password'required></label>
       @error('password')
        <p style="color:red">{{ $message }}</p>
        @enderror    
    </div><br>
        
        <div id="btnDiv">
        <button>Submit</button>
        </div>
    </form>
    @endsection


