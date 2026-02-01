@extends('layouts.main-layout')

@section('title', 'Profile' )

@section('content')

@push('styles')

<style>

    .profile-container {

        max-width: 600px;

        margin: 2rem auto;

        padding: 0 1.5rem;

    }

    .profile-header h1 {

        font-size: 2.5rem;

        color: #000000;

        margin-bottom: 1rem;

    }

    .profile-info {

        background-color: white;

        padding: 2rem;

        border-radius: 10px;

        box-shadow: 0 2px 10px rgba(0,0,0,0.1);

        margin-bottom: 2rem;

    }

    .profile-info p {

        margin-bottom: 1rem;

        font-size: 1rem;

    }

    .profile-info strong {

        color: #000000;

    }

    .form-group {

        margin-bottom: 1.5rem;

    }

    .form-group label {

        display: block;

        margin-bottom: 0.5rem;

        font-weight: 600;

        color: #000000;

    }

    .form-group input {

        width: 100%;

        padding: 0.75rem;

        border: 2px solid #000000;

        border-radius: 5px;

        font-size: 1rem;

    }

    .buttons {

        text-align: center;
               display: flex;

        justify-content: center;

        gap: 1rem;

    }

    .update-btn, .delete-btn {

        background-color: white;

        color: rgb(0, 0, 0);

        border: 1.5px #000000 solid;

        padding: 0.75rem 2rem;


        font-size: 1rem;

        font-weight: 600;

        border-radius: 5px;

        cursor: pointer;

    }

    .update-btn:hover {

        background-color: #bebaba;

    }

        .delete-btn {
            background-color: white;
            color: #000000;
        }

        .delete-btn:hover {
            background-color: #bebaba;
        }

</style>

@endpush

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
