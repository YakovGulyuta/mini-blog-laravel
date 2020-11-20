<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static find(int $tagId)
 * @method create(array $data)
 * @method static paginate(int $perPage)
 */
class Tag extends Model
{
    protected $fillable = [
        'title',
        'slug'
    ];

    public function posts()
    {
        return $this->belongsToMany(Article::class);
    }

}
