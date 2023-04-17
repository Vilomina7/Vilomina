<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Post extends Model
{
    use HasFactory, Sluggable;


    // protected $fillable = ['title', 'slug','image', 'description', 'original_price', 'promo_price', 'new_at', 'expired_at', 'lokasi', 'syarat_ketentuan'];
    protected $guarded = ['id'];
    protected $with = ['promo', 'author'];

    public function scopeSearch($query, array $searchs){
        // if(isset($searchs['search']) ? $searchs['search'] : false) {
        //     return $query->where('title', 'like', '%' . $searchs['search'] . '%')
        //                  ->orWhere('description', 'like', '%' . $searchs['search'] . '%');
        // }

        $query->when($searchs['search'] ?? false, function($query, $search){
            return $query->where('title', 'like', '%' . $search . '%')
                         ->orWhere('description', 'like', '%' . $search . '%');
        });

        $query->when($searchs['promo'] ?? false, function($query, $promo){
            return $query->whereHas('promo', function($query) use($promo){
                $query->where('slug', $promo);
            });
        });

        $query->when($searchs['author'] ?? false, fn($query, $author) =>
            $query->whereHas('author', fn($query) =>
                $query->where('id', $author)
            )
        );

        // $query->when($searchs['key_one'] ?? false, fn($query, $key_one) =>
        //     $query->whereHas('key_one', fn($query) =>
        //         $query->where('id', $key_one)
        //     )
        // );
    }

    public function promo() {
        return $this->belongsTo(Promo::class);
    }

    // public function link() {
    //     return $this->belongsTo(Link::class);
    // }

    // public function keyword(){
    //     return $this->belongsTo(Keyword::class);
    // }

    public function bookmarks()
    {
        return $this->belongsToMany(User::class, 'bookmarks')->withTimestamps();
    }

    public function isBookmarked()
    {
        return $this->bookmarks()->where('user_id', auth()->user()->id)->exists();
    }

    public function bookmarkedByUser($userId)
    {
        return $this->bookmarks()
            ->where('user_id', $userId)
            ->exists();
    }


    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
