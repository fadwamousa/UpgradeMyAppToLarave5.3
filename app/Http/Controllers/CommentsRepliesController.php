<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CommentReply;
use Auth;
class CommentsRepliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function store(Request $request)
    {

    }

    public function createReply(Request $request){

      $user    = Auth::user();
      $data    = [
        'comment_id' =>  $request->comment_id,
        'body'       =>  $request->body,
        'photo'      =>  $user->photo->file,
        'email'      =>  $user->email,
        'author'     =>  $user->name
       ];
      CommentReply::create($data);
      return redirect()->back()->with('messages','Comment has been submited');

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
