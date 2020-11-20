<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
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
//        $categories = $this->categoriesService->getAll();
        $category = $this->categoriesService->findBySlug($slug);

        return view('front.categories.show', compact('category'));
    }
}
