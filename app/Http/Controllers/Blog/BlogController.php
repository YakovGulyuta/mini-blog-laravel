<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Services\Categories\CategoriesService;
use Illuminate\Http\Request;

/**
 * @property CategoriesService categoriesService
 */
class BlogController extends Controller
{
    /**
     * @var CategoriesService
     */
    private $categoriesService;

    /**
     * BlogController constructor.
     * @param CategoriesService $categoriesService
     */
    public function __construct(CategoriesService $categoriesService)
    {
        $this->categoriesService = $categoriesService;
    }

    protected function index()
    {

        $categories = $this->categoriesService->getAll();

        return view('front.index', compact('categories'));
    }


}
