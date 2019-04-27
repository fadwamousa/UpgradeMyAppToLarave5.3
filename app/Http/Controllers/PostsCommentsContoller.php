<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Auth;
class PostsCommentsContoller extends Controller
{

    public function index()
    {
        $comments = Comment::all();
        return view('admin.comments.index',compact('comments'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        $user    = Auth::user();
        $data    = [
          'post_id'    =>  $request->post_id,
          'body'       =>  $request->body,
          'photo'      =>  $user->photo ? $user->photo->file : null,
          'email'      =>  $user->email,
          'author'     =>  $user->name
         ];
        Comment::create($data);
        return redirect()->back()->with('messages','Comment has been submited');
    }

    public function show($id)
    {
       $post     = Post::findOrFail($id);
       $comments = $post->comments;
       return view('admin.comments.show',compact('comments'));
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);

        $comment->update(['is_active'=>$request->is_active]);
        return redirect()->back();
    }


    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return redirect()->back()->with('messages','Comment Removed');
    }


}
