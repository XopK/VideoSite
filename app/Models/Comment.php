<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'id_video',
        'id_user',
    ];

    public function users_comm(){
        return $this->belongsTo(User::class, 'id_user');
    }

    public function videos_comm(){
        return $this->belongsTo(Video::class);
    }
}
