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
       
        if(!HalamanStore::find($request->page()->id)
        ->update(['name' => $request->name,
        'descripton' => $request->description
        ])){
            
            return back()->with('alert', 'gagal');
        }
        
        return back()->with('success', 'Updated Successfully!');
    }

    
}
