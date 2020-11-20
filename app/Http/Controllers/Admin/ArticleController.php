<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Article\ArticleCreateRequest;
use App\Http\Requests\Admin\Tag\TagCreateRequest;
use App\Model\Article;
use App\Model\Category;
use App\Model\Tag;
use App\Services\Articles\ArticlesService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * @var ArticlesService
     */
    private $articleService;

    /**
     * tagController constructor.
     */
    public function __construct(ArticlesService $articleService)
    {
        $this->articleService = $articleService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $articles = $this->articleService->paginate();
//        $articles = $this->articleService->getAll();

        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::pluck('title', 'id')->all();
        $tags = Tag::pluck('title', 'id')->all();
        return view('admin.articles.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(ArticleCreateRequest $request)
    {
        $this->articleService->create($request->all());

        return redirect()->route('articles.index')->with('success', 'Статья добавлен');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($article)
    {
        $article = Article::find($article);
        $categories = Category::pluck('title', 'id')->all();
        $tags = Tag::pluck('title', 'id')->all();
        return view('admin.articles.edit', compact('categories', 'tags', 'article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(tagCreateRequest $request, $article)
    {
        $article = $this->articleService->update($request->all(), $article);
        $article = $article->id;
        return redirect()->route('tags.edit', compact('article'))->with('success', 'Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($article)
    {
        $this->articleService->delete($article);
        return redirect()->route('articles.index')->with('success', 'Статья удален');
    }
}
