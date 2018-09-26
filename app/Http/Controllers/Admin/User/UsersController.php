<?php

namespace App\Http\Controllers\Admin\User;

use Session;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index()
    {
        return view('admin.user.index')
                ->with('users', User::all());
    }

    public function create()
    {
        return view('admin.user.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:50|confirmed',
        ]);

        $users = new User();

        $users->name = strtolower($request->name);
        $users->email = $request->email;
        $users->password = bcrypt($request->password);

        if ($users->save()) {
            Session::flash('success', 'User Registration Successfully');
        }

        return redirect()->back();
    }


    public function edit($id)
    {
        return view('admin.user.edit')
                ->with('user', User::find($id));
    }


    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->name = strtolower($request->name);
        $user->email = $request->email;

        if ($user->save()) {
            Session::flash('success', 'User Update Successfully');
        }

        return redirect()->route('user.index');
    }


    public function destroy($id)
    {
        $user = User::find($id);

        if ($user->delete()) {
            Session::flash('success', 'User Delete Successfully');
        }

        return redirect()->back();
    }

    public function admin($id)
    {
        $user = User::find($id);

        $user->is_admin = User::ADMIN;

        $user->save();

        return redirect()->back();
    }

    public function regular($id)
    {
        $user = User::find($id);

        $user->is_admin = User::REGULAR;

        $user->save();

        return redirect()->back();
    }
}
