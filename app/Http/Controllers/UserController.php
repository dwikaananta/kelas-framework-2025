<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::latest()
            ->when(request()->search, function($query) {
                $query->where(function($query) {
                    $search = request()->search;
                    $query->where('name', 'like', "%$search%")
                        ->orWhere('email', 'like', "%$search%");
                });
            })
            ->paginate(10);

        return view('users.index', [
            'users' => $users,
        ]);
    }

    public function create() {
        return view('users.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => ['required', 'min:3', 'max:100'],
            'email' => ['required', 'unique:users,email'],
            'password' => ['required', 'min:3'],
        ]);

        $name = $request->name;
        $email = $request->email;
        $password = $request->password;

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);

        return redirect('/users')->with('success', 'User has stored !');
    }

    public function edit($id) {
        $user = User::find($id);

        return view('users.edit', ['user' => $user]);
    }

    public function update(Request $request, $id) {
        $user = User::find($id);

        $request->validate([
            'name' => ['required', 'min:3', 'max:100'],
            'email' => ['required', "unique:users,email,$user->id"],
            'password' => ['nullable'],
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if ($request->password) {
            $user->update(['password' => $request->password]);
        }

        return redirect('/users')->with('success', 'User has updated !');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/users')->with('success', 'User has deleted !');
    }
}
