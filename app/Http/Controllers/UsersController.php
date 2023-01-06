<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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

        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'unique:users', 'email'],
            'password' => ['required', 'string', 'min:8', 'max:16']
        ]);


        $data = $request->only(['name' , 'email', 'password']);
        // $data['password'] = bcrypt(rand(12345678, 987654321));
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

        if(!$user) throw new ModelNotFoundException();

        return view('user.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'unique:users', 'email'],
            'password' => ['required', 'string', 'min:8', 'max:16']
        ]);

        $data = $request->only(['name', 'email', 'password']);
        $user = User::find($id);

        $user->update($data);
        return redirect()->back();
    }

    public function destroy($id)
    {

        $user = User::find($id);

        if(!$user) throw new ModelNotFoundException();

        $user->delete();
        return redirect()->back();

    }
}
