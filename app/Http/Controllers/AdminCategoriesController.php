<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class AdminCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index',compact('categories'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $this->validate($request,['name'=>'required']);
        Category::create(['name'=>$request->name]);
        return redirect('/admin/categories')->with('messages','Category added');
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


    public function edit($id)
    {
      $category = Category::find($id);
      return view('admin.categories.edit',compact('category'));
    }

    public function update(Request $request, $id)
    {
      $this->validate($request,['name'=>'required']);
      $category = Category::find($id);
      $category->update(['name'=>$request->name]);
      return redirect('/admin/categories')->with('messages','Category updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $category = Category::find($id);
       $category->delete();
       return redirect('/admin/categories')->with('messages','Category removed');
    }
}
