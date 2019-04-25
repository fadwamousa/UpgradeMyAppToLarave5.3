<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
class AdminMediasController extends Controller
{

    public function index()
    {
        $photos = Photo::all();
        return view('admin.media.index',compact('photos'));
    }


    public function create()
    {
        return view('admin.media.create');
    }


    public function store(Request $request)
    {

      if($file  = $request->file('file')){

        $fileName = time().$file->getClientOriginalName();
        $file->move('images',$fileName);
        $photo = Photo::create(['file'=>$fileName]);
      }

    }

    public function destroy($id)
    {
       $photo = Photo::find($id);
       unlink(public_path().$photo->file);
       $photo->delete();
       return redirect()->back();
    }
}
