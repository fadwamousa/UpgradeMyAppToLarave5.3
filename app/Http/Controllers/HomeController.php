<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon;
use App\Category;
class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

        //$year  = Carbon::now()->year;
        $posts = Post::paginate(2);
        $categories = Category::all();
        return view('front.home',compact('posts','categories'));
    }


}
