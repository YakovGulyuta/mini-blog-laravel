<?php

namespace App\Observers;

use App\Model\Category;
use Illuminate\Support\Str;

class CategoryObserver
{
    /**
     * Handle the category "creating" event.
     *
     * @param \App\Model\Category $category
     * @return void
     */
    public function creating(Category $category)
    {
        $this->setSlug($category);
    }

    /**
     * Handle the category "updatingd" event.
     *
     * @param \App\Model\Category $category
     * @return void
     */
    public function updating(Category $category)
    {
        $this->setSlug($category);
    }

    /**
     * @param $category
     */
    private function setSlug($category)
    {
        $slug = $category->slug = Str::slug($category->title);
        return $slug;
    }

}
