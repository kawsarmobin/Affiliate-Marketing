<?php

namespace App\Http\Controllers\Admin\Setting;

use Auth;
use Session;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function setting()
    {
        return view('admin.setting.edit')
                ->with('user', Auth::user());
    }


    public function changePass(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
            'name' => 'required|min:2|max:50',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'old_password' => 'required|min:6|max:50',
            'password' => 'required|min:6|max:50|confirmed',
            'password_confirmation' => 'required',
        ]);

        if (Hash::check($request->old_password, $user->password)) {
            $user->password = bcrypt($request->password);
        } else {
            Session::flash('info', 'Please Confirm Your Old Password.');
            return redirect()->back();
        }

        if ($user->save()) {
            Session::flash('success', "Your Change's Successfully");
        }

        return redirect()->back();
    }
}
