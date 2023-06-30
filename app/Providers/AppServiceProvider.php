<?php

namespace App\Providers;

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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
