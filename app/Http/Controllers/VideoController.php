<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function profile(){
        $user_video = Auth::user()->video()->get();
        return view('profile', ['videos' => $user_video]);
    }
}
