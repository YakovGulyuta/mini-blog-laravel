<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Model\Article;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            's' => 'required',
        ]);

        $s = $request->s;
        $articles = Article::like($s)->with('category')->paginate(2);
        return view('front.search.search', compact('articles', 's'));
    }
}

