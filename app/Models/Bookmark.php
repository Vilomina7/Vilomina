<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function posts(){
    //     return $this->belongsTo(Post::class, 'post_id', 'id');
    // }

    // public function post()
    // {
    //     return $this->belongsTo(Post::class);
    // }

    // public function Bookmark()
    // {
    //     return $this->belongsTo(Post::class, 'post_id');
    // }


}

