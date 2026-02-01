@extends('layouts.main-layout')

@section('title', 'Profile' )

    @section('custom-css')
    <link rel="stylesheet" href="{{ asset('css/profilepage.css') }}">

    {{-- @vite('resources/css/profilepage.css') --}}
    
    @endsection

@section('content')


<div class="profile-container">
    <div class="profile-header">
        <h1>Profile</h1>
    </div>
    <div class="profile-info">
        <form action="{{ route('editprofile') }}" method="post">
            @csrf     
            @method('PUT')
            
            <div class="form-group">
                <label for="firstname">First Name:</label>
                <input type="text" id="firstname" name="first_name" value="{{ $user->first_name }}" required>
                @error('first_name')
                <p style="color:red">{{ $message }}</p>
                @enderror   
            </div>

            <div class="form-group">
                <label for="middlename">Middle Name:</label>
                <input type="text" id="middlename" name="middle_name" value="{{ $user->middle_name }}" required>
                 @error('middle_name')
                <p style="color:red">{{ $message }}</p>
                @enderror   
            </div>

            <div class="form-group">
                <label for="lastname">Last Name:</label>
                <input type="text" id="lastname" name="last_name" value="{{ $user->last_name }}" required>
                @error('last_name')
                <p style="color:red">{{ $message }}</p>
                @enderror 
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" required>
                @error('email')
                <p style="color:red">{{ $message }}</p>
                @enderror 
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" value="{{ $user->password }}"  required>
                @error('password')
                <p style="color:red">{{ $message }}</p>
                @enderror 
            </div>

            <div class="buttons">
                <button type="submit" class="update-btn">Update</button>
        </form>
        
        <form action="{{ route('deleteprofile') }}" method="post">
            @csrf
            @method('DELETE')               
            <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
        </form>
            </div>
    </div>
</div>

@endsection
