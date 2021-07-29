<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepositories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function loginVk() {
        if (Auth::id()) {
            return redirect()->route('home');
        }

        return Socialite::with('vkontakte')->redirect();
    }

    public function responseVk(UserRepositories $userRepository) {
        if (Auth::id()) {
            return redirect()->route('home');
        }

        $user = Socialite::driver('vkontakte')->user();
        session(['soc.token' => $user->token]);
        $userInSystem = $userRepository->getUserBySocId($user, 'vk');
        Auth::login($userInSystem);

        return redirect()->route('home');
    }
}
