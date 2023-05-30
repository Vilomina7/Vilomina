<?php

namespace App\Http\Controllers;

use App\Models\HalamanStore;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\MockObject\ReturnValueNotConfiguredException;

class DashboardProfilController extends Controller
{
    public function edit(){
        return view('dashboard.profil.edit');
    }

    public function update(Request $request){
       
        if(!User::find($request->user()->id)
        ->update(['name' => $request->name,
        'email' => $request->email,
        'tanggal_lahir' => $request->tanggal_lahir
        ])){
            
            return back()->with('alert', 'gagal');
        }

        return back()->with('success', 'Updated Successfully!');
    }

    public function destroy(Request $request)
    {
        User::destroy($request->user()->id);
        return redirect('/')->with('success', 'Account Has Been Delete!');
    }

    public function passedit (){
        return view('dashboard.password.edit');
    }

    public function passupdate (Request $request){
        request()->validate([
            'old_password' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $currentPassword = auth()->user()->password;
        $old_password = request('old_password');

        // cara 1
        // if(Hash::check($old_password, $currentPassword)){
        //     auth()->user()->update([
        //         'password' => Hash::make(request('password'))
        //     ]);
        //     return back()->with('success', "You are changed your password");
        // } else {
        //     return back()->with('alert', 'gagal');
        // }

        // cara 2
        if(Hash::check($old_password, $currentPassword)){
            if(!User::find($request->user()->id)
                ->update([
                    'password' => Hash::make(request('password'))
                ])) {
                    return back()->with('alert', 'Change Password Failed!');
                }
            return back()->with('success', "Change Password Successfully!");
        } else {
            return back()->with('alert', 'Failed because old password');
        }
    }
}
