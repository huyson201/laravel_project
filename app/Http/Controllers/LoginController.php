<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * login
     *
     * @param  Request $request
     * @return void
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password'  => 'required',
        ]);

        $credential = [
            'user_name'    => $request->email,
            'password' => $request->password,
        ];

        if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $credential = [
                'user_email'    => $request->email,
                'password' => $request->password,
            ];
        }

        if (Auth::attempt($credential, false)) {
            // $remember = $request->has('remember') ? true : false;
            // if ($remember) {
            //     Auth::login(Auth::user(), $request);
            //     dd($remember);
            // }
            return redirect()->route('dashboard');
        }

        return redirect()->route('user.loginView')->with("login-error", "your email (user name) / password invalid!");
    }

    /**
     * dashboard
     *
     * @return void
     */
    public function dashboard()
    {
        return view('auth.dashboard');
    }


    /**
     * sign_out
     *
     * @return void
     */
    public function sign_out()
    {
        Auth::logout();
        return redirect()->route('user.loginView');
    }
}
