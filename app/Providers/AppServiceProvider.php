<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
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
        $this->app->singleton(
            \App\Repositories\Chapter\ChapterRepositoryInterface::class,
            \App\Repositories\Chapter\ChapterRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Story\StoryRepositoryInterface::class,
            \App\Repositories\Story\StoryRepository::class,
        );
        $this->app->singleton(
            \App\Repositories\Comment\CommentRepositoryInterface::class,
            \App\Repositories\Comment\CommentRepository::class,
        );
        $this->app->singleton(
            \App\Repositories\Client\Home\Category\CategoryRepositoryInterface::class,
            \App\Repositories\Client\Home\Category\CategoryRepository::class,
        );
        $this->app->singleton(
            \App\Repositories\Client\Home\Story\StoryRepositoryInterface::class,
            \App\Repositories\Client\Home\Story\StoryRepository::class,
        );
        $this->app->singleton(
            \App\Repositories\Client\Home\Chapter\ChapterRepositoryInterface::class,
            \App\Repositories\Client\Home\Chapter\ChapterRepository::class,
        );
        $this->app->singleton(
            \App\Repositories\Client\Home\Comment\CommentRepositoryInterface::class,
            \App\Repositories\Client\Home\Comment\CommentRepository::class,
        );
        $this->app->singleton(
            \App\Repositories\View\ViewRepositoryInterface::class,
            \App\Repositories\View\ViewRepository::class,
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
