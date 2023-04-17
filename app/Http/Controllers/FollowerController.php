<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    // public function index()
    // {
    //     $users = User::all();

    //     return view('dashboard.follower.index', compact('users'));
    // }
    public function index()
    {
        $users = User::where('id', '<>', auth()->user()->id)
                    ->whereHas('followers', function ($query) {
                        $query->where('follower_id', auth()->user()->id);
                    })->get();

        return view('dashboard.follower.index', compact('users'));
    }


    //versi 1
    // public function follow(Request $request)
    // {
    //     $user = User::find($request->user_id);
    //     $follower = User::find($request->follower_id);

    //     $follower->following()->attach($user);

    //     return back();
    // }

    // public function unfollow(Request $request)
    // {
    //     $user = User::find($request->user_id);
    //     $follower = User::find($request->follower_id);

    //     $follower->following()->detach($user);

    //     return back();
    // }

    //versi 2
    public function follow(Request $request)
    {
        $user = User::find($request->user_id);
        $follower = User::find($request->follower_id);
        $follower->following()->attach($user->id);
        return back();
    }

    public function unfollow(Request $request)
    {
        $user = User::find($request->user_id);
        $follower = User::find($request->follower_id);
        $follower->following()->detach($user->id);
        Follower::destroy($user->id);
        return back();
    }
}
