<?php


namespace App\Services\Articles\Repositories;


use App\Model\Category;

interface ArticleRepositoryInterface
{

    public function findOne(int $id);

    public function getAll();

    public function create(array $data);

    public function update(array $data, int $categoryId);

    public function destroy(int $id);

    public function paginate(int $perPage = 2);

}
