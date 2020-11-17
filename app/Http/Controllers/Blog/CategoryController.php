<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Model\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show()
    {
//        $category = Category::where('slug', $slug)->firstOrFail();
//        $posts = $category->posts()->orderBy('id', 'desc')->paginate(2);
        return view('front.categories.show');
    }
}
