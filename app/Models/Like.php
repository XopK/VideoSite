<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{

    protected $fillable = [
        'id_video',
        'id_user',
    ];

    protected $table ='likes';

    public function user_like(){
        return $this->belongsTo(User::class, 'id_user');
    }

    public function video_like(){
        return $this->belongsTo(Video::class, 'id_video');
    }

    use HasFactory;
}
