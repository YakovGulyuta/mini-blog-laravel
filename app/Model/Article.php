<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static find(int $articleId)
 * @method create(array $data)
 * @method static paginate(int $perPage)
 * @method static orderBy(string $string, string $string1)
 * @method static where(string $string, string $slug)
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
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function getArticleDate()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d F, Y');
    }
}
