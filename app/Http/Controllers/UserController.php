<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = User::orderBy('name', 'ASC')->paginate(50);

        return view('pages.admin.datauser', compact('users'));
    }

    public function create()
    {
        return view('pages.admin.form-add-user');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|integer',
            'role' => 'required|string',
        ]);

        $email = $request->input('email');

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $email;
        $user->phone = $request->input('phone');
        $user->password = Hash::make('sikap123');
        $user->role = $request->input('role');
        $user->status = 'active';

        $user->save();

        return redirect()->route('data-user')->with('success', 'Data Berhasil Diinput');
    }
}
