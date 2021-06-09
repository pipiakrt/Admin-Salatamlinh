<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\Category as ObCategory;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return 
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Category::observe(ObCategory::class);
    }
}
