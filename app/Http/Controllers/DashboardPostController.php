<?php

namespace App\Http\Controllers;

use App\Models\Keyword;
use App\Models\Link;
use App\Models\Post;
use App\Models\Promo;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'promos' => Promo::all(),
            'links' => Link::all(),
            'keywords' => Keyword::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->file('image')->store('post-images');
        
        // $validatedData = $request
        request()->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'promo_id' => 'required',
            // 'keyword_id' => 'required',
            // 'link_id' => 'required'
            'image' => 'image|file|max:5000'
            // 'decoration',
            // 'original_price',
            // 'promo_price',
            // 'satuan_promo',
            // 'nilai_promo',
            // 'new_at',
            // 'expired_at',
            // 'lokasi',
            // 'syarat_ketentuan'
            // 'published_at'
        ]);

        // if($request->file('image')) {
        //     $validatedData['image'] = $request->file('image')->store('post-images');
        // }
        //$validatedData['user_id'] = $request->user()->id;
        // dd($validatedData);
        // if(!Post::create($validatedData)){
        //     return back()->with('alert', 'gagal');
        // } 
        if(!Post::create([
            'title' => $request->title,
            'user_id' => $request->user()->id,
            'promo_id' => $request->promo_id,
            'image' => $request->file('image')->store('post-images'),
            'description' => $request->description,
            'original_price' =>$request->original_price,
            'promo_price' => $request->promo_price,
            'satuan_promo' => $request->satuan_promo,
            'nilai_promo' => $request->nilai_promo,
            'new_at' => $request->new_at,
            'expired_at' => $request->expired_at,
            'lokasi' => $request->lokasi,
            'syarat_ketentuan' => $request->syarat_ketentuan,
            'nm_link1' => $request->nm_link1,
            'url_link1' => $request->url_link1,
            'nm_link2' => $request->nm_link2,
            'url_link2' => $request->url_Link2,
            'nm_link3' => $request->nm_link3,
            'url_link3' => $request->url_link3,
            'key_one' => $request->key_one,
            'key_two' => $request->key_two,
            'key_three' => $request->key_three,
            'key_four' => $request->key_four,
            'key_five' => $request->key_five
        ])){
            return back()->with('alert', 'gagal');
        } 
        
        return redirect('/dashboard/posts')->with('success', 'New Post Has Been Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    // fungsi menampilkan data yang ada pada halaman edit
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'promos' => Promo::all()
            // 'links' => Link::all(),
            // 'keywords' => Keyword::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    
    // fungsi dari proses mengubah data
    public function update(Request $request, Post $post)
    {
        request()->validate([
            'title' => 'required|max:255',
            'promo_id' => 'required',
            'image' => 'image|file|max:5000'

        //     'decoration',
        //     'original_price',
        //     'promo_price',
        //     'satuan_promo',
        //     'nilai_promo',
        //     'new_at',
        //     'expired_at',
        //     'lokasi',
        //     'syarat_ketentuan'
        ]);

        if($request->slug != $post->slug){
            $rules['slug'] = 'required|unique:posts';
        }

        //$validatedData = $request->validate($rules);
        // if(request()->file('image')) {
        //     $validatedData['image'] = $request->file('image')->store('post-images');
        // }
        $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['lokasi'] = Str::limit(strip_tags($request->decoration), 200);
        if(!Post::where('id', $post->id)
        ->update([
            'title' => $request->title,
            'promo_id' => $request->promo_id,
            'image' => $request->file('image')->store('post-images'),
            'description' => $request->description,
            'original_price' =>$request->original_price,
            'promo_price' => $request->promo_price,
            'satuan_promo' => $request->satuan_promo,
            'nilai_promo' => $request->nilai_promo,
            'new_at' => $request->new_at,
            'expired_at' => $request->expired_at,
            'lokasi' => $request->lokasi,
            'syarat_ketentuan' => $request->syarat_ketentuan,
            'nm_link1' => $request->nm_link1,
            'url_link1' => $request->url_link1,
            'nm_link2' => $request->nm_link2,
            'url_link2' => $request->url_Link2,
            'nm_link3' => $request->nm_link3,
            'url_link3' => $request->url_link3,
            'key_one' => $request->key_one,
            'key_two' => $request->key_two,
            'key_three' => $request->key_three,
            'key_four' => $request->key_four,
            'key_five' => $request->key_five
        ])){
            return back()->with('alert', 'gagal');
        }
        // Post::where('id', $post->id)->update($validatedData);

        //dd($validatedData);
        return redirect('/dashboard/posts')->with('success', 'New Post Has Been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);

        return redirect('/dashboard/posts')->with('success', 'New Post Has Been Delete!');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    


}
