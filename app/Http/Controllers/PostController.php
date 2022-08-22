<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function savePost(Request $request){
        $title = $request->title;
        $content = $request->content;
        $user = $request->session()->get('sessionUser');
        $userId = $request->session()->get('sessionUserId');
        $photo = $request->file('photo');
        $photo->move(public_path('images/'.$user.'/'.'posts/'), $user.'-'.Date('Ymd_His_').'.'.$photo->getClientOriginalExtension());
        $photo = 'images/'.$user.'/'.'posts/'.$user.'-'.Date('Ymd_His_').'.'.$photo->getClientOriginalExtension();
        try{
        $createPost = Post::create([
            'title' => $title,
            'body' => $content,
            'user_id' => $userId,
            'photo' => $photo,
            'category_id' => '1',
        ]);
        return redirect()->route('home');
    }catch(\Exception $e){
            return view('templatesPost.createPost')->with('message', $message='Error:No se a podido crear el post');
        }
    }
}

