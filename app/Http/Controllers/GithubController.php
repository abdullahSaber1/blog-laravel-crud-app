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
        ;


        $user = User::updateOrCreate([
            'github_id' => $githubUser->id,
        ], [
            'name' => $githubUser->name,
            'email' => $githubUser->email,
            'password' => Hash::make($githubUser->token),
        ]);
    
        Auth::login($user);
    
        return redirect('home');
        

        // $existingUser = User::where('email', $user->email)->first();

        // if($existingUser){

        //     Auth::login($existingUser);

        //     return to_route('home');

        // }else{

        //     $newUser = User::create([

        //         'name' => $user->name,

        //         'email' => $user->email,

        //         'github_id' => $user->id,

        //         'password' => Hash::make($user->id),

        //     ]);

        //     Auth::login($newUser);

        //     return to_route('home');

        // }

    }
}
