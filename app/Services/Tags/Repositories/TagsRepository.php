<?php

namespace App\Services\Tags\Repositories;


use App\Model\Tag;

class TagsRepository implements TagRepositoryInterface
{

    /**
     * @param $id
     * @return mixed
     */
    public function findOne(int $tagId)
    {
        $tag = Tag::find($tagId)->first();
        return $tag;
    }

    /**
     * @return tag[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        $tags = Tag::all();
        return $tags;
    }

    /**
     * @param array $data
     * @return tag
     */
    public function create(array $data)
    {
        $tag = new Tag();
        $tag->create($data);
        return $tag;
    }

    /**
     * @param array $data
     * @param int $tagId
     * @return mixed
     */
    public function update(array $data, $tagId)
    {
        $tag = Tag::find($tagId);
        $tag->update($data);
        return $tag;
    }

    /**
     * @param int $tagId
     * @return int
     */
    public function destroy(int $tagId)
    {
        $tag = Tag::destroy($tagId);
        return $tag;
    }

    /**
     * @param int $perPage
     * @return mixed
     */
    public function paginate(int $perPage = 2)
    {
        $paginate = Tag::paginate($perPage);
        return $paginate;
    }

    public function pluck()
    {
        $tag = Tag::pluck('title', 'id')->all();
        return $tag;
    }
}


