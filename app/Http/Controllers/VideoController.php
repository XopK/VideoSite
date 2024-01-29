<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function profile()
    {
        $user_video = Auth::user()->video()->get();
        return view('profile', ['videos' => $user_video]);
    }

    public function addVideo()
    {
        $categories = Category::all();

        return view('addvideo', ['categories' => $categories]);
    }

    public function createVideo(Request $request)
    {
        $request->validate([
            'title_video' => 'required',
            'video' => 'required',
            'description' => 'required',
            'preview' => 'required|image',
            'category' => 'required',
        ], [
            'title_video.required' => 'Поле обязательно для заполенения!',
            'video.required' => 'Поле обязательно для заполенения!',
            'description.required' => 'Поле обязательно для заполенения!',
            'preview.required' => 'Поле обязательно для заполенения!',
            'preview.image' => 'Выберите фотогафию!',
            'category.required' => 'Поле обязательно для заполенения!',
        ]);

        $name_video = $request->file('video')->hashName();
        $path_video = $request->file('video')->store('public/videos');

        $name_preview = $request->file('preview')->hashName();
        $path_preview = $request->file('preview')->store('public/preview');

        $videoData = $request->all();

        Video::create([
            'title_video' => $videoData['title_video'],
            'video' => $name_video,
            'preview' => $name_preview,
            'description' => $videoData['description'],
            'id_user' => Auth::user()->id,
            'id_category' => $videoData['category'],
        ]);

        return redirect()->back()->with('success', 'Видео добавлено!');
    }

    public function VideoPage(Video $id)
    {
        $category = $id->category;
        $user = $id->users;
        $comment = Comment::with('users_comm')->where('id_video', $id->id)->orderBy('created_at', 'desc')->get();

        return view('videoPage', ['video' => $id, 'category' => $category, 'user' => $user, 'comments' => $comment]);
    }

    public function Comment(Request $request, Video $video)
    {
        if (Auth::user()) {
            $request->validate([
                'comment' => 'required',
            ], [
                'comment.required' => 'Заполните поле!',
            ]);

            $user = Auth::user();
            $video_id = $video->id;

            $comment = Comment::create([
                'comment' => $request->comment,
                'id_video' => $video_id,
                'id_user' => $user->id,
            ]);

            return redirect()->back()->with('success', 'Комментарий добавлен!');
            
        } else {
            return redirect()->back()->with('error', 'Пожайлуста авторизируйтесь!');
        }
    }
}
