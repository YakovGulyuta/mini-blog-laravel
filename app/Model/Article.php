<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static find(int $articleId)
 * @method create(array $data)
 * @method static paginate(int $perPage)
 */
class Article extends Model
{

    protected $fillable = ['title', 'description', 'content', 'category_id', 'thumbnail'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
