<?php

namespace App\Services\Categories;


use App\Model\Category;
use App\Services\Categories\Repositories\CategoryRepositoryInterface;

/**
 * Class CategoriesService
 * @package App\Services\Categories
 */
class CategoriesService
{

    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;

    /**
     * CategoriesService constructor.
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        $category = $this->categoryRepository->create($data);
        return $category;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($categoryId)
    {
        $category = $this->categoryRepository->destroy($categoryId);
        return $category;
    }

    /**
     * @param $data
     * @param $categoryId
     * @return mixed
     */
    public function update($data, $categoryId)
    {
        $category = $this->categoryRepository->update($data, $categoryId);
        return $category;
    }

    /**
     *
     */
    public function getAll()
    {
        $categories = $this->categoryRepository->getAll();
        return $categories;
    }

    /**
     * @param $categoryId
     * @return mixed
     */
    public function findById($categoryId)
    {
        $category = $this->categoryRepository->findOne($categoryId);
        return $category;
    }

    /**
     * @param int $perPage
     * @return mixed
     */
    public function paginate($perPage = 2)
    {
        $category = $this->categoryRepository->paginate($perPage);
        return $category;
    }

    /**
     * @return mixed
     */
    public function pluck()
    {
        $category = $this->categoryRepository->pluck();
        return $category;
    }


}
