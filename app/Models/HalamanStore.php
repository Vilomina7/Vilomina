<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;

class HalamanStore extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function access()
    {
 
    Gate::define('halaman', function (User $user, HalamanStore $page) {
        return $user->id === $page->user_id;
    });
}
}
