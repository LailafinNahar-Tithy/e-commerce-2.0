<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // $categories = Category::pluck('title','slug')->toArray();
        // view::share('app_name',$categories);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
