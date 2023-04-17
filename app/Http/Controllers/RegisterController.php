<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'name' => 'required|max:255',
            // 'id' => ['required', 'min:4', 'max:255', 'unique:users'],
            'tanggal_lahir' => 'required',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:255'
        ]);

        // password menggunakan metode bcrypt
        // $validateData['password'] = bcrypt($validateData['password']);
        
        // password menggunakan metode hashing
        $validateData['password'] = hash::make($validateData['password']);

        User::create($validateData);

        // $request->session()->flash('success', 'Registration successfull! Please login');

        return redirect('/login')->with('success', 'Registration successfull! Please login');
    }
}
