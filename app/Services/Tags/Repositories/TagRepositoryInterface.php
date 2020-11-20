<?php


namespace App\Services\Tags\Repositories;


interface TagRepositoryInterface
{

    public function findOne(int $id);

    public function getAll();

    public function create(array $data);

    public function update(array $data, int $tagId);

    public function destroy(int $id);

    public function paginate(int $perPage = 2);

    public function pluck();

}
