<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\CategoryCreateRequest;
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
    public function __construct(CategoriesService $categoriesService)
    {
        $this->categoriesService = $categoriesService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $categories = $this->categoriesService->paginate();
//        $categories = $this->categoriesService->getAll();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(CategoryCreateRequest $request)
    {
        $this->categoriesService->create($request->all());

        return redirect()->route('categories.index')->with('success', 'Категория добавлена');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($categoryId)
    {
        $category = $this->categoriesService->findById($categoryId) ;
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CategoryCreateRequest $request, $category)
    {
        $category = $this->categoriesService->update($request->all(), $category);
        $category = $category->id;
        return redirect()->route('categories.edit', compact('category'))->with('success', 'Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($categoryId)
    {
        $this->categoriesService->delete($categoryId);
        return redirect()->route('categories.index')->with('success', 'Категория удалена');
    }
}
