<?php

namespace App\Http\Controllers;
use App\Models\Post; //　追加
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function show()
    {
        $posts = Post::all();

        return view('posts.index',compact('posts'));
    }

    public function update($id=1)
    {
        $post = Post::find($id);
        if(empty($post)){
            redirect('/posts');
        }
        return view('posts.update',compact('post'));
    }

    public function store(Request $request)
    {

        if(!empty($request->id)){
            $post = Post::find($request->id);
            if(empty($post)){
                redirect('/posts');
            }
            $request->validate([
                'comment' => 'required|max:255',
            ]);

            $post->update($request->all());
            return redirect('/posts')->with('success', '投稿が更新されました！');
        
        }else{
            Post::create(
                [
                    "comment"=>$request->comment
                ]
            );
            return redirect('/posts')->with('success', '投稿が保存されました！');
        }
    }

}
