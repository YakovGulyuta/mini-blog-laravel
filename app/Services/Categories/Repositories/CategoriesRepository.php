<?php

namespace App\Services\Categories\Repositories;

use App\Model\Category;
use Illuminate\Database\Eloquent\Model;

class CategoriesRepository implements CategoryRepositoryInterface
{

    /**
     * @param $id
     * @return mixed
     */
    public function findOne(int $categoryId)
    {
        $category = Category::find($categoryId)->first();
        return $category;
    }

    public function findBySlug(string $slug)
    {
        $category = Category::where('slug', $slug)->first();
        return $category;
    }

    /**
     * @return Category[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        $categories = Category::all();
        return $categories;
    }

    /**
     * @param array $data
     * @return Category
     */
    public function create(array $data)
    {
        $category = new Category();
        $category->create($data);
        return $category;
    }

    /**
     * @param array $data
     * @param int $categoryId
     * @return mixed
     */
    public function update(array $data, $categoryId)
    {
        $category = Category::find($categoryId);
        $category->update($data);
        return $category;
    }

    /**
     * @param int $categoryId
     * @return int
     */
    public function destroy(int $categoryId)
    {
        $category = Category::destroy($categoryId);
        return $category;
    }

    /**
     * @param int $perPage
     * @return mixed
     */
    public function paginate(int $perPage = 2)
    {
        $paginate = Category::paginate($perPage);
        return $paginate;
    }

    public function pluck()
    {
        $category = Category::pluck('title', 'id')->all();
        return $category;
    }
}


