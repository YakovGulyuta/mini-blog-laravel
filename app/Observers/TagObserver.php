<?php

namespace App\Observers;

use App\Model\Tag;
use Illuminate\Support\Str;

class TagObserver
{
    /**
     * Handle the Tag "creating" event.
     *
     * @param \App\Model\Tag $tag
     * @return void
     */
    public function creating(Tag $tag)
    {
        $this->setSlug($tag);
    }

    /**
     * Handle the Tag "updating" event.
     *
     * @param \App\Model\Tag $tag
     * @return void
     */
    public function updating(Tag $tag)
    {
        $this->setSlug($tag);
    }

    /**
     * @param $tag
     */
    private function setSlug($tag)
    {
        $slug = $tag->slug = Str::slug($tag->title);
        return $slug;
    }

}
