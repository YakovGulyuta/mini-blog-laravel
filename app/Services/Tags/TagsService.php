<?php

namespace App\Services\Tags;


use App\Services\Tags\Repositories\TagRepositoryInterface;

class TagsService
{
    /**
     * @var TagRepositoryInterface
     */
    private $tagRepository;

    /**
     * CategoriesService constructor.
     */
    public function __construct(TagRepositoryInterface $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        $tag = $this->tagRepository->create($data);
        return $tag;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($tagId)
    {
        $tag = $this->tagRepository->destroy($tagId);
        return $tag;
    }

    /**
     * @param $data
     * @param $tagId
     * @return mixed
     */
    public function update($data, $tagId)
    {
        $tag = $this->tagRepository->update($data, $tagId);
        return $tag;
    }

    /**
     *
     */
    public function getAll()
    {
        $tags = $this->tagRepository->getAll();
        return $tags;
    }

    /**
     * @param $tagId
     * @return mixed
     */
    public function findById($tagId)
    {
        $tag = $this->tagRepository->findOne($tagId);
        return $tag;
    }

    /**
     * @param int $perPage
     * @return mixed
     */
    public function paginate($perPage = 2)
    {
        $tag = $this->tagRepository->paginate($perPage);
        return $tag;
    }

    public function pluck()
    {
        $tag = $this->tagRepository->pluck();
        return $tag;
    }
}
