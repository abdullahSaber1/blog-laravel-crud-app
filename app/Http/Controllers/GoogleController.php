<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;


class GoogleController extends Controller
{
    public function redirectToGoogle(){

        return Socialite::driver('google')->redirect();

    }

    public function handleGoogleCallback()
    {

        $user =Socialite::driver("google")->stateless()->user();
        

        $existingUser = User::where('email', $user->email)->first();

        if($existingUser){

            Auth::login($existingUser);

            return to_route('home');

        }else{

            $newUser = User::create([

                'name' => $user->name,

                'email' => $user->email,

                'google_id' => $user->id,

                'password' => Hash::make($user->id),

            ]);

            Auth::login($newUser);

            return to_route('home');

        }

    }
}
