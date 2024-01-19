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
    ];

    public function users(){
        return $this->hasOne(User::class);
    }
}
