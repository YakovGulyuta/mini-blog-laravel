<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagController extends Controller
{


    public function show()
    {
        return view('front.tags.show');
    }

}