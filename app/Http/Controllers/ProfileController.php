<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controllers\HasMiddleware;


class ProfileController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
    return [
        'checkuser',
    ];
    }
    
    public function profileview(){
        $user = User::find(Session::get('user_id'));
        return view('profilepage', ['user' => $user]);
    }


    public function editprofile(Request $request){

        $user = User::find(Session::get('user_id'));

           $incoming = $request->validate([
            'first_name' => ['required', 'min:1', 'max:70', 'regex:/^[a-zA-Z\s-]+$/'],
            'middle_name' => ['required', 'min:1', 'max:50', 'regex:/^[a-zA-Z\s-]+$/'],
            'last_name' => ['required', 'min:1', 'max:50', 'regex:/^[a-zA-Z\s-]+$/'],
            'email' => ['required', Rule::unique('users', 'email')->ignore($user->id)],
            'password' => ['required', 'min:6']

        ]);
        $incoming['password'] = bcrypt($incoming['password']);

        $user->update($incoming);
        return redirect()->route('profile');


    }

    public function uploadProfileImage(Request $request){
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
        $user = User::find(Session::get('user_id'));
        if ($request->hasFile('image')) {
            if ($user->image_path && Storage::disk('public')->exists($user->image_path)) {
                Storage::disk('public')->delete($user->image_path);
            }
            $path = $request->file(key: 'image')->store('profile_images', 'public');
            $user->image_path = $path;
            $user->save();
        }
        return redirect()->route('profile');
    }

    public function deleteprofile(Request $request){
        $user = User::find(Session::get('user_id'));
        $user->delete();
        return redirect()->route('landingpageview');
    }
}
