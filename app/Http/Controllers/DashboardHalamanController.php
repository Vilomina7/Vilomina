<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HalamanStore;
use App\Models\User;

class DashboardHalamanController extends Controller
{
    
    public function edit(User $user){
        return view('dashboard.infohalaman.edit', [
            'user' => $user,
            'page' => HalamanStore::all(),
        ]);
    }

    public function update(Request $request){
        // $validatedData = $request->validate([
        //     'name' => 'required|max:255'
        // ]);
        if(!HalamanStore::find($request->page()->id)
        ->update(['name' => $request->name,
        'descripton' => $request->description
        ])){
            
            return back()->with('alert', 'gagal');
        }
        // auth()->user()->update([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'tanggal_lahir' => $request->tanggal_lahir
        // ]);
        //$validatedData['id'] = auth()->user()->id;
        //$validatedData['id'] = $request->user()->id;
        //auth()->user()->update($rules);
        //User::where('id')->update($rules);
        //dd($validatedData);
        //HalamanStore::where('id', $hal->id)->update($validatedData);
        
        // if(!User::updated($validatedData)){
        //     return back()->with('alert', 'gagal');
        // }
        // $validatedData = $request->validate($rules);
        // User::where('id', $user->id)->update($validatedData);
        return back()->with('success', 'Updated Successfully!');
    }
}
