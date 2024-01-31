<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_video',
        'video',
        'preview',
        'description',
        'id_user',
        'id_category',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'id_user');
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'id_video');
    }

    public function likesCount(){
        return $this->likes()->count();
    }

    public function disslikes()
    {
        return $this->hasMany(Disslike::class, 'id_video');
    }

    public function disslikesCount(){
        return $this->disslikes()->count();
    }

    public function Comments(){
        return $this->hasMany(Comment::class, 'id_video');
    }
}
