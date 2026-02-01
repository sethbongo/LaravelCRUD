<x-login-layout>

    <x-slot name="title">
        Login
    </x-slot>

            <form action="{{ route('login_account') }}" method="post">
            @csrf
            <div>
                <p>Email: <input type="text" placeholder="Enter email" name="loginEmail"></p>
            </div>
            <div> 
                <p>Password: <input type="password" placeholder="Enter password" name="loginPassword"></p>
            </div>
            
            <div id="btnDiv">
                <button>Login</button>
            </div>
            <div id="noAccount">
                Don't have an account? <a href="{{ route('signup') }}">Sign up</a>
            </div>

        </form>
</x-login-layout>