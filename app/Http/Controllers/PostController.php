<?php

namespace App\Http\Controllers;

use App\Models\Keyword;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Promo;
use App\Models\Bookmark;

class PostController extends Controller
{
    public function index() {

        // $posts = Post::latest();
        // dd(request('search'));

        $title = '';
        if(request('promo')){
            $promo = Promo::firstWhere('slug', request('promo'));
            $title = ' in ' . $promo->jenis;
        }

        if(request('author')){
            $author = User::firstWhere('id', request('author'));
            $title = ' in ' . $author->name;
        }

        if(request('key_one')){
            $key = Post::firstWhere('key_one', request('key_One'));
            $title = ' in ' . $key->key_one;
        }

        // if(request(['key_one'])){
        //     $post = Post::firstWhere('slug', request('key_one'));
        //     $title = ' in ' . $post->key_one;
        // }

        // if(request(['key_two'])){
        //     $post = Post::firstWhere('id', request('key_two'));
        //     $title = ' in ' . $post->key_two;
        // }
        return view('offer', [
            "title" => "All Posts" . $title,
            "active" => "Offer",
            "promos" => Promo::all(),
            "post" => Post::latest()->search(request(['search', 'promo', 'author']))
                   ->paginate(6)->withQueryString()
            // "post" => $posts->get()
        ]);
    }

    // public function filter(Request $request){
        
    //     $title = '';
    //     // if(request('promo')){
    //     //     $promo = Promo::Where('slug', request('promo'));
    //     //     $title = ' in ' . $promo->jenis;
    //     // }

    //     if( $request->promo_id){
    //         $result = Promo::where('slug', 'LIKE', "%" . $request->promo_id . "%");
    //     }
    //     if( $request->key){
    //         $result= POST::where('key_one', 'LIKE', "%" . $request->key . "%");
    //     }
    //     if( $request->promo_id && $request->key ){
    //         $result = POST::where('promo_id', '>=', $request->promo_id)
    //                      ->where('key_one', '<=', $request->key);
    //     }
    //     // $data = $data->paginate(10);
    //     // return view('search', compact('data'));

    //     // if(request('author')){
    //     //     $author = User::firstWhere('id', request('author'));
    //     //     $title = ' in ' . $author->name;
    //     // }

    //     return view('offer', [
    //         "title" => "All Posts" . $title,
    //         "active" => "Offer",
    //         "promos" => Promo::all(),
    //         "post" => Post::latest()->search(request(['filter', 'promo', 'post']))
    //                ->paginate(6)->withQueryString()
    //         // "post" => $posts->get()
    //     ]);
    // }

    public function show(Post $post){
        return view('detail', [
            "title" => "Detail Post",
            "post" => $post
        ]);
    }

    public function homeindex() {
        return view('home', [
            "title" => "All Penawaran",
            "active" => "home",
            "promos" => Promo::all(),
            // "post" => Post::all()
            "post" => Post::latest()->search(request(['search', 'promo', 'author', 'key_one', 'key_two', 'key_three', 'key_four', 'key_five']))
                   ->paginate(8)->withQueryString()
            // "post" => Post::latest()->paginate(8)
        ]);
    }

    public function compare(Request $request)
    {
        $post1 = Post::findOrFail($request->input('post1'));
        $post2 = Post::findOrFail($request->input('post2'));

        return view('compare.index', [
            'title' => "Compare",
            'post1' => $post1,
            'post2' => $post2,
        ]);
    }

    public function filter(Request $request)
    {
        $query = Post::query();
        //$title = ' in ';
        // if(request('promo')){
        //     $promo = Promo::firstWhere('slug', request('promo'));
        //     $title = ' in ' . $promo->jenis;
        // }

        if (request('promo')) {
            // $query->where('jenis_promo', $request->jenis_promo);
            $query = Promo::firstWhere('slug', request('promo'));
            
        }

        // if ($request->filled('tanggal_post')) {
        //     $query->whereDate('tanggal_post', $request->tanggal_post);
        // }

        // if ($request->filled('sort')) {
        //     if ($request->sort == 'harga-tertinggi') {
        //         $query->orderBy('harga', 'desc');
        //     } elseif ($request->sort == 'harga-terendah') {
        //         $query->orderBy('harga', 'asc');
        //     }
        // }

        //dd($query->get());
        $posts = $query->get();
        

        // return view('filter', compact('posts'));

        return view('filter', [
            'title' => "filter",
            'posts' => $posts
        ]);
    }

}
