<?php

namespace App\Services\Articles;

use App\Http\Requests\Admin\Article\ArticleCreateRequest;
use App\Model\Article;
use App\Services\Articles\Repositories\ArticleRepositoryInterface;

class ArticlesService
{
    /**
     * @var ArticleRepositoryInterface
     */
    private $articleRepository;

    /**
     * CategoriesService constructor.
     */
    public function __construct(ArticleRepositoryInterface $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function create($data)
    {

        $article = $this->articleRepository->create($data);
        return $article;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($articleId)
    {
        $article = $this->articleRepository->destroy($articleId);
        return $article;
    }

    /**
     * @param $data
     * @param $articleId
     * @return mixed
     */
    public function update($data, $articleId)
    {
        $article = $this->articleRepository->update($data, $articleId);
        $article->update();
        return $article;
    }

    /**
     *
     */
    public function getAll()
    {
        $articles = $this->articleRepository->getAll();
        return $articles;
    }

    /**
     * @param $articleId
     * @return mixed
     */
    public function findById($articleId)
    {
        $article = $this->articleRepository->findOne($articleId);
        return $article;
    }

    public function findBySlug($slug)
    {
        $article = $this->articleRepository->findBySlug($slug);
        return $article;
    }

    /**
     * @param int $perPage
     * @return mixed
     */
    public function paginate($perPage = 2)
    {
        $article = $this->articleRepository->paginate($perPage);
        return $article;
    }
}
