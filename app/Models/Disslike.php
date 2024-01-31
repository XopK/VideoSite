<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disslike extends Model
{

    protected $fillable = [
        'id_video',
        'id_user',
    ];

    protected $table = 'disslikes';

    public function user_disslike()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function video_disslike()
    {
        return $this->belongsTo(Video::class, 'id_video');
    }

    use HasFactory;
}
