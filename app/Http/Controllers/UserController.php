<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::orderBy('user_id', 'DESC')->paginate(12);
        return view('user.users-list', ['users' => $users]);
    }

    public function edit_view($id)
    {
        $user = User::find($id);
        return view('user.user-form', ['user' => $user]);
    }

    public function edit(Request $request)
    {
        $message = 'Updated failed!';
        $hashedPw = Auth::user()->user_password;
        $id = Auth::user()->user_id;
        $request->validate([
            'user_name'    => 'required',
            'user_email'    => ['required', 'unique:users,user_email,' . $id . ',user_id', 'regex:/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/'],
            'user_password'    => 'required|min:6',
            'user_cfpassword' => 'required|min:6'
        ]);
        $data = $request->only('user_name', 'user_email', 'user_password');
        if ($data['user_password'] != $hashedPw) {
            $data['user_password'] = Hash::make($request->user_password);
            if (Hash::check($request->user_cfpassword, $data['user_password'])) {
                User::find($request->user_id)->update($data);
                $message = 'Updated successfully!';
            }
        } else {
            User::find($request->user_id)->update($data);
            $message = 'Updated successfully!';
        }

        return redirect()->route('user.edit', [$request->user_id])->with('message', $message);
    }

    public function search(Request $request)
    {
        $key = $request->k;
        $users = User::where('user_name', 'LIKE', "%{$key}%")->orderBy('user_id', 'DESC')->paginate(12)->appends($request->except('page'));
        return view('user.users-list', ['users' => $users]);
    }

    public function delete($id)
    {
        User::find($id)->delete();
        return redirect()->route('user.list')->with('message', 'Deleted successfully!');
    }
}
