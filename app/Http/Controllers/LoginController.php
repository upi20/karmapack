<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $redirect = $request->previous ?? urlencode(route('dashboard'));
        if (Auth::check()) {
            return Redirect::route('dashboard');
        }
        $page_attr = ['title' => 'Login'];
        return view('auth.login', compact('page_attr', 'redirect'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function check_login(Request $request)
    {
        $email      = $request->input('email');
        $password   = $request->input('password');

        if (Auth::guard('web')->attempt(['email' => $email, 'password' => $password, 'active' => 1])) {

            return response()->json([
                'success' => true
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Login Failed! Please re-check your email and password!'
            ], 401);
        }
    }

    public function logout()
    {
        Auth::logout();
        return Redirect()->route('home');
    }
}
