<?php

namespace App\Services\Articles\Repositories;

use App\Model\Article;

class ArticlesRepository implements ArticleRepositoryInterface
{

    /**
     * @param $id
     * @return mixed
     */
    public function findOne(int $articleId)
    {
        $article = Article::find($articleId)->first();
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
//        $article->tags()->sync($data['tags']);
        return $article;
    }

    /**
     * @param array $data
     * @param int $articleId
     * @return mixed
     */
    public function update(array $data, $articleId)
    {
        $article = Article::find($articleId);
//        if (isset($data['tags'])){
//        $article->tags()->sync($data['tags']);
//        }
        $article->update($data);
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


