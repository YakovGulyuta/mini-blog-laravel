<?php

namespace App\Model;

use App\Components\uploads\Uploads;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * @method static find(int $articleId)
 * @method create(array $data)
 * @method static paginate(int $perPage)
 * @method static orderBy(string $string, string $string1)
 * @method static where(string $string, string $slug)
 * @method static like($s)
 */
class Article extends Uploads
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

    public function scopeLike($query, $s)
    {
        return $query->where('title', 'LIKE', "%{$s}%");
    }


}
