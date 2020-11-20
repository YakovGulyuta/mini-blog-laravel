<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\tag\tagCreateRequest;
use App\Services\Tags\TagsService;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * @var tagsService
     */
    private $tagsService;

    /**
     * tagController constructor.
     */
    public function __construct(TagsService $tagsService)
    {
        $this->tagsService = $tagsService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $tags = $this->tagsService->paginate();
//        $tags = $this->tagsService->getAll();

        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(TagCreateRequest $request)
    {
        $this->tagsService->create($request->all());

        return redirect()->route('tags.index')->with('success', 'Тэг добавлен');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($tagId)
    {
        $tag = $this->tagsService->findById($tagId) ;
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(tagCreateRequest $request, $tag)
    {
        $tag = $this->tagsService->update($request->all(), $tag);
        $tag = $tag->id;
        return redirect()->route('tags.edit', compact('tag'))->with('success', 'Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($tagId)
    {
        $this->tagsService->delete($tagId);
        return redirect()->route('tags.index')->with('success', 'Тэг удален');
    }
}
