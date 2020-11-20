<?php

namespace App\Observers;

use App\Model\Article;
use Illuminate\Support\Str;

class ArticleObserver
{
    /**
     * Handle the Tag "creating" event.
     *
     * @param \App\Model\Article $article
     * @return void
     */
    public function creating(Article $article)
    {
        $this->setSlug($article);
    }

    /**
     * Handle the Tag "updating" event.
     *
     * @param \App\Model\Tag $article
     * @return void
     */
    public function updating(Article $article)
    {
        $this->setSlug($article);
    }

    /**
     * @param $article
     */
    private function setSlug($article)
    {
        $slug = $article->slug = Str::slug($article->title);
        return $slug;
    }

}
