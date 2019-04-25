<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreatePostRequest;
use Illuminate\Http\Request;
use Auth;
use App\Post;
use App\Photo;
use App\Category;
use App\Comment;
class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       $posts = Post::all();
       return view('admin.posts.index',compact('posts'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name','id')->all();
        return view('admin.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {


           $input    = $request->all();
           $user     = Auth::user();

           if($file  = $request->file('photo_id')){

             $fileName = time().$file->getClientOriginalName();
             $file->move('images',$fileName);
             $photo = Photo::create(['file'=>$fileName]);
             $input['photo_id'] = $photo->id;

           }

          $user->posts()->create($input);
          return redirect('admin/posts')->with('messages','Post created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::pluck('name','id')->all();
        return view('admin.posts.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      //$post     = Post::find($id);
      $input    = $request->all();
      $user     = Auth::user();

      if($file  = $request->file('photo_id')){

        $fileName = time().$file->getClientOriginalName();
        $file->move('images',$fileName);
        $photo = Photo::create(['file'=>$fileName]);
        $input['photo_id'] = $photo->id;

      }
     $user->posts()->where('id',$id)->first()->update($input);
     //$user->posts()->update($input);
     return redirect('admin/posts')->with('messages','Post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*$user = Auth::user();
        unlink(public_path().$user->photo->file);
        $user->posts()->whereId($id)->first()->delete();
        return redirect('/admin/posts')->with('messages','Post Removed');*/

        $post = Post::find($id);
        unlink(public_path().$post->photo->file);
        $post->delete();
        return redirect('/admin/posts')->with('messages','Post Removed');

    }


    public function post($id){

      $post     = Post::findOrFail($id);
      $comments = $post->comments()->whereIsActive(1)->get();
  

      return view('post',compact('post','comments'));

    }
}
