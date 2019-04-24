<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateUsersRequest;
use App\User;
use App\Role;
use App\Photo;
class AdminUsersController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }


    public function create()
    {
        $roles = Role::pluck('name','id')->all();
        return view('admin.users.create',['roles'=>$roles]);
    }


    public function store(CreateUsersRequest $request)
    {
      $input = $request->all();
      if($file = $request->file('photo_id')){
        $fileName = time().$file->getClientOriginalName();
        $file->move('images',$fileName);
        $photo = Photo::create(['file'=>$fileName]);
        $input['photo_id'] = $photo->id;
      }
      $input['password'] = bcrypt($request->input('password'));
      User::create($input);
      return redirect()->intended('/admin/users');

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
      $user   = User::find($id);
      $roles  = Role::pluck('name','id')->all();
      return view('admin.users.edit',compact('user','roles'));
    }


    public function update(Request $request, $id)
    {
      $user = User::find($id);
      $input = $request->all();
      if($file = $request->file('photo_id')){
        $fileName = time().$file->getClientOriginalName();
        $file->move('images',$fileName);
        $photo = Photo::create(['file'=>$fileName]);
        $input['photo_id'] = $photo->id;
      }
      $input['password'] = bcrypt($request->input('password'));
      $user->update($input);
      return redirect()->intended('/admin/users');

    }


    public function destroy($id)
    {
      $user   = User::find($id);
      $user->delete();
      return redirect('admin/users');
    }
}
