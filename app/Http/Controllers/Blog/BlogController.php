<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Services\Articles\ArticlesService;
use App\Services\Categories\CategoriesService;
use Illuminate\Http\Request;


class BlogController extends Controller
{

    private $articlesService;

    /**
     * BlogController constructor.
     * @param ArticlesService $categoriesService
     */
    public function __construct(ArticlesService $articlesService)
    {
        $this->articlesService = $articlesService;
    }

    protected function index()
    {

        $articles = $this->articlesService->getAll();

        return view('front.index', compact('articles'));
    }


}
