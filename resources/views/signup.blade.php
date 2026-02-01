<x-login-layout>

    <x-slot name="title">
        Sign up
    </x-slot>

    <form action="{{ route('register_account') }}" method="post">
        @csrf
        <div id="'first_nameDiv">
        <p> First name: <input type="text" placeholder="Enter first name" name='first_name'> </p> 
        </div>

        <div id="m_nameDiv">
        <p>Middle name: <input type="text" placeholder="Enter middle name" name='middle_name'></p>
        </div>

        <div id="l_nameDiv">
        <p>Last name: <input type="text" placeholder="Enter last name" name='last_name'></p>
        </div>

        <div id="emailDiv">
        <p>Email: <input type="email" placeholder="Enter email" name='email'></p>
        </div>

        <div id="passDiv">
        <p>Password:<input type="password" placeholder="Enter password" name='password'></p>
        </div>
        
        <div id="btnDiv">
        <button>Submit</button>
        </div>
    </form>


</x-login-layout>