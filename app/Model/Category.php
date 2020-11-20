<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


/**
 * @method static find(int $id)
 * @method static create(array $data)
 * @method static paginate(int $perPage)
 * @method static withCount(string $string)
 */
class Category extends Model
{
    protected $fillable = [
        'title',
        'slug'
    ];


    public function posts()
    {
        return $this->hasMany(Article::class);
    }

//    public function setSlugAttribute()
//    {
//        $this->attributes['slug'] = Str::slug($this->title);
//    }
}
