<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static find(int $tagId)
 * @method create(array $data)
 * @method static paginate(int $perPage)
 * @method static pluck(string $string, string $string1)
 * @method static where(string $string, $slug)
 */
class Tag extends Model
{
    protected $fillable = [
        'title',
        'slug'
    ];

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

}
