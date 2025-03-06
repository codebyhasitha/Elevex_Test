<?php

namespace App\Http\Controllers;
Use App\Models\User;
Use App\Models\tterritory;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users=User::with('territory.region.zone')->get();
        return view('user.view_user',compact('users'));
    }

    public function user_create() {
        $territory=tterritory::get();

       return view('user.add_user',compact('territory'));
    }

    public function user_store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'nic' => 'required|string|max:12',
            'address' => 'required|string',
            'mobile' => 'required|string|max:15',
            'email' => 'nullable|email',
            'gender' => 'nullable|string',
            'territory_id' => 'required|exists:tterritories,id',
            'username' => 'required|string|unique:users,username',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'nic' => $request->nic,
            'address' => $request->address,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'gender' => $request->gender,
            'territory_id' => $request->territory_id,
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->back()->with('success', 'User added successfully!');
    }

}
