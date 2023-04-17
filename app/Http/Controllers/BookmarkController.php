<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function index()
    {
        $bookmarkedProducts = auth()->user()->bookmarkedProducts;

        return view('dashboard.bookmark.index', compact('bookmarkedProducts'));
    }

    public function bookmark(Post $post, Request $request)
    {
        // if ($post->isBookmarked()) {
        //     $post->bookmarks()->detach(auth()->user());
        // } else {
        //     $post->bookmarks()->attach(auth()->user());
        // }

        // return back();
        // ambil id pengguna yang login
        $userId = Auth::id();

        // pastikan pengguna belum melakukan bookmark pada produk ini
        if (!$post->bookmarkedByUser($userId)) {
            // buat bookmark baru
            $bookmark = new Bookmark();
            $bookmark->user_id = $userId;
            $bookmark->post_id = $request->post_id;
            $bookmark->save();

            return back()->with('success', 'Product bookmarked successfully!');
        } else {
            return back()->with('error', 'Product already bookmarked!');
        }
    }

    public function unbookmark(Post $post, Request $request)
    {
        $bookmark = Bookmark::where('user_id', Auth::id())
                        ->where('post_id', $request->post_id)
                        ->first();
        if($bookmark) {
            $bookmark->delete();
            return back()->with('success', 'Bookmark dihapus.');
        } else {
            return back()->with('error', 'Bookmark tidak ditemukan.');
        }
    }


    // public function index(){
    //     $bookmark = Bookmark::where('user_id', Auth::id())->get();
    //     return view('dashboard.bookmark.show', compact('bookmark'));
    // }

    // public function add(Request $request){
    //     if(Auth::check()){
    //         $post_id = $request->input('post_id');
    //         if(Post::find($post_id)){
    //             $book = new Bookmark();
    //             $book->user_id = Auth::id();
    //             $book->post_id = $post_id;
    //             $book->save();
    //             return response()->json(['status' => "Penawaran ditambahkan ke bookmark"]);
    //         } else{
    //             return response()->json(['status' => "Penawaran Sudah Ada"]);
    //         }         
    //     } else{
    //         return response()->json(['status' => "Login untuk melanjutkan"]);
    //     }
    // }

    // public function checkBook(Request $request){
    //     $post_id = Bookmark::create('post_id' => $request->id);
    //     return response()->json(['id' => $post_id]);
    // }

    // versi 2
    // public function index()
    // {
    //     $bookmarks = Auth::user()->bookmarks; // Ambil daftar bookmark untuk user yang sedang login
    //     return view('bookmark.index', compact('bookmarks'));
    // }

    // public function create()
    // {
    //     return view('bookmark.create');
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'user_id' => 'required|max:255',
    //         'url' => 'required|url|max:255',
    //         'description' => 'max:1000',
    //     ]);

    //     Auth::user()->bookmarks()->create($request->only(['title', 'url', 'description']));

    //     return redirect()->route('bookmark.index')->with('success', 'Bookmark berhasil ditambahkan!');
    // }

    // public function destroy(Bookmark $bookmark)
    // {
    //     $bookmark->delete();
    //     return redirect()->route('bookmark.index')->with('success', 'Bookmark berhasil dihapus!');
    // }

}
