<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Components\ImageComponent;

use Illuminate\Pagination\Paginator;
use Laraeast\LaravelBootstrapForms\Facades\BsForm;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Paginator::useBootstrap();

        //
        BsForm::registerComponent('image', ImageComponent::class);

    }
}
