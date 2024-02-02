<?php

namespace App\Http\Controllers;

use Exception;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirectToProvider($provider)
    {
        $redirect = request('redirect');
        $token = request('token');
        if (is_null($redirect)) return "Wajib mengirimkan parameter redirect";
        if (is_null($token)) return "Wajib mengirimkan parameter token";
        session(['redirect' => $redirect]);
        session(['token' => $token]);
        return Socialite::driver($provider)->redirect();
    }

    public function handleProvideCallback($provider)
    {
        try {
            $user = Socialite::driver($provider)->stateless()->user();
        } catch (Exception $e) {
            return redirect()->back();
        }
        $redirect = session('redirect');
        $token = session('token');
        session(['redirect' => null]);
        session(['token' => null]);
        return redirect("$redirect?email=$user->email&token=$token");
    }
}
