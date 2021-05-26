<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;
use App\Post;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('blog.blog', function($view){
            $categories = Category::with(['posts' => function($query){
                $query->published();
            }])->orderBy('title', 'asc')->get();
            return $view->with('category', $categories);
       
        });

        view()->composer('blog.index', function($view){
            $categories = Category::with(['posts' => function($query){
                $query->published();
            }])->orderBy('title', 'asc')->get();
            return $view->with('category', $categories);
       
        });

        view()->composer('blog.blog', function($view){
            $popularPosts = Post::published()->popular()->take(3)->get();

            return $view->with('popularPosts', $popularPosts);
        });

        view()->composer('blog.index', function($view){
            $popularPosts = Post::published()->popular()->take(6)->get();

            return $view->with('popularPosts', $popularPosts);
        });
    }
}
