<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

use App\Managers\ProjectTypeFactoryInterface;
use App\Managers\ProjectTypeFactory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('project-type-factory', function ($app) {
            return new ProjectTypeFactory();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $user = auth()->user();

        View::share('user', $user);

        
    }
}
