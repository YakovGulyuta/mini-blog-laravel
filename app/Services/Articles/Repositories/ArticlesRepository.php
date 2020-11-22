<?php

namespace App\Services\Articles\Repositories;

use App\Http\Requests\Admin\Article\ArticleCreateRequest;
use App\Model\Article;

class ArticlesRepository implements ArticleRepositoryInterface
{

    /**
     * @param $id
     * @return mixed
     */
    public function findOne(int $articleId)
    {
        $article = Article::find($articleId);
        return $article;
    }

    /**
     * @param string $slug
     * @return mixed
     */
    public function findBySlug(string $slug)
    {
        $article = Article::where('slug', $slug)->first();
        $article->views += 1;
        $article->update();
        return $article;
    }

    /**
     * @return article[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        $articles = Article::all();
        return $articles;
    }

    /**
     * @param array $data
     * @return article
     */
    public function create(array $data)
    {
        $article = new Article();
        $article->create($data);
        return $article;
    }

    /**
     * @param array $data
     * @param int $articleId
     * @return mixed
     */
    public function update($data, $articleId)
    {
        $article = Article::find($articleId);
        if (!empty($data['tags'])){
        $article->tags()->sync($data['tags']);
        } else {
            $article->tags()->detach();
        }
        return $article;
    }

    /**
     * @param int $articleId
     * @return int
     */
    public function destroy(int $articleId)
    {
        $article = Article::destroy($articleId);
        return $article;
    }

    /**
     * @param int $perPage
     * @return mixed
     */
    public function paginate(int $perPage = 2)
    {
        $paginate = Article::paginate($perPage);
        return $paginate;
    }

}


