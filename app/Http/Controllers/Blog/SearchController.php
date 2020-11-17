<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
//        $request->validate([
//            's' => 'required',
//        ]);
//
//        $s = $request->s;
//        $posts = Post::like($s)->with('category')->paginate(2);
        return view('front.search.search');
    }
}
