<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SocialAccount;
use App\Models\User;
use Exception;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class LoginSocialiteController extends Controller
{
    public function redirectToProvider($provider)
    {
        if (config('app.google_loginler')) { // using loginler
            $provider_url = config('app.login_provider');
            $provider_redirect = route('login.socialite.callback', $provider);
            $token = $this->tokenGenerator();

            session(['redirect' => request('redirect')]);
            session(['token' => $token]);
            return redirect("$provider_url?redirect=$provider_redirect&token=$token");
        }

        if (request('redirect')) {
            session(['redirect' => request('redirect')]);
        }
        return Socialite::driver($provider)->redirect();
    }

    public function handleProvideCallback($provider, Request $request)
    {
        if (config('app.google_loginler')) { // using loginler
            // session
            $redirect = session('redirect');
            $token = session('token');
            $email = $request->email;

            // cek token
            if ($token != $request->token) return redirect($redirect)->with('message', 'Akses token tidak sesuai. Silahkan hubungi administrator website.');

            $authUser = User::where('email', $email)->first();

            if (is_null($authUser)) {
                return redirect()->route('login')->with('message', 'Akun google yang anda pilih tidak terdaftar');
            }

            // login user
            Auth()->login($authUser, true);

            $redirect = session('redirect');
            if ($redirect) {
                session(['redirect' => null]);
                return redirect($redirect);
            } else {
                // setelah login redirect ke dashboard
                return redirect()->route('dashboard');
            }
        }

        try {
            $user = Socialite::driver($provider)->stateless()->user();
        } catch (Exception $e) {
            return redirect()->back();
        }

        // find or create user and send params user get from socialite and provider
        $authUser = $this->findOrCreateUser($user, $provider);

        if (is_null($authUser)) {
            return redirect()->route('login')->with('message', 'Akun google yang anda pilih tidak terdaftar');
        }

        // login user
        Auth()->login($authUser, true);

        $redirect = session('redirect');
        if ($redirect) {
            session(['redirect' => null]);
            return redirect($redirect);
        } else {
            // setelah login redirect ke dashboard
            return redirect()->route('dashboard');
        }
    }

    public function findOrCreateUser($socialUser, $provider)
    {
        // Get Social Account
        $socialAccount = SocialAccount::where('provider_id', $socialUser->getId())
            ->where('provider_name', $provider)
            ->first();

        // Jika sudah ada
        if ($socialAccount) {
            // return user
            return $socialAccount->user;

            // Jika belum ada
        } else {

            // User berdasarkan email
            $user = User::where('email', $socialUser->getEmail())->first();

            // Jika Tidak ada user
            if (is_null($user)) {
                return null;
            }

            // Buat Social Account baru
            $user->socialAccounts()->create([
                'provider_id'   => $socialUser->getId(),
                'provider_name' => $provider,
                'provider_data' => json_encode($socialUser),
            ]);

            // return user
            return $user;
        }
    }

    public function tokenGenerator()
    {
        $result = Str::random(40);
        $result = str_replace('$', '', $result);
        $result = str_replace('&', '', $result);
        $result = str_replace('/', '', $result);
        return $result;
    }
}
