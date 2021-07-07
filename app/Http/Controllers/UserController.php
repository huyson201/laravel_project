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
    public function index(Request $request)
    {
        $users = User::orderBy('user_id', 'DESC')->paginate(12);
        $sort = $request->sort;
        $sort_type = $request->sort_type;
        if (!empty($sort)&&!empty($sort)) {
            $users = User::orderBy($sort, $sort_type)->paginate(12);
        }
        return view('user.users-list', ['users' => $users, 'sort' => $sort, 'sort_type' => $sort_type]);
    }

    public function edit_view($id)
    {
        $user = User::find($id);
        return view('user.user-form', ['user' => $user]);
    }

    public function edit(Request $request)
    {
        $message = 'Updated failed!';
        $user = User::find($request->user_id);
        $request->validate([
            'user_name'    => 'required',
            'user_email'    => ['required', 'unique:users,user_email,' . $user->user_id . ',user_id', 'regex:/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/'],
        ]);

        if (empty($request->user_password) && empty($request->user_cfpassword)) {
            $data = $request->only('user_name', 'user_email');
            $user->update($data);
            $message = 'Updated successfully!';
        } else if (!empty($request->user_password) && !empty($request->user_cfpassword)) {
            $request->validate([
                'user_password' => 'min:6',
                'user_cfpassword' => 'min:6',
            ]);

            $data = $request->only('user_name', 'user_email', 'user_password');
            if (!Hash::check($data['user_password'],  $user->user_password)) {
                $data['user_password'] = Hash::make($request->user_password);
                if (Hash::check($request->user_cfpassword, $data['user_password'])) {
                    $user->update($data);
                    $message = 'Updated successfully!';
                }
            } elseif (Hash::check($request->user_cfpassword,  $user->user_password)) {
                $user->update($data);
                $message = 'Updated successfully!';
            }
        }

        return redirect()->route('user.edit', [$request->user_id])->with('message', $message);
    }

    public function search(Request $request)
    {
        $key = $request->k;
        $search = $request->search_by;
        $users = User::where($search, 'LIKE', "%{$key}%")->orderBy('user_id', 'DESC')->paginate(12)->appends($request->except('page'));
        return view('user.users-list', ['users' => $users, 'search' => $search]);
    }

    public function delete($id)
    {
        User::find($id)->delete();
        return redirect()->route('user.list')->with('delete-message', 'Deleted successfully!');
    }

    public function create_view()
    {
        return view('user.user-form');
    }

    public function create(Request $request)
    {
        $message = "Created user failed!";
        $request->validate([
            'user_name' =>  ['required', 'unique:users,user_name'],
            'user_email'    => ['required', 'unique:users,user_email', 'regex:/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/'],
            'user_password'    => 'required|min:6',
            'user_cfpassword' => 'required|min:6'
        ]);

        $data = $request->only('user_name', 'user_email', 'user_password');
        if ($request->user_cfpassword === $data['user_password']) {
            $data['user_password'] = Hash::make($request->user_password);
            if (User::create($data)) {
                $message = "Created user successfully!";
            }
        }
        return redirect()->route('user.list')->with('message', $message);
    }
}
