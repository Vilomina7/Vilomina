<?php

// use App\Models\Post;
// use App\Models\User;

use App\Http\Controllers\BookmarkController;
use App\Models\Promo;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardProfilController;
use App\Http\Controllers\DashboardHalamanController;
use App\Http\Controllers\DashboardPasswordController;
use App\Models\Bookmark;
use App\Models\Keyword;
use App\Models\Link;
use App\Models\Post;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// route home
// Route::get('/', function () {
//     return view('home', [
//         "title" => "Home"
//     ]);
// });

Route::get('/', [PostController::class, 'homeindex']);

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "active" => "about",
        "name" => "Vilomina",
        "email" => "vilomina@gmail.com",
        "image" => "vilomina.jpg"
    ]);
});

Route::get('/pedoman', function () {
    return view('pedoman', [
        "title" => "Pedoman Pengguna"
    ]);
});

Route::get('/dash', function () {
    return view('dash', [
        "title" => "das"
    ]);
});

Route::get('/syaratketentuan', function () {
    return view('syaratketentuan', [
        "title" => "Syarat dan Ketentuan"
    ]);
});

Route::get('/offer', [PostController::class, 'index']);

// filter
// Route::get('/filter', [PostController::class, 'filter'])->name('filter');
Route::get('/filter', [PostController::class, 'filter'])->name('produk.filter');


// halaman detail post
Route::get('/detail/{post:slug}', [PostController::class, 'show']);

Route::get('/promos', function(){
    return view('promos', [
        'title' => 'Post Promos',
        'promos' => Promo::all()
    ]);
});

Route::get('/bandingkan', function(){
    return view('bandingkan', [
        'title' => 'Post Perbandingan',
        'promos' => Promo::all(),
        'post' => Post::all(),
        'user' => User::all()
        // 'keywords' => Keyword::all(),
        // 'link' => Link::all()
    ]);
});

// Route::get('/promos/{promo:slug}', function(Promo $promo) {
//     return view('offer', [
//         'title' => "Post By Promo : $promo->jenis",
//         'post' => $promo->posts->load('promo', 'author')
//     ]);
// });

// Route::get('/authors/{author:id}', function(User $author) {
//     return view('offer', [
//         'title' => "Post By Author : $author->name",
//         'active' => 'offer',
//         'post' => $author->posts->load('promo', 'author')
//     ]);
// });

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
// Route::resource('/dashboard/profil', DashboardProfilController::class)->middleware('auth');

// Route::get('/dashboard/profil', [DashboardProfilController::class, 'index']);

Route::get('edit', [DashboardProfilController::class, 'edit'])->name('profil.edit');
Route::put('update', [DashboardProfilController::class, 'update'])->name('profil.update');
Route::get('delete', [DashboardProfilController::class, 'destroy'])->name('profil.destroy');
// Route::get('edit', [DashboardPasswordController::class, 'edit'])->name('password.edit');
// Route::put('update', [DashboardPasswordController::class, 'update'])->name('password.update');

Route::get('/dashboard/infohalaman', [DashboardHalamanController::class, 'edit'])->middleware('auth')->name('hal.edit');
Route::put('/dashboard/infohalaman', [DashboardHalamanController::class, 'update'])->middleware('auth')->name('hal.update');

Route::get('/dashboard/password', [DashboardProfilController::class, 'passedit'])->name('pass.edit');
Route::patch('/dashboard/password', [DashboardProfilController::class, 'passupdate'])->name('pass.edit');

Route::get('/bookmark', [BookmarkController::class, 'bookmark'])->name('products.bookmark');
Route::post('/unbookmark', [BookmarkController::class, 'unbookmark'])->name('products.unbookmark');
Route::get('/dashboard/bookmark', [BookmarkController::class, 'index'])->name('products.bookmarked');
// Route::get('/dashboard/bookmark', [DashboardPostController::class, 'bookmark'])->middleware('auth');
// Route::post('add-to-bookmark', [BookmarkController::class, 'add']);

// Bandingkan

Route::post('/compare', [PostController::class, 'compare'])->name('compare');

// Following
Route::get('/dashboard/follower', [FollowerController::class, 'index'])->name('users.index');

// versi 1
// Route::post('/follow', [FollowerController::class, 'follow'])->name('follow');
// Route::post('/unfollow', [FollowerController::class, 'unfollow'])->name('unfollow');

// versi 2
Route::post('/follow', [FollowerController::class, 'follow'])->name('follower.follow');
Route::post('/unfollow', [FollowerController::class, 'unfollow'])->name('follower.unfollow');

// // Bookmark
// Route::get('/dashboards/bookmark', [BookmarkController::class, 'index'])->name('bookmarks.index');
// Route::get('/bookmark/create', [BookmarkController::class, 'create'])->name('bookmarks.create');
// Route::post('/bookmark', [BookmarkController::class, 'store'])->name('bookmarks.store');
// Route::delete('/bookmark/{bookmark}', [BookmarkController::class, 'destroy'])->name('bookmarks.destroy');
