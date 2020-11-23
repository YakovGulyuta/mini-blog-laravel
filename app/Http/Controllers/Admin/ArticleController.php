<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Article\ArticleCreateRequest;
use App\Http\Requests\Admin\Tag\TagCreateRequest;
use App\Model\Article;
use App\Model\Category;
use App\Model\Tag;
use App\Services\Articles\ArticlesService;
use App\Services\Categories\CategoriesService;
use App\Services\Tags\TagsService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * @var ArticlesService
     */
    private $articleService;
    /**
     * @var TagsService
     */
    private $tagsService;
    /**
     * @var CategoriesService
     */
    private $categoriesService;

    /**
     * tagController constructor.
     * @param ArticlesService $articleService
     * @param TagsService $tagsService
     * @param CategoriesService $categoriesService
     */
    public function __construct(
        ArticlesService $articleService,
        TagsService $tagsService,
        CategoriesService $categoriesService
    )
    {
        $this->articleService = $articleService;
        $this->tagsService = $tagsService;
        $this->categoriesService = $categoriesService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $articles = $this->articleService->paginate();

        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $categories = $this->categoriesService->pluck();
        $tags = $this->tagsService->pluck();
        return view('admin.articles.create', compact('categories', 'tags'));
    }


    /**
     * @param ArticleCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ArticleCreateRequest $request)
    {

         $this->articleService->create($request->all());



        return redirect()->route('articles.index')->with('success', 'Статья добавлена');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($article)
    {


        $article = $this->articleService->findById($article) ;
        $categories = $this->categoriesService->pluck();
        $tags = $this->tagsService->pluck();
        return view('admin.articles.edit', compact('categories', 'tags', 'article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $article
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ArticleCreateRequest $request, $articleId)// ТЕСТОВЫЕ
    {
        $article = $this->articleService->update($request->all(), $articleId);
        $article = $article->id;

        $articleNew = Article::find($articleId);
        if ($request->hasFile('thumbnail')){
            $data = $request->all();
            if ($file = $articleNew->uploadImage($request, $articleNew->thumbnail)) {
                $data['thumbnail'] = $file;
            }
            $articleNew->update($data);
        }

        return redirect()->route('articles.edit', compact('article'))->with('success', 'Изменения сохранены');
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
        return redirect()->route('articles.index')->with('success', 'Статья удалена');
    }
}
