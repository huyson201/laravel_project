<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        return view('auth.registration');
    }

    /**
     * register
     *
     * @param  Request $request
     * @return void
     */
    public function register(Request $request)
    {
        $request->validate([
            'name'      => 'required|unique:users,user_name',
            'email'     => 'required|email|unique:users,user_email',
            'password'  =>  'required|min:6',
            'cpassword' =>  'required|min:6|same:password'
        ]);

        $data = $request->all();
        $this->create_user($data);

        return redirect()->route('user.loginView')->withSuccess('register successfully!');
    }
    /**
     * create_user
     *
     * @param  array $data
     * @return bool
     */
    public function create_user(array $data): bool
    {
        $user = new User();
        $user->user_name = $data['name'];
        $user->user_email = $data['email'];
        $user->user_password = Hash::make($data['password']);

        return $user->save();
    }
}
