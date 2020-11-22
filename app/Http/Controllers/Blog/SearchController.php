<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Search\SearchRequest;
use App\Model\Article;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(SearchRequest $request)//переделать
    {

        $s = $request->s;
        $articles = Article::like($s)->with('category')->paginate(2);
        return view('front.search.search', compact('articles', 's'));
    }
}

