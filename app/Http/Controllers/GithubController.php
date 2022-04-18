<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;


class GithubController extends Controller
{
    public function redirectToGithub(){

        return Socialite::driver('github')->redirect();

    }

    public function handleGithubCallback()
    {

        $githubUser=Socialite::driver("github")->stateless()->user();
    

        $existingUser = User::where('email', $githubUser->email)->first();

        if($existingUser){

            Auth::login($existingUser);

            return to_route('home');

        }else{

            $newUser = User::create([

                'name' => $githubUser->name,

                'email' => $githubUser->email,

                'github_id' => $githubUser->id,

                'password' => Hash::make($githubUser->id),

            ]);

            Auth::login($newUser);

            return to_route('home');

        }

    }
}
