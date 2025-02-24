<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::get();

        return view('users.index', [
            'users' => $users,
        ]);
    }

    public function create() {
        return view('users.create');
    }

    public function store(Request $request) {
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);

        return redirect('/users');
    }
}
