<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Model\Article;
use App\Model\Category;
use App\Services\Categories\CategoriesService;
use Illuminate\Http\Request;

/**
 * @property CategoriesService categoriesService
 */
class CategoryController extends Controller
{
    /**
     * @var CategoriesService
     */
    private $categoriesService;

    /**
     * CategoryController constructor.
     */
    public function __construct(
        CategoriesService $categoriesService
    )
    {
        $this->categoriesService = $categoriesService;
    }

    public function show($slug)
    {

        $category = $this->categoriesService->findBySlug($slug);
        $articles = $category->posts()->orderBy('id', 'desc')->paginate(1);//доделать
        return view('front.categories.show', compact('category', 'articles'));
    }
}
