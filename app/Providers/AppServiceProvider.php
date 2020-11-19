<?php

namespace App\Providers;

use App\Model\Category;
use App\Observers\CategoryObserver;
use App\Services\Categories\Repositories\CategoriesRepository;
use App\Services\Categories\Repositories\CategoryRepositoryInterface;
use Illuminate\Container\Container;
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

    }
}
