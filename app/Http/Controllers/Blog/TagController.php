<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Model\Tag;
use App\Services\Tags\TagsService;
use Illuminate\Http\Request;

class TagController extends Controller
{

    /**
     * @var TagsService
     */
    private $tagsService;

    public function __construct(
        TagsService $tagsService
    )
    {
        $this->tagsService = $tagsService;
    }


    public function show($slug)
    {
        $tag = $this->tagsService->findBySlug($slug);
        $articles = $tag->articles()->with('category')->orderBy('id', 'desc')->paginate(1);//доделать
        return view('front.tags.show', compact('tag', 'articles'));

    }

}
