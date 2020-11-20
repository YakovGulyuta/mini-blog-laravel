<?php

namespace App\Providers;

use App\Model\Article;
use App\Model\Category;
use App\Model\Tag;
use App\Observers\ArticleObserver;
use App\Observers\CategoryObserver;
use App\Observers\TagObserver;
use App\Services\Articles\Repositories\ArticleRepositoryInterface;
use App\Services\Articles\Repositories\ArticlesRepository;
use App\Services\Categories\Repositories\CategoriesRepository;
use App\Services\Categories\Repositories\CategoryRepositoryInterface;
use App\Services\Tags\Repositories\TagRepositoryInterface;
use App\Services\Tags\Repositories\TagsRepository;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Category::observe(CategoryObserver::class);
        Tag::observe(TagObserver::class);
        Article::observe(ArticleObserver::class);
    }

    private function registerBindings()
    {
//        $container = Container::getInstance();
//        $container->
//        app()->bind('','');
        $this->app->bind(
            CategoryRepositoryInterface::class,
            CategoriesRepository::class
        );
        $this->app->bind(
            TagRepositoryInterface::class,
            TagsRepository::class
        );
        $this->app->bind(
            ArticleRepositoryInterface::class,
            ArticlesRepository::class
        );

    }
}
