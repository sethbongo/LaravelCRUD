<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use function PHPUnit\Framework\returnArgument;



class UserController extends Controller
{


    public function landingPageView(){
        return view('landingpage');
    }
    public function signupView(){
        return view('signup');
    }

    
    public function register(Request $request){

        $incoming = $request->validate([
            'first_name' => ['required', 'min:1', 'max:70', 'regex:/^[a-zA-Z\s-]+$/'],
            'middle_name' => ['required', 'min:1', 'max:50', 'regex:/^[a-zA-Z\s-]+$/'],
            'last_name' => ['required', 'min:1', 'max:50', 'regex:/^[a-zA-Z\s-]+$/'],
            'email' => ['required', Rule::unique('users', 'email')],
            'password' => ['required', 'min:6']

        ]);
        $incoming['password'] = bcrypt($incoming['password']);
        User::create($incoming);
        return redirect()->route('landingpageview');
    }

        public function logout(Request $request){
                Session::forget('user_id');
                $request->session()->invalidate();
                return redirect()->route('landingpageview');
                }

        public function login(Request $request){
            $user = User::where('email', $request->loginEmail)->first();
            if ($user && Hash::check($request->loginPassword, $user->password)) {
            Session::put('user_id', $user->id);
            return redirect()->route('welcome');
            }
            return back()->withErrors(['login' => 'Invalid credentials'])->withInput();
            }

}
