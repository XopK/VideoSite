<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{

    protected $fillable =[
        'title_status',
    ];

    protected $table = 'status';

    public function videos_status(){
        return $this->hasMany(Video::class, 'id_status');
    }

    use HasFactory;
}
