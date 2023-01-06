<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller

{
    public function index()
    {
        $users = User::get();

        return view('user.index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $data = $request->only(['name' , 'email']);
        $data['password'] = bcrypt(rand(12345678, 987654321));
        User::create($data);
        return redirect()->route('user.index');
    }

    public function show(User $user)
    {
        return view('user.show', [
            'user' => $user
        ]);
    }


    public function edit($id)
    {
        $user = User::find($id);


        return view('user.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->only(['name', 'email']);
        $user = User::find($id);

        $user->update($data);
        return redirect()->back();
    }

    public function destroy($id)
    {

        $user = User::find($id);
        $user->delete();
        return redirect()->back();


    }
}
