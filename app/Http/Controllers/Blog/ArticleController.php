<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Model\Article;
use App\Services\Articles\ArticlesService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    /**
     * @var ArticlesService
     */
    private $articlesService;

    public function __construct(
        ArticlesService $articlesService
    )
    {
        $this->articlesService = $articlesService;
    }


    /**
     * Display the specified resource.
     *
     * @param string $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show($slug)
    {
        $article = $this->articlesService->findBySlug($slug);
        return view('front.articles.show', compact('article'));
    }

}
